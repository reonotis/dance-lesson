<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('course_details')->insert([
            [
                'course_id' => 1,
            ],[
                'course_id' => 1,
            ],
        ]);
        //
    }
}
