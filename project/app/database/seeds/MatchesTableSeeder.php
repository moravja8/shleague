<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class MatchesTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			Match::create([
                'tournament_id' => rand(1,10),
                'game_type_id' => rand(1,10),
                'rounds' => rand(1,10),
                'rounds_to_win' => rand(1,10),
                'points' => rand(1,10)
			]);
		}
	}

}