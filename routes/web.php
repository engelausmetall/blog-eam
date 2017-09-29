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

//Aqui tengo la rutas que cree, la carpeta se creo modules al igual que el archivo basics.php
//Van doble guion bajo
require __DIR__ . '/modules/basics.php';
require __DIR__ . '/modules/eloquents.php';
require __DIR__ . '/modules/blog.php';

//Ruta para ver los logs
Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');