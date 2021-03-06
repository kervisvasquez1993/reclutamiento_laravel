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
/* rutas protegidas */
Route::group(['middleware' => ['auth']], function(){
    Route::get('/vacantes', 'VacanteController@index')->name('vacantes.index'); 
    Route::get('/vacantes/create', 'VacanteController@create')->name('vacantes.create');
    Route::post('/vacantes', 'VacanteController@store')->name('vacantes.store');
    Route::delete('vacantes/{vacante}','VacanteController@destroy' )->name('vacante.destroy');
    //subir imagenes
    Route::post('vacantes/imagen', 'VacanteController@imagen')->name('vacantes.imagen');
    Route::post('vacantes/borrarimagen', 'VacanteController@borrarImagen' )->name('vacante.borrar');
    //Notificaciones
    Route::get('/notificaciones', 'NotificacionesController')->name('notificaciones');

});

//enviar datos para la vacantes
Route::get('/candidatos/{id}', 'CandidatoController@index')->name('candidatos.index');
Route::post('/candidatos/store' , 'CandidatoController@store')->name('candidato.store');
Route::get('/vacantes/{vacante}', 'VacanteController@show')->name('vacantes.show');

//cambiar estado de la vacante

Route::post('/vacantes/{vacante}', 'VacanteController@estado')->name('vacante.estado');




