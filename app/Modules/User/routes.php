<?php

use Illuminate\Support\Facades\Route;

$namespace = 'App\Modules\User\Controllers';

Route::group([
    'module' => 'Api',
    'prefix' => 'api',
    'namespace' => $namespace,
    'middleware' => ['language'],
], function () {
    Route::post('login', 'LoginController@login');
});

Route::group([
    'module' => 'Api',
    'prefix' => 'api',
    'namespace' => $namespace,
    'middleware' => ['jwt', 'language', 'admin'],
], function () {
    Route::get('users', 'UserController@index');
    Route::post('users', 'UserController@store');
});
