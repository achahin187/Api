<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
///////all apis  /api here must be api auth:api=authenticated

Route::group(['middleware'=>['api','checkPassword','changeLanguage'],'namespace'=>'Api'], function () {

    Route::post('get_min_categories','categoriesController@index');
    Route::post('get_category_byID','categoriesController@getCategoryById');
    Route::post('change-status','categoriesController@changeStatus');
    Route::group(['prefix' => 'admin'], function () {
        Route::get('login','AuthController@login');

    });

});



Route::group(['middleware'=>['api','checkPassword','changeLanguage','checkAdminToken:admin_api'],'namespace'=>'Api'], function () {

   Route::get('offer','categoriesController@index');
});
