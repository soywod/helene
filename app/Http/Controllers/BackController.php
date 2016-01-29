<?php
declare(strict_types = 1);

namespace App\Http\Controllers;

use \App\
{
	Category,
	User,
	Work
};

use \Request, \Image, \Auth, \Hash;
use \App\Http\Requests\UpdateProfileRequest;
use \Illuminate\Http\RedirectResponse;
use \Illuminate\View\View;
use \Illuminate\Http\JsonResponse;

class BackController extends Controller
{
	/**
	 * Redirect to the admin profile page.
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function getHome() : RedirectResponse
	{
		// Redirect to the admin profile page
		return redirect()->route('back.profile.get');
	}

	/**
	 * Get admin profile page.
	 *
	 * @return \Illuminate\View\View
	 */
	public function getProfile() : View
	{
		// Return the edit profile view
		return view('back.profile.edit');
	}

	/**
	 * Admin profile update action.
	 *
	 * @param \App\Http\Requests\UpdateProfileRequest $request the incoming request
	 * @return \Illuminate\Http\RedirectResponse the redirect response
	 */
	public function postProfile(UpdateProfileRequest $request) : RedirectResponse
	{
		// Init params and current user
		$params = $request->all();
		$user = Auth::user();

		// Update user's email, desc and thumbnail
		$user->update($params);

		// If new password entered, update user's password
		if (! empty($params['password']))
		{
			$user->password = Hash::make($params['password']);
		}

		// Save user
		$user->save();

		// Return back with success message
		return back()->with('message', ucfirst(trans('back/profile.success_updated')));
	}

	/**
	 * Admin profile upload photo action.
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function postUpload() : JsonResponse
	{
		// Retrieve file and generate random name
		$file = Request::file('file');
		$name = str_random();
		$ext = $file->getClientOriginalExtension();
		$user = Auth::user();

		// Delete all images in public/img/user
		$images = glob(public_path('img/user/*'));
		foreach ($images as $image)
		{
			if (is_file($image))
			{
				unlink($image);
			}
		}

		// Make the new image
		Image::make($file->getRealPath(), [
			'width'  => 200,
			'height' => 200,
		])->save(public_path('img/user/' . $name . '.' . $ext));

		// Update user thumbnail and save
		$user->thumbnail = $name . '.' . $ext;
		$user->save();

		// Return a JSON response containing the full path of the final image
		return response()->json(url('img/user', $name . '.' . $ext));
	}
}
