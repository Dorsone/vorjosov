<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Services\PerformanceService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class EventsController extends Controller
{
    public function index(): View
    {
        $events = Event::all();
        return view('pages.events.index', compact('events'));
    }

    public function show(Event $event): View
    {
        $event = $event->load('user');
        return view('pages.events.show', compact('event'));
    }

    public function delete(Event $event): RedirectResponse
    {
        $event->delete();
        return to_route('events.index');
    }
}
