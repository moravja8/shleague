<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

    /**
     * Returns invitations for user
     *
     * @return mixed
     */
    public function invitations(){
        return DB::table('users')->where('users.id', $this->id)->join('invitations', 'users.id', '=', 'user_id')->get();
    }

    /**
     * Returns users teams
     * @return mixed
     */
    public function teams(){
        return DB::table('users')->where('users.id', $this->id)->join('team_members', 'users.id', '=', 'user_id')->get();
    }

    /**
     * Rules for validating authentication
     *
     * @var array
     */
    public static $auth_rules = [
        'nickname' => 'required',
        'password' => 'required'
    ];

    /**
     * Rules for validating forms for creating and updating Users
     *
     * @var array
     */
    public static $register_rules = [
        'nickname' => 'required|unique:users',
        'password' => 'required',
        'mail' => 'email|required|unique:users',
        'city' => 'required',
        'state' => 'required'
    ];

    // Don't forget to fill this array
    protected $fillable = ['nickname', 'mail', 'password', 'city', 'state', 'birthdate', 'info'];

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

    public static function get($id){
        return DB::table('users')->where('id', $id)->first();
    }

    /*public static function listFreeUsers(){
        $result = DB::table('users')->whereNotExists(function($query){
            $query->from('users')->join('invitations', 'user.id', '=', 'user_id');
        });
        //dd($result);
        return $result;
    }*/

}
