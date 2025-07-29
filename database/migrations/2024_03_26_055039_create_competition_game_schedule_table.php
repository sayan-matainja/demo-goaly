<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompetitionGameScheduleTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('competition_game_schedule')) {

        Schema::create('competition_game_schedule', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_games');
            $table->foreign('id_games')->references('id')->on('games')->onDelete('cascade');
            $table->string('competition_type');
            $table->string('icon')->nullable();
            $table->string('name');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
    }
    }

    public function down()
    {
        Schema::dropIfExists('competition_game_schedule');
    }
}
