<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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

$router->get('/author', 'AuthorController@index');
$router->post('/author', 'AuthorController@store');
$router->get('/author/{author}', 'AuthorController@show');
$router->put('/author/{author}', 'AuthorController@update');
$router->patch('/author/{author}', 'AuthorController@update');
$router->delete('/author/{author}', 'AuthorController@destroy');
