<?php

use Illuminate\Support\Facades\Route;
//Usar el controlador que creamos
use App\Http\Controllers\controladorCalif;
use App\Http\Controllers\adminController;
Use App\Http\Controllers\profeController;

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

//Manejo de vistas utilizando controlador
Route::get('/', [controladorCalif::class, 'index'])->name('index');
Route::get('/hola', [controladorCalif::class, 'hola'])->name('hola');
Route::get('/login', [controladorCalif::class, 'login'])->name('login')->middleware('guest');
Route::post('/validacion', [controladorCalif::class, 'validacion']);
//ESTA RUTA LA VA A MANEJAR adminController
//Route::get('/registro', [controladorCalif::class, 'registro'])->name('registro');
Route::post('/guardar', [controladorCalif::class, 'guardar'])->name('guardar');
Route::get('/menu', [controladorCalif::class, 'menulog'])->name('menulog')->middleware('auth');
Route::get('/logout', [controladorCalif::class, 'logout'])->name('logout');
Route::get('/materias', [controladorCalif::class, 'materias'])->name('materias');

Route::resource('/admin', adminController::class);
Route::resource('/docente', profeController::class);
/*
--Manejo de las vistas--

Route::get('/', function () {
    return view('index');
});

Route::get('/hola', function () {
    $nom = "Emilio el perrillo"; //Declaracion de variables
    $mats = array("Diseño web", "Base de datos", "Desarrollo movil"); //Declaracion de variables
    $cal = 8;
    $num = 1;

    return view('hola')
    ->with('nom', $nom) //Enviar variables con with
    ->with('mats', $mats)
    ->with('cal', $cal)
    ->with('num', $num); //Enviar variables con with
});

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
});
*/

