<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/* Include individual menu grouping routes */
foreach(File::allFiles(__DIR__.'/routes') as $partial)
{
	require_once $partial->getPathName();
}

Route::get('/home', function()
{
	return redirect('/');
});

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);


// Route::get('/', function () {
//     return view('welcome');
// });
