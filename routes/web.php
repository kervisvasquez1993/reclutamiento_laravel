<?php

use App\Http\Controllers\VacanteController;
use App\Vacante;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// vacantes
/* 
Route::get('/vacantes', 'VacanteController@index')->name('vacantes.index');
Route::get('/vacantes/create', 'VacanteController@create')->name('vacantes.create');
Route::post('/vacantes, VacanteController@store')->name('vacantes.store'); */
Route::resource('/vacantes', 'VacanteController');


//subir imagenes

Route::post('vacantes/imagen', 'VacanteController@imagen')->name('vacantes.imagen');
Route::post('vacantes/borrarimagen', 'VacanteController@borrarImagen' )->name('vacante.borrar');

