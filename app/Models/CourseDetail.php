<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CourseDetail extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
    ];


    /**
     * @param array $coursesIdList
     * @return void
     */
    public static function getByCourseId($coursesIdList){
        $query = self::select(DB::raw('*'))
        ->whereIn('course_id', $coursesIdList)
        ->where('delete_flag', 0);

        return $query->get();
    }

}
