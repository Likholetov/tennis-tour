<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayerTennisMatchTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('player_tennis_match', function (Blueprint $table) {
            $table->foreignId('player_id')->constrained()->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('tennis_match_id')->constrained()->onUpdate('cascade')
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
        Schema::dropIfExists('player_tennis_match');
    }
}
