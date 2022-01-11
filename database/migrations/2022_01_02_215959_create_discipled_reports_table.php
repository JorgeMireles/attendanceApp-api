<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscipledReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discipled_reports', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->integer('disciplerId');
            $table->integer('discipleId');
            $table->integer('goalsId');
            $table->integer('lessonId');
            $table->string('lecture_report');
            $table->string('comments');
            $table->date('date');
            $table->boolean('discipled_report');
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
        Schema::dropIfExists('discipled_reports');
    }
}
