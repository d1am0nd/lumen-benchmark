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

$app->get('/', function () use ($app) {
    return 'Hello';
});

$app->get('api/first_db_result', function () use ($app) {
    return response()->json(app('db')->table('tests')->first());
});

$app->get('api/all_db_results', function () use ($app) {
    return response()->json(app('db')->table('tests')->get());
});

$app->get('api/string_result', function () use ($app) {
    return response("Lorem ipsum");
});
