<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('content')->nullable();
            $table->text('image')->nullable();
            $table->text('answer_a')->nullable();
            $table->text('answer_b')->nullable();
            $table->text('answer_c')->nullable();
            $table->text('answer_d')->nullable();
            $table->integer('type_question_id')->unsigned()->index();
            $table->integer('level_id')->unsigned()->index();
            $table->integer('grade_id')->unsigned()->index();
            $table->integer('subject_id')->unsigned()->index();
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
        Schema::dropIfExists('questions');
    }
}
