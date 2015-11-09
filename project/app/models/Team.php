<?php

class Team extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
        'name' => 'required|unique:teams', // unique
        'abbreviation' => 'required|unique:teams',  // unique
        'description' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = ['name', 'abbreviation', 'description'];

    public function members(){
        return DB::table('teams')->where('teams.id', $this->id)->join('team_members', 'teams.id', '=', 'team_id')->get();
    }

    public function sentInvitations(){
        return DB::table('teams')->where('teams.id', $this->id)->join('invitations', 'teams.id', '=', 'team_id')->get();
    }

    public static function get($id){
        return DB::table('teams')->where('id', $id)->first();
    }
}