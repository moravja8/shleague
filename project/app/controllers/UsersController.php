<?php

class UsersController extends \BaseController {

    /**
     * Display all invitations and teams where loged in user contributes
     * @return mixed
     */
    public function showInvitations(){
        return View::make('users.invitations');
    }

    /**
     * Accept invitation
     */
    public function acceptInvitation($id)
    {
        $invitation = DB::table('invitations')->where('id', $id)->first();
        DB::table('invitations')->where('id', $id)->delete();
        DB::table('team_members')->insertGetId(
            array('team_id' => $invitation->team_id, 'user_id' => Auth::user()->id)
        );

        return View::make('users.invitations');
    }

	/**
	 * Display a listing of the resource.
	 * GET /users
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /users/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('users.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /users
	 *
	 * @return Response
	 */
	public function store()
	{
        $validator = Validator::make($data = Input::all(), User::$register_rules);

        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $data['password'] = Hash::make($data['password']);

        $id = User::create($data);

        return View::make('login.post');
	}

	/**
	 * Display the specified resource.
	 * GET /users/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $user = User::findOrFail($id);
        return View::make('users.show', compact('user'));
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /users/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $user = User::findOrFail($id);
        return View::make('users.edit', compact('user'));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /users/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        $user = User::findOrFail($id);

        $validator = Validator::make($data = Input::all(), User::$register_rules);

        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $data['password'] = Hash::make($data['password']);

        $user->update($data);

        return View::make('users.show', compact('user')); //
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /users/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}