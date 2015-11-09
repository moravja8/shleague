<?php

class GameTypesController extends \BaseController {

	/**
	 * Display a listing of gametypes
	 *
	 * @return Response
	 */
	public function index()
	{
		$gametypes = Gametype::all();

		return View::make('gametypes.index', compact('gametypes'));
	}

	/**
	 * Show the form for creating a new gametype
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('gametypes.create');
	}

	/**
	 * Store a newly created gametype in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Gametype::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Gametype::create($data);

		return Redirect::route('gametypes.index');
	}

	/**
	 * Display the specified gametype.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$gametype = Gametype::findOrFail($id);

		return View::make('gametypes.show', compact('gametype'));
	}

	/**
	 * Show the form for editing the specified gametype.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$gametype = Gametype::find($id);

		return View::make('gametypes.edit', compact('gametype'));
	}

	/**
	 * Update the specified gametype in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$gametype = Gametype::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Gametype::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$gametype->update($data);

		return Redirect::route('gametypes.index');
	}

	/**
	 * Remove the specified gametype from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Gametype::destroy($id);

		return Redirect::route('gametypes.index');
	}

}
