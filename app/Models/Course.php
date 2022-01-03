<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Course extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'owner_id',
        'course_name',
        'detail',
        'basic_price',
        'area',
        'held_type',
        'venue',
        'num_times',
        'notices',
        'status',
        'request_accept',
        'memo',
    ];


    /**
     * 対象顧客IDの本日以降の予約を取得する
     * @param int $id
     * @return void
     */
    public static function get_ownerCourse($id){
        $query = self::select(DB::raw('*'))
        ->leftJoin('prefectures', 'courses.area_code', '=', 'prefectures.code')
        ->where('owner_id', $id)
        ->where('delete_flag', 0);

        return $query->get();
    }

}
