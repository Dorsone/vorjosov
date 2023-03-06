<?php

namespace Database\Factories;

use App\Models\Event;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::query()->inRandomOrder()->first();
        return [
            'title' => $this->faker->text(50),
            'address' => $this->faker->streetAddress() . ', ' . $this->faker->city() . ', ' . $this->faker->country,
            'user_id' => $user->id,
        ];
    }
}
