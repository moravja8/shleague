<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGameTypesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('game_types', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('game_id');
			$table->string('name', 70);
			$table->integer('min_players');
			$table->integer('max_players');
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
		Schema::drop('game_types');
	}

}
