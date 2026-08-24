<?php

namespace Database\Seeders;

use App\Models\Habit;
use App\Models\HabitLog;
use Illuminate\Database\Seeder;

class HabitLogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // habit_logs is unique on (habit_id, completed_at), so the dates are
        // drawn per habit instead of at random across the whole table.
        Habit::all()->each(function (Habit $habit) {
            collect(range(0, 5))->shuffle()->take(2)->each(
                fn (int $daysAgo) => HabitLog::factory()->create([
                    'habit_id' => $habit->id,
                    'user_id' => $habit->user_id,
                    'completed_at' => now()->subDays($daysAgo)->toDateString(),
                ])
            );
        });
    }
}
