<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTournamentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tournaments', function (Blueprint $table) {
            $table->id();
            $table->timestamp('started_at')->nullable();
            $table->timestamp('ended_at')->nullable();
            $table->string('place', 255)->nullable();
            $table->string('title', 255);
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->restrictOnUpdate()->nullOnDelete();
            $table->unsignedBigInteger('rank_id')->nullable();
            $table->foreign('rank_id')->references('id')->on('ranks')->restrictOnUpdate()->nullOnDelete();
            $table->tinyInteger('status')->default(0);
            $table->boolean('is_groups')->default(false);
            $table->integer('group_amount')->default(4);
            $table->boolean('is_consolation_grid')->default(false);
            // interface
            $table->boolean('parameters_collapsed')->default(false);
            $table->boolean('players_collapsed')->default(false);
            $table->boolean('settings_collapsed')->default(false);
            $table->boolean('groups_collapsed')->default(false);
            $table->boolean('grid_collapsed')->default(false);
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
        Schema::dropIfExists('tournaments');
    }
}
