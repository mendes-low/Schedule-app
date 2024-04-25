<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Timetable>
 */
class TimetableFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'group_id'      => 1234,
            'day'           => fake()->dayOfWeek,
            'title'         => fake()->title,
            'time_start'    => fake()->date('H:i'),
            'time_end'      => fake()->date('H:i'),
            'corps'         => fake()->title,
            'audience'      => fake()->randomNumber(),
            'lesson_type'   => fake()->word,
            'teacher'       => fake()->name,
        ];
    }
}
