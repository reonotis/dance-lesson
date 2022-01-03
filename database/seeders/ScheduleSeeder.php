<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('schedules')->insert([
            [
                'course_details_id' => 1,
                'date' => date('Y-m-d'),
                'start_time' => '12:00:00',
                'finish_time' => '13:00:00',
                'price' => 2000,
                'held_type' => 1,
                'venue' => 'venue　test',
                'address' => 'testAddress 住所が入ります',
                'capacity' => 3,
                'number' => 1,
                'open_start_day' => '2022-01-01 12:00:00',
                'open_finish_day' => '2022-02-01 12:00:00',
            ],
        ]);
    }
}

