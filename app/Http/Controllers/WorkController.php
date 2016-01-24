<?php
declare(strict_types = 1);

namespace App\Http\Controllers;

use Redirect, View, Request, Image, Auth;

use Illuminate\Http\
{
	Response,
	RedirectResponse
};

use App\Http\
{
	Requests,
	Controllers\Controller
};

use App\Http\Requests\StoreOrUpdateWorkRequest;
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
	 * @param  StoreOrUpdateWorkRequest $request
	 * @return RedirectResponse
	 */
	public function store(StoreOrUpdateWorkRequest $request) : RedirectResponse
	{
		$params = $request->all();
		$params['sold'] = isset($params['sold']);
		$params['user_id'] = Auth::user()->id;
		$work = Work::create($params);

		rename(public_path('img/upload/' . $work->thumbnail), public_path('img/work/' . $work->thumbnail));

		$this->clearUploads();

		return Redirect::route('back.work.index')->with('message', ucfirst(trans('back/work.success_stored')));
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
	 * @param StoreOrUpdateWorkRequest $request
	 * @param int $id
	 * @return RedirectResponse
	 */
	public function update(StoreOrUpdateWorkRequest $request, $id) : RedirectResponse
	{
		$work = Work::find($id);
		$params = $request->all();

		$params['sold'] = isset($params['sold']);
		$work->update($params);

		rename(public_path('img/upload/' . $work->thumbnail), public_path('img/work/' . $work->thumbnail));

		$this->clearUploads();

		return Redirect::route('back.work.index')->with('message', ucfirst(trans('back/work.success_updated')));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 * @return RedirectResponse
	 */
	public function destroy(int $id) : RedirectResponse
	{
		if (Work::destroy($id) > 0)
		{
			return Redirect::back()->with('message', ucfirst(trans('back/work.success_deleted')));
		}
		else
		{
			return Redirect::back()->with('message', ucfirst(trans('back/work.error_deleted')));
		}
	}

	/**
	 * Upload an image
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function postUpload() : \Illuminate\Http\JsonResponse
	{
		// Retrieve file and generate random name
		$file = Request::file('file');
		$name = str_random();
		$ext = $file->getClientOriginalExtension();

		Image::make($file->getRealPath())->save(public_path('img/upload/' . $name . '.' . $ext));

		return response()->json([
			'name' => $name . '.' . $ext,
			'path' => url('img/upload', $name . '.' . $ext),
		]);
	}

	private function clearUploads()
	{
		$tmpImages = glob(public_path('img/upload/*'));
		foreach ($tmpImages as $image)
		{
			if (is_file($image))
			{
				unlink($image);
			}
		}
	}
}
