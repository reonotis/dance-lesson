<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('admins')->insert([
            [
                'name' => '管理者1',
                'email' => 'admin1@test.jp',
                'password' => Hash::make('testtest'),
            ],[
                'name' => '管理者2',
                'email' => 'admin2@test.jp',
                'password' => Hash::make('testtest'),
            ],
        ]);
    }
}
