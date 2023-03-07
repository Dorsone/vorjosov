<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\EventRequest;
use App\Http\Resources\Api\v1\EventIndexResource;
use App\Http\Resources\Api\v1\EventStoreResource;
use App\Models\Event;
use App\Services\PerformanceService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class EventController extends Controller
{
    public function __construct(
        protected PerformanceService $performanceService
    )
    {
    }

    public function index(): AnonymousResourceCollection
    {
        return EventIndexResource::collection(Event::all());
    }

    public function store(EventRequest $request): EventStoreResource
    {
        $event = null;

        $this->performanceService->track(function () use ($request, &$event) {
            $validated = $request->validated('data');
            $validated['user_id'] = auth()->user()?->id ?? 1;
            $event = Event::query()->create($validated);
        });

        return EventStoreResource::make([
            'id' => $event->id,
            'spent_time' => $this->performanceService->getSpentTime(),
            'spent_memory' => $this->performanceService->getSpentMemory(),
        ]);
    }
}
