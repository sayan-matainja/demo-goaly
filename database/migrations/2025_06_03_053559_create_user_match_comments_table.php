<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserMatchCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('user_match_comments')) {
            Schema::create('user_match_comments', function (Blueprint $table) {
                $table->id();
                $table->text('comment');
                $table->unsignedBigInteger('match_id');
                $table->unsignedBigInteger('user_id');
                $table->timestamps(); 
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_match_comments');
    }
}
