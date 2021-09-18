<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'v1', 'namespace' => 'Api\V1'], function () {
   
    Route::post('/register','AuthController@register');
    Route::post('/login','AuthController@login');
   
   Route::group([ 'middleware' => ['auth:api']], function () {

        Route::post('/logout','AuthController@logout');
        
        Route::get('/permissions','PermissionController@index')->middleware('scope:permission_access');

        Route::apiResource('/roles','RoleController');
        
        Route::apiResource('/users','UserController');

        Route::post('users/{user}/is_permitted','UserController@checkIfUserPermitted');
   });
});


