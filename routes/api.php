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

Route::middleware('api')->get('/lol', function (Request $request) {
    echo 12;
});
Route::middleware('api')->group(function () {
    Route::get('films', 'FrontendController@index');
    Route::get('films/{slug}', 'FrontendController@film');
});