<?php

namespace Database\Factories;

use App\Models\Habit;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Habit>
 */
class HabitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $habit_names = [
            'Run 5k',
            'Read 30 minutes',
            'Meditate',
            'Drink 8 glasses of water',
            'Do 10 push-ups',
        ];

        return [
            'user_id' => User::factory(),
            'name' => $this->faker->unique()->randomElement($habit_names),
        ];
    }
}
