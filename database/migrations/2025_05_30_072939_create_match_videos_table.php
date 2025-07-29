<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchVideosTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (!Schema::hasTable('match_videos')) {
            Schema::create('match_videos', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('fixture_id')->nullable();
                $table->string('title')->nullable();
                $table->string('video')->nullable();
                $table->timestamp('created_at')->useCurrent();
                $table->timestamp('updated_at')->nullable();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('match_videos');
    }
}
