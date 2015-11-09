<?php

class TeamsController extends \BaseController {

    /**
     * Invite another user to a team
     * @param $id
     * @return mixed
     */
    public function inviteUser($id){
        $team = Team::findOrFail($id);
        $invitations = $team->sentInvitations();
        foreach ($invitations as $invitation) {
            if($invitation->user_id == Input::all()['user_id']){
                return Redirect::back(); // This user was already invited
            }
        }

        $members = $team->members();
        foreach ($members as $member) {
            if($member->user_id == Input::all()['user_id']){
                return Redirect::back(); // This user is already in team
            }
        }

        DB::table('invitations')->insertGetId(
            array('user_id' => Input::all()['user_id'], 'team_id' => $id)
        );

        return Redirect::back();
    }

	/**
	 * Display a listing of teams
	 *
	 * @return Response
	 */
	public function index()
	{
		$teams = Team::paginate(10);

		return View::make('teams.index', compact('teams'));
	}

	/**
	 * Show the form for creating a new team
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('teams.create');
	}

	/**
	 * Store a newly created team in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Team::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Team::create($data);

        DB::table('team_members')->insertGetId(
            array('team_id' => DB::getPdo()->lastInsertId(), 'user_id' => Auth::user()->id, 'captain' => '1')
        );

		return Redirect::route('teams.index');
	}

	/**
	 * Display the specified team.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$team = Team::findOrFail($id);

		return View::make('teams.show', compact('team'));
	}

	/**
	 * Show the form for editing the specified team.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$team = Team::find($id);

		return View::make('teams.edit', compact('team'));
	}

	/**
	 * Update the specified team in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$team = Team::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Team::$rules);

		if ($validator->fails())
		{
            return Redirect::back()->withErrors($validator)->withInput();
		}

		$team->update($data);

		return Redirect::route('teams.index');
	}

	/**
	 * Remove the specified team from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        DB::table('team_members')->where('team_id', $id)->delete();

        Team::destroy($id);

		return Redirect::route('teams.index');
	}
}
