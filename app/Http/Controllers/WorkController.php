<?php
declare(strict_types = 1);

namespace App\Http\Controllers;

use Redirect, View;

use Illuminate\Http\{
	Request,
	Response,
	RedirectResponse
};

use App\Http\ {
	Requests,
	Controllers\Controller
};

use App\Http\Requests\CreateOrUpdateWorkRequest;
use App\Work;

class WorkController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\View\View
	 */
	public function index() : \Illuminate\View\View
	{
		$works = Work::all()->sortBy('created_at');

		return View::make('back.work.index', compact('works'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\View\View
	 */
	public function create() : \Illuminate\View\View
	{
		return View::make('back.work.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  CreateOrUpdateWorkRequest $request
	 * @return RedirectResponse
	 */
	public function store(CreateOrUpdateWorkRequest $request) : RedirectResponse
	{
		$params = $request->all();

		$params['sold'] = isset($params['sold']);
		Work::create($params);

		return Redirect::route('back.work.index')->with('message', trans('back/work.created'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param int $id
	 * @return \Illuminate\View\View
	 */
	public function edit(int $id) : \Illuminate\View\View
	{
		$work = Work::find($id);

		return View::make('back.work.edit', compact('work'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param CreateOrUpdateWorkRequest $request
	 * @param int $id
	 * @return RedirectResponse
	 */
	public function update(CreateOrUpdateWorkRequest $request, $id) : RedirectResponse
	{
		$work = Work::find($id);
		$params = $request->all();

		$params['sold'] = isset($params['sold']);
		$work->update($params);

		return Redirect::route('back.work.index')->with('message', trans('back/work.updated'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		//
	}
}
