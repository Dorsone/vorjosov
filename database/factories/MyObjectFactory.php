<?php

namespace Database\Factories;

use App\Models\MyObject;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<MyObject>
 */
class MyObjectFactory extends Factory
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
            'user_id' => $user->id,
            'data' => [
                'list' => [
                    'sublist' => [
                        $this->faker->randomNumber(),
                        $this->faker->randomNumber(),
                    ]
                ]
            ],
        ];
    }
}
