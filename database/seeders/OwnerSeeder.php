<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class OwnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('owners')->insert([
            [
                'name' => 'オーナー1',
                'email' => 'owner1@test.jp',
                'password' => Hash::make('testtest'),
            ],[
                'name' => 'オーナー2',
                'email' => 'owner2@test.jp',
                'password' => Hash::make('testtest'),
            ],[
                'name' => 'オーナー3',
                'email' => 'owner3@test.jp',
                'password' => Hash::make('testtest'),
            ],
        ]);
    }
}
