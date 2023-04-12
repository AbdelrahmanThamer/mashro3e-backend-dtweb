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

Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers\Api\v1'], function () {
    
  Route::post('/login', 'UserController@login');
  Route::post('/floating_menu', 'UserController@getFloatingMenuList');
  Route::post('/userLogout', 'UserController@userLogout');
  Route::post('/getSettings', 'UserController@getSettings');


  
  Route::post('/getNotificationList', 'UserController@getNotificationList');
  Route::post('/getSplashScreenList', 'UserController@getSplashScreenList');
  Route::post('/getMenuList', 'UserController@getMenuList');
  Route::post('/getIntroductionScreenList', 'UserController@getIntroductionScreenList');
  Route::post('/general_settings', 'UserController@generalSettings');
  Route::post('/social_share', 'UserController@getSocialShareList');

  });
