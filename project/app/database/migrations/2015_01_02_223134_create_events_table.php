<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEventsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('l_events', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('match_id');
			$table->integer('news_id');
			$table->date('from_date');
			$table->date('to_date');
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
		Schema::drop('l_events');
	}

}
