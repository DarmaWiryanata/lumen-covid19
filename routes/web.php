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

$router->get('/', ['as' => 'index', 'uses' => 'HomeController@index']);
$router->get('/terima-kasih', ['as' => 'trims', 'uses' => 'HomeController@trims']);
$router->post('/', ['as' => 'store', 'uses' => 'HomeController@store']);
$router->get('/kabupaten/{id}', 'HomeController@getKabupatenByProvinsi');
$router->get('/kecamatan/{id}', 'HomeController@getKecamatanByKabupaten');
$router->get('/desa/{id}', 'HomeController@getDesaByKecamatan');

$router->group(['prefix' => 'kasus'], function () use ($router) {
    $router->get('/', ['as' => 'kasus.index', 'uses' => 'KasusController@index']);
    $router->get('/{id}', ['as' => 'kasus.show', 'uses' => 'KasusController@show']);
});

$router->group(['prefix' => 'kuesione'], function () use ($router) {
    $router->get('/{id}', ['as' => 'kuesioner.index', 'uses' => 'KuesionerController@index']);
    $router->get('/edit/{id}', ['as' => 'kuesioner.edit', 'uses' => 'KuesionerController@edit']);
});

$router->get('/tes', function() {
    return view('show');
});