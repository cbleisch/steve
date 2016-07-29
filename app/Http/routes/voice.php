<?php

    // Post authentication
    // Route::group(['middleware' => 'auth'], function() {

        // Item routes
        Route::get('/voiceVroducts', ['as' => 'voice.index.get', 'uses' => 'VoiceProductController@index']);
        Route::get('/voiceVroducts/create/{id?}', ['as' => 'voice.create.get', 'uses' => 'VoiceProductController@create']);
        Route::post('/voiceVroducts/store/{id?}', ['as' => 'voice.store', 'uses' => 'VoiceProductController@store']);
        Route::post('/voiceVroducts/destroy/{id?}', ['as' => 'voice.destroy.post', 'uses' => 'VoiceProductController@destroy']);
        
        
        // End Item routes
        
    // });
    