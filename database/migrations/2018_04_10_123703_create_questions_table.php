<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->text('question', 1000);
            $table->text('answer', 1000)->nullable();
            $table->integer('author');
            $table->string('email');
            $table->integer('topic_id')->unsigned();
            $table->string('status',20)->default('moderation');
            $table->timestamps();

            $table->foreign('topic_id')
                ->references('id')->on('topics')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions', function (Blueprint $table) {
            $table->dropForeign('questions_topic_id_foreign');
        });
    }
}
