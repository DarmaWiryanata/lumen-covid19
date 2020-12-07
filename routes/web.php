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
$router->post('/', ['as' => 'store', 'uses' => 'HomeController@store']);
$router->get('/desa/{id}', 'HomeController@getDesaByKecamatan');
$router->get('/kabupaten/{id}', 'HomeController@getKabupatenByProvinsi');
$router->get('/kecamatan/{id}', 'HomeController@getKecamatanByKabupaten');
$router->get('/terima-kasih', ['as' => 'trims', 'uses' => 'HomeController@trims']);
$router->get('/visualisasi', ['as' => 'visualisasi', 'uses' => 'HomeController@visualisasi']);

$router->group(['prefix' => 'kasus'], function () use ($router) {
    $router->get('/', ['as' => 'kasus.index', 'uses' => 'KasusController@index']);
    $router->get('/{id}', ['as' => 'kasus.show', 'uses' => 'KasusController@show']);
    $router->post('/store', ['as' => 'kasus.store', 'uses' => 'KasusController@store']);
    $router->post('/update', ['as' => 'kasus.update', 'uses' => 'KasusController@update']);
    $router->post('/{id}/delete', ['as' => 'kasus.delete', 'uses' => 'KasusController@delete']);
});

$router->group(['prefix' => 'kuesione'], function () use ($router) {
    $router->get('/{id}', ['as' => 'kuesioner.index', 'uses' => 'KuesionerController@index']);
    $router->get('/show/{id}', ['as' => 'kuesioner.show', 'uses' => 'KuesionerController@show']);
    $router->post('/store', ['as' => 'kuesioner.store', 'uses' => 'KuesionerController@store']);
    $router->post('/update', ['as' => 'kuesioner.update', 'uses' => 'KuesionerController@update']);
    $router->post('/{id}/delete', ['as' => 'kuesioner.delete', 'uses' => 'KuesionerController@delete']);
});

$router->get('/tes', function() {
    return view('visualisasi.visualisasi');
});

$router->group(['namespace' => 'Api', 'prefix' => 'api'], function () use ($router) {
    $router->get('', ['as' => 'index', 'uses' => 'HomeController@index']);
    $router->get('wilayah', ['as' => 'index', 'uses' => 'HomeController@wilayah']);
    $router->get('tahun_lahir', ['as' => 'index', 'uses' => 'HomeController@tahun_lahir']);
    $router->get('jenis_kelamin', ['as' => 'index', 'uses' => 'HomeController@jenis_kelamin']);
    $router->get('pendidikan_terakhir', ['as' => 'index', 'uses' => 'HomeController@pendidikan_terakhir']);
    $router->get('pekerjaan', ['as' => 'index', 'uses' => 'HomeController@pekerjaan']);
});