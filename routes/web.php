<?php

/** @var \Laravel\Lumen\Routing\Router $router */
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

// Generate key
$router->get('/key', function() {
    return Str::random(32);
});

$router->group(['prefix' => 'admin'], function () use ($router) {

    $router->get('/', [
        'as' => 'admin.index', 'uses' => 'HomeController@index'
    ]);

    $router->get('/{id}', [
        'as' => 'admin.show', 'uses' => 'HomeController@show'
    ]);
    
});

$router->get('/tes', function() {
    return view('show');
});