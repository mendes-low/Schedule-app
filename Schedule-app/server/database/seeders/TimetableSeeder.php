<?php

namespace Database\Seeders;

use App\Models\Timetable;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TimetableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        Timetable::factory(10)->create([
//            'group_id'      => 1234,
//            'day'           => fake()->dayOfWeek,
//            'title'         => fake()->title,
//            'time_start'    => fake()->date('H:i'),
//            'time_end'      => fake()->date('H:i'),
//            'corps'         => fake()->title,
//            'audience'      => fake()->randomNumber(),
//            'lesson_type'   => fake()->word,
//            'teacher'       => fake()->name,
//        ]);
        Timetable::factory(10)->create();
    }
}
