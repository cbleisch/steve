<?php

    // Post authentication
    // Route::group(['middleware' => 'auth'], function() {

        // Item routes
        Route::get('/agreementLengths', ['as' => 'agreementLength.index.get', 'uses' => 'AgreementLengthController@index']);
        Route::get('/agreementLengths/create/{id?}', ['as' => 'agreementLength.create.get', 'uses' => 'AgreementLengthController@create']);
        Route::post('/agreementLengths/store/{id?}', ['as' => 'agreementLength.store', 'uses' => 'AgreementLengthController@store']);
        Route::post('/agreementLengths/destroy/{id?}', ['as' => 'agreementLength.destroy.post', 'uses' => 'AgreementLengthController@destroy']);
        
        
        // End Item routes
        
    // });
    