<?php

//Route::resource('events', 'EventsController');
//Route::resource('games', 'GamesController');
//Route::resource('game_types', 'GameTypesController');
//Route::resource('game_masters', 'GameMastersController');
//Route::resource('matches', 'MatchesController');

Route::get('/', array('as' => 'home', 'uses' => 'HomeController@showWelcome'));
Route::get('only_captain', array('as' => 'only_captain', 'uses' => 'HomeController@onlyCaptain'));

/*registration*/
Route::get('user/create', array('as' => 'user.create', 'uses' => 'UsersController@create'));
Route::get('user/store', array('as' => 'user.store', 'uses' => 'UsersController@store'));

/*login*/
Route::get('login', array('as' => 'login', 'uses' => 'AuthController@getLogin'));
Route::post('login', array('as' => 'login.post', 'uses' => 'AuthController@postLogin'));
Route::get('logout', array('as' => 'logout', 'uses' => 'AuthController@getLogout'));

/*autentication*/
Route::group(array('before' => 'auth'), function(){
    Route::resource('teams', 'TeamsController', array('only' => array('index' , 'create' , 'store' , 'show')));
    Route::get('invitations', array('as' => 'invitations.index', 'uses' => 'UsersController@showInvitations'));
    Route::get('invitations/accept/{id}', array('as' => 'invitations.accept', 'uses' => 'UsersController@acceptInvitation'));
    Route::get('user/{id}', array('as' => 'user.show', 'uses' => 'UsersController@show'));
    Route::get('user/{id}/edit', array('as' => 'user.edit', 'uses' => 'UsersController@edit'));
    Route::put('user/{id}/update', array('as' => 'user.update', 'uses' => 'UsersController@update'));
});

/*Captain of a team*/
Route::group(array('before' => array('auth' ,'captain')), function(){
    Route::put('team/{id}/invite_user', array('as' => 'team.invite_user', 'uses' => 'TeamsController@inviteUser'));
    Route::resource('team_members', 'TeamMembersController', array('only' => array('destroy')));
    Route::resource('teams', 'TeamsController', array('only' => array('edit' , 'update' , 'destroy')));
});


//Route::resource('tournaments', 'TournamentsController');