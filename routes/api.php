<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', 'App\Http\Controllers\MainApi@index');
Route::get('base', 'App\Http\Controllers\MainApi@index');
Route::get('kota', 'App\Http\Controllers\MainApi@getKota');
Route::get('find/{param}', 'App\Http\Controllers\MainApi@find');
Route::get('downloadData/{tb_name}', 'App\Http\Controllers\MainApi@downloadData');