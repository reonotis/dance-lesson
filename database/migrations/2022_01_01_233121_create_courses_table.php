<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->bigIncrements('id')                        ->comment('ID');

            $table->integer('owner_id')                        ->comment('オーナーID');
            $table->string('course_name', '200')               ->comment('コース名');
            $table->string('detail', '1000')->nullable()       ->comment('コースの詳細');
            $table->integer('basic_price')->default('0')       ->comment('基本料金');
            $table->text('area_code')->nullable()              ->comment('エリアコード');
            $table->integer('held_type')->default('1')         ->comment('開催形式 1:対面 2:オンライン 3:対面&オンライン');
            $table->text('venue')->nullable()                  ->comment('会場');
            $table->text('num_times')->default('1')            ->comment('開催回数');
            $table->string('notices','1000')->nullable()       ->comment('特記事項');
            $table->tinyInteger('status')->default('0')        ->comment('受講状態 0:未公開 1:公開  9:キャンセル');
            $table->tinyInteger('request_accept')->default('0')->comment('リクエストを受け付ける 0:受け付けない 1:受付中');
            $table->string('memo', '1000')->nullable()         ->comment('メモ');

            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('作成日時')	;
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'))->comment('更新日時');
            $table->boolean('delete_flag')->default('0')->comment('削除フラグ');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
