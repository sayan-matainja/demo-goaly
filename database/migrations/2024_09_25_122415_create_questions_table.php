<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        if (!Schema::hasTable('quiz_questions')) {

        Schema::create('quiz_questions', function (Blueprint $table) {
            $table->id();
            $table->string('question');
            $table->string('option_a');
            $table->string('option_b');
            $table->string('option_c')->nullable();
            $table->string('correct_option'); // can be A, B, or C
            $table->tinyInteger('is_active')->default(1);
            $table->timestamps();
        });
    }
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('quiz_questions');
    }
}
