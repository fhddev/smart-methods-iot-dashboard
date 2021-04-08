<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['auth'])->group(function(){
    Route::get('/', 'HomeController@home')->name('home');

    // Maps
    Route::get('maps', 'MapController@index')->name('maps.index');

    Route::get('maps/create', 'MapController@create')->name('maps.create');

    Route::post('maps/details', 'MapController@details')->name('maps.details');

    Route::post('maps/create', 'MapController@store')->name('maps.store');

    Route::delete('maps/destroy/{id}', 'MapController@destroy')->name('maps.destroy');

    // Simulator
    Route::get('emulator', 'SimulatorController@index')->name('simu.index');
});
    
Auth::routes([
    'register' => false,
    'confirm' => false,
    'email' => false,
    'update' => false,
    'request' => false,
    'reset' => false,
    'verify' => false,
    ]); 