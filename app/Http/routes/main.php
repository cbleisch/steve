<?php

	// Pre authentication
	Route::get('/', ['as' => 'dashboard.index.get', 'uses' => 'DashboardController@getIndex']);
	// Post authentication
	Route::group(['middleware' => 'auth'], function()
	{
		Route::post('/data_table/update_length', ['as' => 'data_table.update_length.post', 'uses' => 'DataTableController@postDataTableUpdateLength']);

    });
        