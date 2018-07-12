<?php
/*
 * Este archivo va a contener TODAS las rutas de
 * nuestra aplicación.
 *
 * Para esto, vamos a crear una clase Route cuya
 * función sea la de registrar y administrar las rutas.
 */
use EPHP\Core\Route;

// Registramos la primer ruta! :D
Route::add('GET', '/', 'HomeController@index');


//Register Page start method GET and POST
Route::add('GET', '/register', 'RegisterController@index');
Route::add('POST', '/register', 'RegisterController@save');

//Login Page start method GET and POST
Route::add('GET', '/login', 'LoginController@index');
Route::add('POST', '/login', 'LoginController@access');

//Dashboard site start social network fans football
Route::add('GET', '/dashboard', 'DashboardController@index');
Route::add('POST', '/dashboard', 'DashboardController@actions');