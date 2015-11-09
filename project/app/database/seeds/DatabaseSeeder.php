<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		//$this->call('EventsTableSeeder');
        $this->call('UsersTableSeeder');
        //$this->call('GamesTableSeeder');
        //$this->call('GameTypesTableSeeder');
        //$this->call('GameMastersTableSeeder');
        //$this->call('MatchesTableSeeder');
        //$this->call('TeamsTableSeeder');
        //$this->call('TeamMembersTableSeeder');
        //$this->call('TournamentsTableSeeder');
	}

}
