<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class FrontController extends Controller
{
	public function getHome()
	{
		$user = User::find(1);

		return view('front.getHome', compact('user'));
	}
}
