<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->string('name', 30);
            $table->string('patronymic', 30)->nullable();
            $table->string('surname', 100);
            $table->enum('gender', ["не указан","мужской","женский"]);
            $table->string('img_url', 100)->nullable();
            $table->string('city', 100)->nullable();
            $table->string('region', 100)->nullable();
            $table->string('country', 100)->nullable();
            $table->date('birth')->nullable();
            $table->integer('level')->nullable();
            $table->integer('start_playing_year')->nullable();
            $table->integer('start_tournament_year')->nullable();
            $table->string('start_tournament_month', 15)->nullable();
            $table->string('racket_firm', 50)->nullable();
            $table->string('racket_model', 50)->nullable();
            $table->integer('best_position_single')->nullable();
            $table->date('best_position_single_date')->nullable();
            $table->integer('best_position_pair')->nullable();
            $table->date('best_position_pair_date')->nullable();
            $table->unsignedBigInteger('partner_id')->nullable();
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
        Schema::dropIfExists('players');
    }
}
