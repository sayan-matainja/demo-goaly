<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('games')) {
        
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->string('games_code')->unique();
            $table->string('name');
            $table->string('description')->nullable()->length(255);
            $table->string('icon')->nullable();
            $table->string('banner')->nullable();
            $table->string('url')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->string('game_contest')->nullable();
            $table->timestamps();
        });
     }
    }

    public function down()
    {
        Schema::dropIfExists('games');
    }
}

