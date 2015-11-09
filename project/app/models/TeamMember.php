<?php

class TeamMember extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
        'user_id' => 'integer|required',
        'team_id' => 'integer|required',
        'captain' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = ['user_id', 'team_id','captain'];

}