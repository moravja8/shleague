<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class GameTypesTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			GameType::create([
                'game_id' => rand(1, 10),
                'name' => $faker->name(),
                'min_players' => rand(1,5),
                'max_players' => rand(10, 15)
			]);
		}
	}

}