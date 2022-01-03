<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->bigIncrements('id')                        ->comment('ID');

            $table->integer('course_details_id')               ->comment('コース詳細ID');
            $table->timestamp('date')                          ->comment('日程');
            $table->time('start_time')                         ->comment('開始時間');
            $table->time('finish_time')                        ->comment('終了時間');
            $table->integer('price')->default('0')             ->comment('料金');
            $table->integer('held_type')->default('1')         ->comment('開催形式 1:対面 2:オンライン 3:対面&オンライン');
            $table->text('venue')->nullable()                  ->comment('会場');
            $table->text('address')->nullable()                ->comment('住所');
            $table->integer('capacity')                        ->comment('定員');
            $table->integer('number')->default('1')            ->comment('何回目か');

            $table->timestamp('open_start_day')->nullable()    ->comment('公開開始日');
            $table->timestamp('open_finish_day')->nullable()   ->comment('公開終了日');

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
        Schema::dropIfExists('schedules');
    }
}

// php artisan make:seeder ScheduleSeeder
// php artisan make:migration create_course_details_table
