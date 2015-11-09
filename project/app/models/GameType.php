<?php

class GameType extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
        'game_id' => 'integer|required',
        'name' => 'required',
        'min_players' => 'required',
        'max_players' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = ['game_id', 'name', 'min_players', 'max_players'];

}