<?php

namespace App\Http\Controllers;

use App\Category;
use App\User;
use App\Work;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class FrontController extends Controller
{
	public function getHome()
	{
		// Retrieve user
		// TODO use Auth::user() instead
		$user = User::find(1);

		// Retrieve random works
		$randWorks = $user->works->random(9);

		// Return the view
		return view('front.getHome', compact('user', 'randWorks'));
	}

	public function getWorks($parCategory)
	{
		// Retrieve offset param
		$offset = Input::get('offset');

		// Try to get current category by slug
		$category = Category::where('slug', $parCategory)->get()->first();

		// If not found try by id
		if (is_null($category))
		{
			$category = Category::find($parCategory);
		}

		// Retrieve all works
		$works = (is_null($category) ? Work::all() : $category->works);

		// Return the view
		return view('front.getWorks', compact('works'));
	}

	public function getWork($parId)
	{
		// Try to get current category by slug
		$work = Work::find((int)$parId);
		$work->thumbnail = url('img/work', $work->thumbnail);

		// Return the view
		return response()->json($work);
	}
}
