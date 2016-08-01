<?php

    // Post authentication
    // Route::group(['middleware' => 'auth'], function() {

        // Item routes
        Route::get('/ipProducts', ['as' => 'ip.index.get', 'uses' => 'StaticIpProductController@index']);
        Route::get('/ipProducts/create/{id?}', ['as' => 'ip.create.get', 'uses' => 'StaticIpProductController@create']);
        Route::post('/ipProducts/store/{id?}', ['as' => 'ip.store', 'uses' => 'StaticIpProductController@store']);
        Route::post('/ipProducts/destroy/{id?}', ['as' => 'ip.destroy.post', 'uses' => 'StaticIpProductController@destroy']);
        
        
        // End Item routes
        
    // });
    