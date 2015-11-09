<?php

class LEvent extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		'from_date' => 'required',
        'to_date' => 'required',
        'match_id' => 'integer',
        'news_id' => 'integer'
	];

	// Don't forget to fill this array
	protected $fillable = ['from_date', 'to_date', 'match_id', 'news_id'];

}