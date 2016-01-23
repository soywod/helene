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

use Redirect, View;

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
}
