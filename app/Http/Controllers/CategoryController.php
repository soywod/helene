<?php
declare(strict_types = 1);
namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Redirect, View;

use Illuminate\Http\
{
	Request,
	Response,
	RedirectResponse
};

use App\Http\
{
	Requests,
	Controllers\Controller
};

use App\Category;

class CategoryController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\View\View
	 */
	public function index() : \Illuminate\View\View
	{
		$categories = Category::all()->sortBy('name');

		return View::make('back.category.index', compact('categories'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\View\View
	 */
	public function create() : \Illuminate\View\View
	{
		return View::make('back.category.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  StoreCategoryRequest $request
	 * @return RedirectResponse
	 */
	public function store(StoreCategoryRequest $request) : RedirectResponse
	{
		$params = $request->all();

		$params['slug'] = strtolower($params['slug']);
		Category::create($params);

		return Redirect::route('back.category.index')->with('message', trans('back/category.success_stored'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int $id
	 * @return \Illuminate\View\View
	 */
	public function edit(int $id) : \Illuminate\View\View
	{
		$category = Category::find($id);

		return View::make('back.category.edit', compact('category'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  UpdateCategoryRequest $request
	 * @param  int $id
	 * @return RedirectResponse
	 */
	public function update(UpdateCategoryRequest $request, $id) : RedirectResponse
	{
		$category = Category::find($id);
		$params = $request->all();

		$params['slug'] = strtolower($params['slug']);
		$category->update($params);

		return Redirect::route('back.category.index')->with('message', trans('back/category.success_updated'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 * @return RedirectResponse
	 */
	public function destroy(int $id) : RedirectResponse
	{
		if (Category::destroy($id) > 0)
		{
			return Redirect::back()->with('message', ucfirst(trans('back/category.success_deleted')));
		}
		else
		{
			return Redirect::back()->with('message', ucfirst(trans('back/category.error_deleted')));
		}
	}
}
