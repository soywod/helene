<?php
declare(strict_types = 1);

namespace App\Http\Controllers;

use App\
{
	Category,
	Work
};

use App\Http\Requests;
use App\User;
use Illuminate\Http\RedirectResponse;

use Illuminate\Support\Facades\Lang;
use Redirect, Response, View, Request, Image;

class BackController extends Controller
{
	/**
	 * Redirect to admin profile page.
	 *
	 * @return RedirectResponse
	 */
	public function getHome() : RedirectResponse
	{
		return Redirect::route('back.profile.edit');
	}

	/**
	 * Get admin profile page.
	 *
	 * @return \Illuminate\View\View
	 */
	public function getProfile() : \Illuminate\View\View
	{
		$user = User::find(1);

		return View::make('back.profile.edit', compact('user'));
	}

	/**
	 * Admin profile update action.
	 *
	 * @param Requests\UpdateProfileRequest $request
	 * @return RedirectResponse
	 */
	public function postProfile(Requests\UpdateProfileRequest $request) : RedirectResponse
	{
		$user = User::find(1);
		$user->desc = $request->input('desc');
		$user->save();

		return Redirect::back()->with('message', ucfirst(trans('back/profile.success_updated')));
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
		$user = User::find(1);

		// Delete all images in public/img/user
		$images = glob(public_path('img/user/*'));
		foreach ($images as $image)
		{
			if (is_file($image))
			{
				unlink($image);
			}
		}

		Image::make($file->getRealPath(), [
			'width'  => 200,
			'height' => 200,
		])->save(public_path('img/user/' . $name . '.' . $ext));

		$user->thumbnail = $name . '.' . $ext;
		$user->save();

		return Response::json(url('img/user', $name . '.' . $ext));
	}
}
