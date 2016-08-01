<?php

    // Post authentication
    // Route::group(['middleware' => 'auth'], function() {

        // Item routes
        Route::get('/tvProducts', ['as' => 'tv.index.get', 'uses' => 'TvProductController@index']);
        Route::get('/tvProducts/create/{id?}', ['as' => 'tv.create.get', 'uses' => 'TvProductController@create']);
        Route::post('/tvProducts/store/{id?}', ['as' => 'tv.store', 'uses' => 'TvProductController@store']);
        Route::post('/tvProducts/destroy/{id?}', ['as' => 'tv.destroy.post', 'uses' => 'TvProductController@destroy']);
        
        // End Item routes
        
    // });
    