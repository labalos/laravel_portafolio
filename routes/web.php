<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProyectoController;
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


Route::get('/',[App\Http\Controllers\PortafolioController::class, 'index']);

Route::middleware(['auth:sanctum', 'verified'])->group(function(){
    Route::resource('/proyectos', ProyectoController::class);
    Route::get('/dashboard', function(){
        return view('dashboard');
    })->name('dashboard');
});

Route::get('user', 'UserController@index')->name('user');

Route::post('user', 'UserController@index')->name('user');