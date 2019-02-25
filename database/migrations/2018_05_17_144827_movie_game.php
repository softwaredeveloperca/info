<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MovieGame extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('moviegame', function (Blueprint $table) {
            $table->increments('id');
			$table->string('name', 100)->default('game name');
			$table->integer('players')->default(0);
			$table->string('status', 100);
			$table->integer('speed')->default(1);
			$table->integer('day')->default(1);
			$table->integer('counter')->default(0);
			$table->integer('heartbeat')->default(1);
			$table->integer('population')->default(100000);
			$table->integer('slot_interval')->default(16);
			$table->integer('slot_type')->default(1);
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
        Schema::dropIfExists('moviegame');
    }
}
