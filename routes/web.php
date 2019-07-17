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
//Ajax

Route::post('ajax_upload/action', 'AjaxUploadController@action')->name('ajaxupload.action');
Route::post('ajax_upload/action2', 'AjaxUploadController@action2')->name('ajaxupload.action2');
Route::post('ajax_upload/action3', 'AjaxUploadController@action3')->name('ajaxupload.action3');
Route::post('ajax_upload/action4', 'AjaxUploadController@action4')->name('ajaxupload.action4');
Route::post('ajax_upload/action5', 'AjaxUploadController@action5')->name('ajaxupload.action5');
Route::post('ajax_upload/action6', 'AjaxUploadController@action6')->name('ajaxupload.action6');
Route::post('ajax_upload/action7', 'AjaxUploadController@action7')->name('ajaxupload.action7');
Route::post('ajax_upload/action8', 'AjaxUploadController@action8')->name('ajaxupload.action8');
Route::post('ajax_upload/action9', 'AjaxUploadController@action9')->name('ajaxupload.action9');
Route::post('ajax_upload/action10', 'AjaxUploadController@action10')->name('ajaxupload.action10');
Route::post('ajax_upload/action11', 'AjaxUploadController@action11')->name('ajaxupload.action11');
Route::post('ajax_upload/action12', 'AjaxUploadController@action12')->name('ajaxupload.action12');
Route::post('ajax_upload/action13', 'AjaxUploadController@action13')->name('ajaxupload.action13');
Route::post('ajax_upload/action14', 'AjaxUploadController@action14')->name('ajaxupload.action14');
Route::post('ajax_upload/action15', 'AjaxUploadController@action15')->name('ajaxupload.action15');
Route::post('ajax_upload/actionn', 'AjaxUploadController@actionn')->name('ajaxupload.actionn');
Route::post('ajax_upload/action22', 'AjaxUploadController@action22')->name('ajaxupload.action22');
Route::post('ajax_upload/action33', 'AjaxUploadController@action33')->name('ajaxupload.action33');
Route::post('ajax_upload/action44', 'AjaxUploadController@action44')->name('ajaxupload.action44');
Route::post('ajax_upload/action55', 'AjaxUploadController@action55')->name('ajaxupload.action55');
Route::post('ajax_upload/profile', 'AjaxUploadController@profile')->name('ajaxupload.profile');

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
Route::get('admin_livestream/approve{id}', ['uses' => 'LiveAdminController@postApprove', 'as' => 'approvedLive']);
Route::get('admin_livestream/disapprove{id}', ['uses' => 'LiveAdminController@postDisapprove', 'as' => 'disapprovedLive']);
Route::put('comments/{id}', ['uses' => 'CommentsController@update', 'as' => 'comments.update']);
Route::delete('comments/{id}', ['uses' => 'CommentsController@destroy', 'as' => 'comments.destroy']);
Route::get('comments/{id}/delete', ['uses' => 'CommentsController@delete', 'as' => 'comments.delete']);

Route::get('admin_livestream', 'LiveAdminController@index')->name('admin_livestream.index');

Route::get('admin_livestream/{id}', 'LiveAdminController@show')->name('admin_livestream.show');
Route::delete('admin_livestream/{id}', 'LiveAdminController@destroy')->name('admin_livestream.destroy');

Route::prefix('reporter')->group(function() {
    Route::get('/login', 'Auth\JournalistLoginController@showLoginForm')->name('journalist.login');
    Route::post('/login', 'Auth\JournalistLoginController@login')->name('journalist.login.submit');
    Route::get('/dashboard', 'JournalistController@index')->name('journalist.dashboard');
    Route::get('/profile', 'JournalistController@profile')->name('journalist.profile');
    Route::get('/pictures', 'PictureController@index')->name('journalist.picture');
    Route::get('/pictures/upload', 'PictureController@create')->name('journalist.picture.create');
    Route::post('/pictures', 'PictureController@save')->name('journalist.picture.submit');
    Route::put('/profile/{id}', 'JournalistController@profileUpdate')->name('journalist.profile.update');
    Route::resource('reporterposts', 'ReporterPostController');
    Route::resource('livestream', 'LiveStreamController');
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

Route::get('videos', 'PagesController@getVideos');

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
Route::get('messages/{id}', 'MsgController@show')->name('messages.show');
// Password Reset Routes
/*
Route::get('password/reset/{token?}', 'Auth\ResetPasswordController@showResetForm');
Route::post('password/email', ['as'=>'password.email', 'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail']);
Route::post('password/reset', 'Auth\ResetPasswordController@reset');
*/

Route::get('{slug}', ['as' => 'single', 'uses' => 'SingleController@getSingle'])
->where('slug', '[\w\d\-\_]+');


Route::get('livestream/{slug}', ['as' => 'live_single', 'uses' => 'SingleController@getLive'])
->where('slug', '[\w\d\-\_]+');

Route::post('getSearch', 'searchController@getSearch')->name('pages.postSearch');

Route::get('search', 'searchController@index')->name('pages.search');