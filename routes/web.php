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


$router->group(['prefix' => 'api'], function () use ($router) {
  $router->get('package',  ['uses' => 'PackageController@showAll']);
  $router->get('package/{id}',  ['uses' => 'PackageController@show']);
  $router->post('package',  ['uses' => 'PackageController@insertData']);
  $router->put('package/{id}', ['uses' => 'PackageController@update']);
  $router->patch('package/{id}', ['uses' => 'PackageController@update']);
  $router->delete('package/{id}', ['uses' => 'PackageController@delete']);
});