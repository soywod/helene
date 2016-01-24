<?php

namespace App\Http\Controllers;

use Mail, Config;

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
		$user = User::find(1);
		$countWorks = $user->works->count();

		// Retrieve random works
		$randWorks = ($countWorks > 9 ? $user->works->random(9) : $user->works);

		// Return the view
		return view('front.home', compact('user', 'randWorks'));
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
		return view('front.works', compact('works'));
	}

	public function getContact()
	{
		$captchaSecret = env('CAPTCHA_SECRET');

		return view('front.contact', compact('captchaSecret'));
	}

	public function postContact(Requests\StoreContactRequest $request)
	{
		$params = $request->all();
		$captchaStr = '';
		$captchaParams = [
			'secret'   => env('CAPTCHA_SECRET'),
			'response' => $params['g-recaptcha-response'],
			'remoteip' => $request->getClientIp(),
		];

		// Transform captcha array into url get params
		foreach ($captchaParams as $key => $val)
		{
			$captchaStr .= $key . '=' . $val . '&';
		}

		rtrim($captchaStr, '&');

		// Make a curl call to google captcha
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify');
		curl_setopt($curl, CURLOPT_POST, count($captchaParams));
		curl_setopt($curl, CURLOPT_POSTFIELDS, $captchaStr);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$result = json_decode(curl_exec($curl), TRUE);
		curl_close($curl);

		// If OK, send mail
		if ($result['success'])
		{
			Mail::send('mail.new_message', compact('name', 'email', 'tel', 'message'), function ($mail)
			{
				$mail->to(env('MAIL_ADDRESS'))->subject(ucfirst(trans('front/contact.new_message_subject')));
			});

			return route('front.home')->with('message', ucfirst(trans('front/contact.success_sent')));
		}

		// Else back with error message
		else
		{
			return back()->with('message', ucfirst(trans('mail.captcha_failed')));
		}
	}
}
