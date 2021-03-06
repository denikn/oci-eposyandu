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

$router->group([
    // 'namespace' => 'App\Http\Controllers\v1', 
    'prefix'=> 'v1/',
    // 'middleware' => ['jwt.auth', 'student_access_token']
], function ($router) {
    require __DIR__.'/../routes/v1/api.php';
});
