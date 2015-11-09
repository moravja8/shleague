<?php

class Match extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
        'tournament_id' => 'integer|required',
        'game_type_id' => 'integer|required',
        'rounds' => 'integer|required',
        'rounds_to_win' => 'integer',
        'points' => 'integer|required'
	];

	// Don't forget to fill this array
	protected $fillable = ['tournament_id', 'game_type_id', 'rounds', 'rounds_to_win', 'points'];

}