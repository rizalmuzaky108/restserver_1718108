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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('Baju', 'BajuController@data');
Route::get('Baju/{id}', 'BajuController@data');
Route::post('Baju', 'Bajucontroller@insert_data_baju');
Route::put('Baju/update{id}', 'Bajucontroller@update_data_baju');
Route::delete('Baju/delete{id}', 'Bajucontroller@delete_data_baju');


