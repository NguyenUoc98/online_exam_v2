<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveAnswerInQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('questions', function (Blueprint $table) {
            $table->dropColumn(['answer_a', 'answer_b', 'answer_c', 'answer_d']);
        });

        Schema::dropIfExists('correct_answers');

        Schema::dropIfExists('type_questions');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('questions', function (Blueprint $table) {
            $table->text('answer_a')->nullable();
            $table->text('answer_b')->nullable();
            $table->text('answer_c')->nullable();
            $table->text('answer_d')->nullable();
        });

        Schema::create('correct_answers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('question_id')->index();
            $table->string('correct_answer');
            $table->timestamps();
        });

        Schema::create('type_questions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->timestamps();
        });
    }
}
