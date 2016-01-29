<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UpdateProfileRequest extends Request
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return TRUE;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'desc'                  => 'required',
			'email'                 => 'required|email',
			'password'              => 'required_with:password_confirmation',
			'password_confirmation' => 'required_with:password',
		];
	}
}
