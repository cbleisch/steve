<?php

    // Post authentication
    // Route::group(['middleware' => 'auth'], function() {

        // Item routes
        Route::get('/tvProducts', ['as' => 'tv.index.get', 'uses' => 'TVProductController@index']);
        Route::get('/tvProducts/create/{id?}', ['as' => 'tv.create.get', 'uses' => 'TVProductController@create']);
        Route::post('/tvProducts/store/{id?}', ['as' => 'tv.store', 'uses' => 'TVProductController@store']);
        Route::post('/tvProducts/destroy/{id?}', ['as' => 'tv.destroy.post', 'uses' => 'TVProductController@destroy']);
        
        // End Item routes
        
    // });
    