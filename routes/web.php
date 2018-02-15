<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('contact', ['uses' => 'PagesController@getContact', 'as' => 'contact']);
Route::post('contact', 'PagesController@postContact');

Route::get('athletic', 'PagesController@getAthletic');

Route::get('cycling', 'PagesController@getCycling');

Route::get('cricket', 'PagesController@getCricket');

Route::get('swimming', 'PagesController@getSwimming');

Route::get('handball', 'PagesController@getHandball');

Route::get('rugby', 'PagesController@getRugby');

Route::get('volleyball', 'PagesController@getVolleyball');

Route::get('football', 'PagesController@getFootball');

Route::get('basketball', 'PagesController@getBasketball');

Route::get('other', 'PagesController@getOther');

Route::get('asia', 'PagesController@getAsia');

Route::get('america', 'PagesController@getAmerica');

Route::get('germany', 'PagesController@getGermany');

Route::get('italy', 'PagesController@getItaly');

Route::get('france', 'PagesController@getFrance');

Route::get('spain', 'PagesController@getSpain');

Route::get('england', 'PagesController@getEngland');

Route::get('africa', 'PagesController@getAfrica');

Route::get('rwanda', 'PagesController@getRwanda');

Route::get('/', ['uses' => 'PagesController@getIndex', 'as' => '/']);

Route::resource('posts', 'PostController');

// Sports
Route::resource('sports', 'SportController', ['except' => ['create']]);

// Locations
Route::resource('locations', 'LocationController', ['except' => ['create']]);

// Tags
Route::resource('tags', 'TagController', ['except' => ['create']]);

// Comments
Route::post('comments/{post_id}', ['uses' => 'CommentsController@store', 'as' => 'comments.store']);
Route::get('comments', 'CommentsController@index')->name('comments.index');
Route::get('comments/{id}/edit', ['uses' => 'CommentsController@edit', 'as' => 'comments.edit']);
Route::get('comments/approve{id}', ['uses' => 'CommentsController@postApprove', 'as' => 'approvedApplications']);
Route::get('comments/disapprove{id}', ['uses' => 'CommentsController@postDisapprove', 'as' => 'disapprovedApplications']);
Route::put('comments/{id}', ['uses' => 'CommentsController@update', 'as' => 'comments.update']);
Route::delete('comments/{id}', ['uses' => 'CommentsController@destroy', 'as' => 'comments.destroy']);
Route::get('comments/{id}/delete', ['uses' => 'CommentsController@delete', 'as' => 'comments.delete']);

// Messages
Route::get('messages', 'MsgController@index')->name('messages.index');
// Password Reset Routes
/*
Route::get('password/reset/{token?}', 'Auth\ResetPasswordController@showResetForm');
Route::post('password/email', ['as'=>'password.email', 'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail']);
Route::post('password/reset', 'Auth\ResetPasswordController@reset');
*/


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/journalistadmin', 'JournalistController@index');
Route::prefix('journalistadmin')->group(function() {
    Route::get('/login', 'Auth\JournalistLoginController@showLoginForm')->name('journalist.login');
    Route::post('/login', 'Auth\JournalistLoginController@login')->name('journalist.login.submit');
    Route::get('/dashboard', 'JournalistController@index')->name('journalist.dashboard');
});

Route::get('inkuru/{tag}', 'PagesController@getTags')->name('tags');

Route::get('{slug}', ['as' => 'single', 'uses' => 'SingleController@getSingle'])
->where('slug', '[\w\d\-\_]+');
