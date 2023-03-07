<?php

namespace Tests\Feature;

use App\Models\Event;
use Tests\TestCase;

class EventsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_getting_lists(): void
    {
        $this->get(route('api.events.index'))
            ->assertOk()
            ->assertJsonStructure([
                'data' => [
                    [
                        'id',
                        'title',
                        'created_at',
                    ]
                ]
            ]);
    }

    public function test_creating_new_event()
    {
        $event = Event::factory()->raw();
        $this->post(route('api.events.store'), ['data' => $event])
            ->assertOk()
            ->assertJsonStructure([
                'data' => [
                    'id',
                    'spent_time',
                    'spent_ram',
                ]
            ]);

    }
}
