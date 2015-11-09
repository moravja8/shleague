<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			User::create([
                'nickname' => $faker->name(),
                'mail' => $faker->email(),
                'city' => $faker->city(),
                'state' => $faker->city(),
                'birthdate' => $faker->date(),
                'name' => $faker->name(),
                'info' => $faker->realText(100),
                'password' => Hash::make('heslo')
			]);
		}
	}

}