<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CurseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('courses')->insert([
            [
                'owner_id'        => 1,
                'course_name'     => 'テスト講座',
                'detail'          => '詳細が入ります',
                'basic_price'     => 1000,
                'area_code'       => '131130',
                'held_type'       => 1,
                'venue'           => '会場名',
                'num_times'       => 3,
                'notices'         => '特記事項が入ります',
                'status'          => 1,
                'request_accept'  => 0,
                'memo'            => 'お客様には閲覧できないメモが入ります',
            ],[
                'owner_id'        => 1,
                'course_name'     => 'テスト講座2',
                'detail'          => '詳細が入ります',
                'basic_price'     => 2000,
                'area_code'       => '131130',
                'held_type'       => 1,
                'venue'           => '会場名',
                'num_times'       => 1,
                'notices'         => '特記事項が入ります',
                'status'          => 1,
                'request_accept'  => 0,
                'memo'            => 'お客様には閲覧できないメモが入ります',
            ],[
                'owner_id'        => 1,
                'course_name'     => 'テスト講座3',
                'detail'          => '詳細が入ります',
                'basic_price'     => 3000,
                'area_code'       => '131130',
                'held_type'       => 1,
                'venue'           => '会場名',
                'num_times'       => 1,
                'notices'         => '特記事項が入ります',
                'status'          => 0,
                'request_accept'  => 0,
                'memo'            => 'お客様には閲覧できないメモが入ります',
            ],[
                'owner_id'        => 2,
                'course_name'     => 'テスト講座4',
                'detail'          => '詳細が入ります',
                'basic_price'     => 4000,
                'area_code'       => '131130',
                'held_type'       => 1,
                'venue'           => '会場名',
                'num_times'       => 1,
                'notices'         => '特記事項が入ります',
                'status'          => 0,
                'request_accept'  => 0,
                'memo'            => 'お客様には閲覧できないメモが入ります',
            ],
        ]);
    }
}



