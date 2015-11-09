<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class TeamsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 20) as $index)
		{
			Team::create([
                'name' => $faker->name(),
                'abbreviation' => $faker->lastName(),
                'description' => $faker->realText(150)
			]);
		}
	}

}