<?php

class TournamentsController extends \BaseController {

	/**
	 * Display a listing of tournaments
	 *
	 * @return Response
	 */
	public function index()
	{
		$tournaments = Tournament::all();

		return View::make('tournaments.index', compact('tournaments'));
	}

	/**
	 * Show the form for creating a new tournament
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('tournaments.create');
	}

	/**
	 * Store a newly created tournament in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Tournament::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Tournament::create($data);

		return Redirect::route('tournaments.index');
	}

	/**
	 * Display the specified tournament.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$tournament = Tournament::findOrFail($id);

		return View::make('tournaments.show', compact('tournament'));
	}

	/**
	 * Show the form for editing the specified tournament.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$tournament = Tournament::find($id);

		return View::make('tournaments.edit', compact('tournament'));
	}

	/**
	 * Update the specified tournament in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$tournament = Tournament::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Tournament::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$tournament->update($data);

		return Redirect::route('tournaments.index');
	}

	/**
	 * Remove the specified tournament from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Tournament::destroy($id);

		return Redirect::route('tournaments.index');
	}

}
