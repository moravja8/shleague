<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class GameMastersTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			GameMaster::create([
                'user_id' => rand(1, 10),
                'game_id' => rand(1, 10)
			]);
		}
	}

}