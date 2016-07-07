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
Route::get('/forgot-password','WebfrontController@get_forgot_password');
Route::get('/signup','WebfrontController@get_signup');
Route::post('/signup','WebfrontController@signup');
Route::get('/post-free-add','WebfrontController@get_adds_form');
Route::post('/post_free_add','WebfrontController@save_add');
Route::get('/category','WebfrontController@get_category');
Route::get('/single-adds','WebfrontController@get_single_adds');
Route::get('/about-us','WebfrontController@get_about_us');
Route::get('/terms-and-conditions','WebfrontController@get_terms_and_conditions');
Route::get('/privacy-policy','WebfrontController@get_privacy_policy');
Route::get('/contact-us','WebfrontController@get_contact_us');
Route::get('/faq','WebfrontController@get_faq');







Route::get('/password',function(){

	echo Hash::make('123456');
});