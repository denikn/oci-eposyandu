<?php

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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/app_key', function() {
    return str_random(32);
});

$router->get('/jwt_key', function() {
    return str_random(32);
});

// $router->group(
//     ['middleware' => 'jwt.auth'], 
//     function() use ($router) {
//         $router->get('app_key', function() {
//             return str_random(32);
//         });
//     }
// );

$router->post('auth/login', ['uses' => 'v1\_Auth\AuthController@authenticate']);

$router->get('ortu/reads', ['uses' => 'v1\_Master\OrtuController@index']);

$router->post('register/ortu', ['uses' => 'v1\_Master\OrtuController@create']);

$router->group(
    ['middleware' => 'jwt.auth'], 
    function() use ($router) {
        $router->group(['prefix' => 'ortu'], function () use ($router) {
            $router->get('read', ['uses' => 'v1\_Master\OrtuController@index']);
            $router->post('create', ['uses' => 'v1\_Master\OrtuController@create']);
            $router->put('update', ['uses' => 'v1\_Master\OrtuController@update']);
            $router->delete('delete/{id}', ['uses' => 'v1\_Master\OrtuController@delete']);
        });

        $router->group(['prefix' => 'balita'], function () use ($router) {
            $router->get('read', ['uses' => 'v1\_Master\BalitaController@index']);
            $router->post('create', ['uses' => 'v1\_Master\BalitaController@create']);
            $router->put('update', ['uses' => 'v1\_Master\BalitaController@update']);
            $router->delete('delete/{id}', ['uses' => 'v1\_Master\BalitaController@delete']);
        });

        $router->group(['prefix' => 'pertumbuhan'], function () use ($router) {
            $router->get('read', ['uses' => 'v1\_Tumbang\PertumbuhanController@index']);
            $router->post('create', ['uses' => 'v1\_Tumbang\PertumbuhanController@create']);
            $router->put('update', ['uses' => 'v1\_Tumbang\BalitaController@update']);
            $router->delete('delete/{id}', ['uses' => 'v1\_Tumbang\BalitaController@delete']);
        });

        $router->group(['prefix' => 'imunisasi'], function () use ($router) {
            $router->get('read', ['uses' => 'v1\_Tumbang\ImunisasiController@index']);
            $router->post('create', ['uses' => 'v1\_Tumbang\ImunisasiController@create']);
            $router->put('update', ['uses' => 'v1\_Tumbang\ImunisasiController@update']);
            $router->delete('delete/{id}', ['uses' => 'v1\_Tumbang\ImunisasiController@delete']);
        });
    }
);



