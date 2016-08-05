<?php

    // Post authentication
    // Route::group(['middleware' => 'auth'], function() {

        // Item routes
        Route::get('/proposals', ['as' => 'proposal.index.get', 'uses' => 'ProposalController@index']);
        Route::get('/proposals/create/{id?}', ['as' => 'proposal.create.get', 'uses' => 'ProposalController@create']);
        Route::post('/proposals/store/{id?}', ['as' => 'proposal.store', 'uses' => 'ProposalController@store']);
        Route::post('/proposals/destroy/{id?}', ['as' => 'proposal.destroy.post', 'uses' => 'ProposalController@destroy']);
        
        
        // End Item routes
        
    // });
    