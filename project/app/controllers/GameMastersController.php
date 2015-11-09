<?php

class GameMastersController extends \BaseController {

	/**
	 * Display a listing of gamemasters
	 *
	 * @return Response
	 */
	public function index()
	{
		$gamemasters = Gamemaster::all();

		return View::make('gamemasters.index', compact('gamemasters'));
	}

	/**
	 * Show the form for creating a new gamemaster
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('gamemasters.create');
	}

	/**
	 * Store a newly created gamemaster in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Gamemaster::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Gamemaster::create($data);

		return Redirect::route('gamemasters.index');
	}

	/**
	 * Display the specified gamemaster.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$gamemaster = Gamemaster::findOrFail($id);

		return View::make('gamemasters.show', compact('gamemaster'));
	}

	/**
	 * Show the form for editing the specified gamemaster.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$gamemaster = Gamemaster::find($id);

		return View::make('gamemasters.edit', compact('gamemaster'));
	}

	/**
	 * Update the specified gamemaster in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$gamemaster = Gamemaster::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Gamemaster::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$gamemaster->update($data);

		return Redirect::route('gamemasters.index');
	}

	/**
	 * Remove the specified gamemaster from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Gamemaster::destroy($id);

		return Redirect::route('gamemasters.index');
	}

}
