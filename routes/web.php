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







Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('posts', 'PostController');

Route::post('ajax_upload/action', 'AjaxUploadController@action')->name('ajaxupload.action');
Route::post('ajax_upload/action2', 'AjaxUploadController@action2')->name('ajaxupload.action2');
Route::post('ajax_upload/action3', 'AjaxUploadController@action3')->name('ajaxupload.action3');
Route::post('ajax_upload/action4', 'AjaxUploadController@action4')->name('ajaxupload.action4');
Route::post('ajax_upload/action5', 'AjaxUploadController@action5')->name('ajaxupload.action5');

// Sports
Route::resource('sports', 'SportController', ['except' => ['create']]);

// Locations
Route::resource('locations', 'LocationController', ['except' => ['create']]);

// Tags
Route::resource('tags', 'TagController', ['except' => ['create']]);

Route::get('comments', 'CommentsController@index')->name('comments.index');
Route::get('comments/{id}/edit', ['uses' => 'CommentsController@edit', 'as' => 'comments.edit']);
Route::get('comments/approve{id}', ['uses' => 'CommentsController@postApprove', 'as' => 'approvedApplications']);
Route::get('comments/disapprove{id}', ['uses' => 'CommentsController@postDisapprove', 'as' => 'disapprovedApplications']);
Route::put('comments/{id}', ['uses' => 'CommentsController@update', 'as' => 'comments.update']);
Route::delete('comments/{id}', ['uses' => 'CommentsController@destroy', 'as' => 'comments.destroy']);
Route::get('comments/{id}/delete', ['uses' => 'CommentsController@delete', 'as' => 'comments.delete']);

Route::prefix('reporter')->group(function() {
    Route::get('/login', 'Auth\JournalistLoginController@showLoginForm')->name('journalist.login');
    Route::post('/login', 'Auth\JournalistLoginController@login')->name('journalist.login.submit');
    Route::get('/dashboard', 'JournalistController@index')->name('journalist.dashboard');
    Route::resource('reporterposts', 'ReporterPostController');
});


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

Route::get('inkuru/{tag}', 'PagesController@getTags')->name('tags');



// Comments
Route::post('comments/{post_id}', ['uses' => 'CommentsController@store', 'as' => 'comments.store']);


/*Route::post('getSearch', function(Request $req){
    $find = Post::where('title','like','%'.$req->search.'%')->get();
    return view('pages.search')->withPosts($find);
})->name('pages.postSearch');*/

//Route::get('{search}', ['as' => 'pages.search', 'uses' => 'searchController@index'])
//->where('search', '[\w\d\-\_]+');

// Messages
Route::get('messages', 'MsgController@index')->name('messages.index');
// Password Reset Routes
/*
Route::get('password/reset/{token?}', 'Auth\ResetPasswordController@showResetForm');
Route::post('password/email', ['as'=>'password.email', 'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail']);
Route::post('password/reset', 'Auth\ResetPasswordController@reset');
*/

Route::get('{slug}', ['as' => 'single', 'uses' => 'SingleController@getSingle'])
->where('slug', '[\w\d\-\_]+');

Route::post('getSearch', 'searchController@getSearch')->name('pages.postSearch');

Route::get('search', 'searchController@index')->name('pages.search');