<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectiveQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjective_questions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('topic_id')->unsigned();
           
            $table->string('paragraph');
            $table->string('question1');
            $table->string('question2');
            $table->string('question3');
            $table->string('question4');
            
            $table->string('tag')->nullable();
            $table->integer('status')->default(0);
            $table->string('paragraph_type');
            $table->timestamps();
            $table->foreign('topic_id')->references('id')->on('topics')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subjective_questions');
    }
}
