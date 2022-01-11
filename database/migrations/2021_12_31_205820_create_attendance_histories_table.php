<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendanceHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendance_histories', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->integer('member_id');
            $table->integer('attendaceId');
            $table->integer('attendanceTypeId');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attendance_histories');
    }
}
