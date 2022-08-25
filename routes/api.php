<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;

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

Route::group([ 

    'middleware' => 'api', 

    'prefix' => 'auth' 

], function ($router) { 

    Route::post('login','App\Http\Controllers\authController@login'); 
    Route::post('logout','App\Http\Controllers\authController@logout'); 
    Route::post('refresh','App\Http\Controllers\authController@refresh'); 
    Route::post('me','App\Http\Controllers\authController@me');
    Route::post('register','App\Http\Controllers\authController@register');  

}); 

Route::group([
    'middleware' => 'api',
    'prefix' => 'message',
], function ($router) {
    Route::post('register','App\Http\Controllers\mensajeController@registrarMensaje');
    Route::post('give','App\Http\Controllers\mensajeController@consultarMensaje');
    Route::post('readed/{id}','App\Http\Controllers\mensajeController@cambioEstado');
    Route::post('delete/{id}','App\Http\Controllers\mensajeController@eliminar');
});
