<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('v1')->group(function (){
    Route::get('posts', 'ApiPageController@getAll');

    Route::get('athletic', 'ApiPageControllerr@getAthletic');

    Route::get('cycling', 'ApiPageController@getCycling');

    Route::get('cricket', 'ApiPageController@getCricket');

    Route::get('swimming', 'ApiPageController@getSwimming');

    Route::get('handball', 'ApiPageController@getHandball');

    Route::get('rugby', 'ApiPageController@getRugby');

    Route::get('volleyball', 'ApiPageController@getVolleyball');

    Route::get('football', 'ApiPageController@getFootball');

    Route::get('basketball', 'ApiPageController@getBasketball');

    Route::get('other', 'ApiPageController@getOther');

    Route::get('asia', 'ApiPageController@getAsia');

    Route::get('america', 'ApiPageController@getAmerica');

    Route::get('germany', 'ApiPageController@getGermany');

    Route::get('italy', 'ApiPageController@getItaly');

    Route::get('france', 'ApiPageController@getFrance');

    Route::get('spain', 'ApiPageController@getSpain');

    Route::get('england', 'ApiPageController@getEngland');

    Route::get('africa', 'ApiPageController@getAfrica');

    Route::get('rwanda', 'ApiPageController@getRwanda');

    Route::get('posts/{slug}', 'ApiPageController@getSingle')
        ->where('slug', '[\w\d\-\_]+');
});
