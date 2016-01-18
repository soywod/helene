<?php
declare(strict_types = 1);

namespace App\Http\Controllers;

use App\
{
	Category,
	Work
};

use App\Http\
{
	Requests,
	Controllers\Controller
};

use Illuminate\Http\
{
	Request,
	RedirectResponse
};

use \Illuminate\View\View;
use Redirect;

class BackController extends Controller
{
	/**
	 * Redirect to admin profile page.
	 *
	 * @return RedirectResponse
	 */
	public function getHome() : RedirectResponse
	{
		return redirect()->route('back.profile');
	}

	/**
	 * Get admin profile page.
	 *
	 * @return View
	 */
	public function getProfile() : View
	{
		return view('back.getProfile');
	}
}
