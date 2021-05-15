<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exams', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('semester_id')->comment('ID kỳ thi')->index();
            $table->integer('grade_id')->comment('ID khối')->index();
            $table->integer('subject_id')->comment('ID môn học')->index();
            $table->integer('teacher_id')->comment('ID giáo viên')->index();
            $table->integer('time')->comment('Thời gian thi');
            $table->date('date')->comment('Ngày thi');
            $table->integer('num_question')->comment('Số câu hỏi');
            $table->integer('status')->comment('Trạng thái');
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
        Schema::dropIfExists('exams');
    }
}
