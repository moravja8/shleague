<?php

class TeamMembersController extends \BaseController {

	/**
	 * Display a listing of teammembers
	 *
	 * @return Response
	 */
	public function index()
	{
		$teammembers = Teammember::all();

		return View::make('teammembers.index', compact('teammembers'));
	}

	/**
	 * Show the form for creating a new teammember
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('teammembers.create');
	}

	/**
	 * Store a newly created teammember in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Teammember::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Teammember::create($data);

		return Redirect::route('teammembers.index');
	}

	/**
	 * Display the specified teammember.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$teammember = Teammember::findOrFail($id);

		return View::make('teammembers.show', compact('teammember'));
	}

	/**
	 * Show the form for editing the specified teammember.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$teammember = Teammember::find($id);

		return View::make('teammembers.edit', compact('teammember'));
	}

	/**
	 * Update the specified teammember in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$teamMember = Teammember::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Teammember::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$teamMember->update($data);

		return Redirect::route('teammembers.index');
	}

	/**
	 * Remove the specified teammember from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		TeamMember::destroy($id);

		return Redirect::back();
	}

}
