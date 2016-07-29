<?php

    // Post authentication
    // Route::group(['middleware' => 'auth'], function() {

        // Item routes
        Route::get('/ipProducts', ['as' => 'ip.index.get', 'uses' => 'IPProductController@index']);
        Route::get('/ipProducts/create/{id?}', ['as' => 'ip.create.get', 'uses' => 'IPProductController@create']);
        Route::post('/ipProducts/store/{id?}', ['as' => 'ip.store', 'uses' => 'IPProductController@store']);
        Route::post('/ipProducts/destroy/{id?}', ['as' => 'ip.destroy.post', 'uses' => 'IPProductController@destroy']);
        
        
        // End Item routes
        
    // });
    