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
		$category_id = Category::where('slug', $this->input('slug'))->first()->id;

		return [
			'name' => 'required',
			'slug' => 'required|unique:categories,slug,' . $category_id . '|regex:/^[a-zA-Z\-]+$/',
		];
	}
}
