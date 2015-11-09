<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class TeamMembersTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			TeamMember::create([
                'user_id' => rand(1,10),
                'team_id' => rand(1,10),
                'captain' => '0'
			]);
		}
	}

}