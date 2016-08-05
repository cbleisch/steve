<?php

    // Post authentication
    // Route::group(['middleware' => 'auth'], function() {

        // Item routes
        Route::get('/packages', ['as' => 'package.index.get', 'uses' => 'ProductPackageController@index']);
        Route::get('/packages/create/{id?}', ['as' => 'package.create.get', 'uses' => 'ProductPackageController@create']);
        Route::post('/packages/store/{id?}', ['as' => 'package.store', 'uses' => 'ProductPackageController@store']);
        Route::post('/packages/destroy/{id?}', ['as' => 'package.destroy.post', 'uses' => 'ProductPackageController@destroy']);
        Route::get('/packages/{id}/getSelects', ['as' => 'package.selects.get', 'uses' => 'ProductPackageController@getSelects']);
        
        
        // End Item routes
        
    // });
    