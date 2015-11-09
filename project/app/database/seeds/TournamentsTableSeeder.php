<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class TournamentsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			Tournament::create([
                'game_id' => rand(1,10),
                'min_teams' => rand(1,5),
                'max_teams' => rand(1,15),
                'start_date' => $faker->date(),
                'end_date' => $faker->date(),
                'name' => $faker->name(),
                'description' => $faker->realText(150)
			]);
		}
	}

}