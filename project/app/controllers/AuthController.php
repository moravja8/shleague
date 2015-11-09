<?php
/**
 * Created by PhpStorm.
 * User: jakub
 * Date: 3.1.15
 * Time: 19:55
 */

class AuthController extends \BaseController{

    public function getLogin(){
        return View::make('auth.login');
    }

    public function postLogin(){
        $data = Input::all();
        $validator = Validator::make($data, User::$auth_rules);

        if($validator->fails()){
            return Redirect::back()->withErrors($validator)->withInput();
        }

        if(Auth::attempt(array('nickname' => Input::get('nickname'), 'password' => Input::get('password')))){
            return Redirect::intended('/');
        }

        return Redirect::route('login');
    }

    public function getLogout(){
        Auth::logout();

        return Redirect::route('login');
    }
} 