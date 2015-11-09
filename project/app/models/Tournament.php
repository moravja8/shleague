<?php

class Tournament extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
        'game_id' => 'integer|required',
        'min_teams' => 'integer|required',
        'max_teams' => 'integer|required',
        'start_date' => 'required',
        'end_date' => 'required',
        'name' => 'string|required',
        'description' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = ['game_id', 'min_teams', 'max_teams', 'start_date', 'end_date', 'name', 'description'];

}