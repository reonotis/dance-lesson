<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrefecturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prefectures', function (Blueprint $table) {
            $table->text('code')                               ->comment('団体コード');
            $table->text('prefectures')                        ->comment('都道府県名');
            $table->text('municipalities')->nullable()         ->comment('市区町村名');
            $table->text('prefectures_kana')->nullable()       ->comment('都道府県名カナ');
            $table->text('municipalities_kana')->nullable()    ->comment('市区町村名カナ');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prefectures');
    }
}
