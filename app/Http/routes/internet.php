<?php

    // Post authentication
    // Route::group(['middleware' => 'auth'], function() {

        // Item routes
        Route::get('/internetProducts', ['as' => 'internet.index.get', 'uses' => 'InternetProductController@index']);
        Route::get('/internetProducts/create/{id?}', ['as' => 'internet.create.get', 'uses' => 'InternetProductController@create']);
        Route::post('/internetProducts/store/{id?}', ['as' => 'internet.store', 'uses' => 'InternetProductController@store']);
        Route::post('/internetProducts/destroy/{id?}', ['as' => 'internet.destroy.post', 'uses' => 'InternetProductController@destroy']);
        Route::get('/internetProducts/{id}/{packageID}/getPrice', ['as' => 'internet.price.get', 'uses' => 'InternetProductController@getPrice']);
        // End Item routes
        
    // });
    