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

Route::get('/','routepage@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('Cat_cours/{id_user}/{cour_prof_id}','routepage@cat');
Route::put('inscription/cours/{cour_prof_id}','routepage@inscetud');
Route::get('mon_cours','routepage@moncours');
Route::get('travaux','routepage@travaux');
Route::get('travaux/{id_user}/{cour_prof_id}','routepage@travauxfaire');
Route::get('messagers','routepage@messagers');

