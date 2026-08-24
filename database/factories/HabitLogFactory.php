<?php

namespace Database\Factories;

use App\Models\Habit;
use App\Models\HabitLog;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<HabitLog>
 */
class HabitLogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'habit_id' => Habit::factory(),
            'user_id' => fn (array $attributes) => Habit::find($attributes['habit_id'])->user_id,
            'completed_at' => $this->faker->dateTimeBetween('-5 days', 'now')->format('Y-m-d'),
        ];
    }
}
