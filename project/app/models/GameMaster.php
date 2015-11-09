<?php

class GameMaster extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		'user_id' => 'integer|required',
        'game_id' => 'integer|required'
	];

	// Don't forget to fill this array
	protected $fillable = ['user_id', 'game_id'];

}