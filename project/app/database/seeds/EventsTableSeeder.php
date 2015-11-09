<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class EventsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			LEvent::create([
                'match_id' => rand(1,5),
                'news_id' => rand(1,5),
                'from_date' => $faker->date(),
                'to_date' => $faker->date()
			]);
		}
	}

}