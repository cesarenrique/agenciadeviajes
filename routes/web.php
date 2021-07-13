<?php

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
Route::resource('pais', PaisController::class,['only'=>['index']]);
Route::post('HotelesCredenciales/prepare', 'HotelesCredencialesController@prepare')->name('HotelesCredenciales.prepare');
Route::resource('HotelesCredenciales', HotelesCredencialesController::class,['only'=>['index','create','store']]);
Route::resource('administration', AdministrationController::class,['only'=>['index']]);
Route::resource('pais.hotels', PaisHotelController::class,['only'=>['index']]);
Route::resource('pais.provincias', PaisProvinciaController::class,['only'=>['index']]);
Route::resource('provincias.hotels', ProvinciaHotelController::class,['only'=>['index']]);
Route::resource('provincias.localidads', ProvinciaLocalidadController::class,['only'=>['index']]);
Route::resource('localidads.hotels', LocalidadHotelController::class,['only'=>['index']]);
Route::resource('hotels.datos', HotelController::class,['only'=>['index']]);
Route::resource('hotels.alojamientos', HotelAlojamientoController::class,['only'=>['index']]);
Route::resource('alojamientos.habitacions', AlojamientoHabitacionController::class,['only'=>['index','show']]);
Route::resource('alojamientos.habitacions.fechas', AlojamientoHabitacionFechaController::class,['only'=>['store']]);
Route::post('alojamientos/{alojamiento}/habitacions/{habitacion}/reservas/nuevo', 'AlojamientoHabitacionReservaController@nuevo')->name('alojamientos.habitacions.reservas.nuevo');
Route::post('alojamientos/{alojamiento}/habitacions/{habitacion}/reservas/tarjeta', 'AlojamientoHabitacionReservaController@tarjeta')->name('alojamientos.habitacions.reservas.tarjeta');
Route::post('alojamientos/{alojamiento}/habitacions/{habitacion}/reservas/reservar', 'AlojamientoHabitacionReservaController@reservar')->name('alojamientos.habitacions.reservas.reservar');
Route::post('alojamientos/{alojamiento}/habitacions/{habitacion}/reservas/cliente', 'AlojamientoHabitacionReservaController@lookforCliente')->name('alojamientos.habitacions.reservas.cliente');
Route::resource('alojamientos.habitacions.reservas', AlojamientoHabitacionReservaController::class,['only'=>['store']]);
Route::resource('alojamientos.fechas', AlojamientoFechaController::class,['only'=>['create','store']]);
