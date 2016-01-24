<?php

namespace App\Http\Requests;

use App\Category;
use App\Http\Requests\Request;

class UpdateCategoryRequest extends Request
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
			'name' => 'required',
			'slug' => 'required|unique:categories,slug,' . $this->segment(3) . '|regex:/^[a-zA-Z\-]+$/',
		];
	}
}
