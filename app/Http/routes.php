<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/','WebfrontController@gethome');
Route::get('/login','WebfrontController@get_login');
Route::post('/login','WebfrontController@login');
Route::get('/logout','WebfrontController@get_logout');
Route::get('/forgot-password','WebfrontController@get_forgot_password');
Route::post('/change_password','UserController@change_password');
Route::post('/update_profile','UserController@update_profile');
Route::get('/signup','WebfrontController@get_signup');
Route::post('/signup','WebfrontController@signup');
Route::post('/post_free_add','WebfrontController@save_add');
Route::get('/category/{category}','WebfrontController@get_category');
Route::get('/single-adds/{slug}','WebfrontController@get_single_adds');
Route::get('/about-us','WebfrontController@get_about_us');
Route::get('/terms-and-conditions','WebfrontController@get_terms_and_conditions');
Route::get('/privacy-policy','WebfrontController@get_privacy_policy');
Route::get('/contact-us','WebfrontController@get_contact_us');
Route::get('/faq','WebfrontController@get_faq');

Route::get('search','WebfrontController@search_result');
Route::get('/ajax_subcat/{cat_id}','WebfrontController@subcat_list');


/*-------- User acoount ---------*/
Route::get('/MyAccount','UserController@get_my_account');
Route::get('/MyAdds','UserController@get_my_adds');
Route::get('/statements','UserController@get_statements');

Route::group(['middleware'=>'auth'],function()
{
	Route::get('/post-free-add','WebfrontController@get_adds_form');
});



/* ---------  Admin Routs ---------------*/

Route::group(['prefix' => 'admin','middleware'=>'auth'], function () {
	// Route::auth();
	Route::get('dashboard', 'AdminController@get_dashboard');
	// Route::get('category', 'AdminController@get_category');
	Route::get('get_categories', 'AdminController@get_categories');
	Route::get('get_sub_categories', 'AdminController@get_sub_categories');
	Route::get('get_adds', 'AdminController@get_adds');


	Route::get('add_category', 'AdminController@add_categories');
	Route::post('add_category', 'AdminController@add_category');

	Route::get('add_sub_category', 'AdminController@add_sub_categories');
	Route::post('add_sub_category', 'AdminController@add_sub_category');

	Route::get('enable_category/{id}', 'AdminController@enable_category');
	Route::get('disable_category/{id}', 'AdminController@disable_category');

	Route::get('get_edit_category/{id}', 'AdminController@get_edit_category');
	Route::post('edit_category', 'AdminController@edit_category');

	Route::get('delete_category/{id}', 'AdminController@delete_category');
	Route::get('delete_sub_category/{id}', 'AdminController@delete_sub_category');

	Route::get('get_edit_sub_category/{id}', 'AdminController@get_edit_sub_category');
	Route::post('edit_sub_category', 'AdminController@edit_sub_category');

	Route::get('cities', 'AdminController@get_cities');

	Route::get('add_city', 'AdminController@get_add_city');
	Route::post('add_city', 'AdminController@add_city');

	Route::get('delete_city/{id}', 'AdminController@delete_city');
	Route::get('delete_add/{id}', 'AdminController@delete_add');

	Route::get('enable_city/{id}', 'AdminController@enable_city');
	Route::get('disable_city/{id}', 'AdminController@disable_city');

	Route::get('enable_add/{adds_id}', 'AdminController@enable_add');
	Route::get('disable_add/{adds_id}', 'AdminController@disable_add');


	Route::get('get_edit_city/{id}', 'AdminController@get_edit_city');
	Route::post('edit_city', 'AdminController@edit_city');
});



Route::get('/password',function(){

	echo Hash::make('123456');
});