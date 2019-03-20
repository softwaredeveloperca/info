<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMovieGameStationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movie_game_stations', function (Blueprint $table) {
            $table->increments('id');
							$table->integer('game_id')->default(0);
							$table->integer('player_id')->default(0);
							$table->integer('demo_male')->default(0);
							$table->integer('demo_senior')->default(0);
							$table->integer('demo_adult')->default(0);
							$table->integer('demo_young')->default(0);
							$table->integer('demo_bluecoller')->default(0);
							

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
        Schema::dropIfExists('movie_game_stations');
    }
}
