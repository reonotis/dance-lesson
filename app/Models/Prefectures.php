<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prefectures extends Model
{
    use HasFactory;


    /**
     * @param array $coursesIdList
     * @return void
     */
    public static function get_prefectures(){
        $query = self::where('municipalities', NULL);

        return $query->get();
    }
}
