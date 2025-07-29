<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamePointsTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('game_points')) {

        Schema::create('game_points', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_games')->nullable();
            $table->integer('id_users')->nullable(); 
            $table->integer('points');
            $table->dateTime('date');
            $table->unsignedBigInteger('schedule_id')->nullable();
            $table->timestamps();

            // Define foreign key constraints
            $table->foreign('id_games')->references('id')->on('games')->onDelete('cascade');
            $table->foreign('id_users')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('schedule_id')->references('id')->on('competition_game_schedule')->onDelete('cascade');
        });
     }
    }



    public function down()
    {
        Schema::dropIfExists('game_points');
    }
}
