<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/seed', function ()
{
	for ($i = 0; $i < 50; $i++)
		factory(App\Work::class)->create();
});

Route::get('/', 'FrontController@getHome')->name('front.home');
Route::get('/works/{category}', 'FrontController@getWorks')->name('front.works');
Route::get('/work/{id}', 'FrontController@getWork')->name('front.work');

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web'], 'prefix' => 'admin'], function ()
{
	Route::get('/', 'BackController@getHome')->name('back.home');
	Route::get('/profile', 'BackController@getProfile')->name('back.profile.edit');
	Route::put('/profile', 'BackController@getProfile')->name('back.profile.update');

	Route::resource('category', 'CategoryController', [
		'names' => [
			'index'   => 'back.category.index',
			'create'  => 'back.category.create',
			'store'   => 'back.category.store',
			'edit'    => 'back.category.edit',
			'update'  => 'back.category.update',
			'destroy' => 'back.category.destroy',
		],
	]);

	Route::resource('work', 'WorkController', [
		'names' => [
			'index'   => 'back.work.index',
			'create'  => 'back.work.create',
			'store'   => 'back.work.store',
			'edit'    => 'back.work.edit',
			'update'  => 'back.work.update',
			'destroy' => 'back.work.destroy',
		],
	]);
});
