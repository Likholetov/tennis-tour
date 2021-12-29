<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTennisMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tennis_matches', function (Blueprint $table) {
            $table->id();
            $table->string('expected_court', 20)->nullable();
            $table->string('court', 20)->nullable();
            $table->string('title', 50)->nullable();
            $table->foreignId('tournament_id')->constrained()->onUpdate('cascade')
                ->onDelete('cascade');
            $table->unsignedBigInteger('player_one_id')->nullable();
            $table->foreign('player_one_id')->references('id')->on('players')->restrictOnUpdate()->nullOnDelete();
            $table->unsignedBigInteger('player_two_id')->nullable();
            $table->foreign('player_two_id')->references('id')->on('players')->restrictOnUpdate()->nullOnDelete();
            $table->string('score', 50)->nullable();
            $table->string('warm_up', 10)->nullable();
            $table->string('start', 10)->nullable();
            $table->string('end', 10)->nullable();
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
        Schema::dropIfExists('tennis_matches');
    }
}
