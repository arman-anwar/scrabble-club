<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGameTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('game', function (Blueprint $table) {
            $table->id();
            $table->integer("player1_score");
            $table->integer("player2_score");
            $table->integer("player1_id");
            $table->integer("player2_id");
            $table->date('game_date');
            $table->string('game_venue');
            $table->timestamps();

            $table->foreign('player1_id')->references('id')->on('members');
            $table->foreign('player2_id')->references('id')->on('members');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('game');
    }
}
