<?php

use Illuminate\Http\Request;

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
Route::post('/ajouter_cat_cour', 'prof_cour@store');
Route::post('/modify_cat_cour', 'prof_cour@modifycat');

Route::post('/delete_cat_cour', 'prof_cour@deletecat');
Route::post('/delete_cour', 'prof_cour@deletecour');
Route::post('/delete_model', 'prof_cour@deletechap');
Route::post('/delete_moncours', 'prof_cour@deletemoncours');
Route::post('/delete_travaux', 'prof_cour@deletetravaux');
Route::post('/ajouter_cours', 'prof_cour@ajoutercour');
Route::post('/ajouter_cours_pdf', 'prof_cour@ajoutercourpdf');
Route::post('/ajouter_chap', 'prof_cour@ajouterchap');
Route::post('/ajouter_travaux_pdf', 'prof_cour@ajoutertravaux');
Route::post('/ajouter_etud_travaux_pdf', 'prof_cour@ajouteretudtravaux');
Route::post('/changer_clef', 'prof_cour@changerclef');
Route::post('/modify_name_chap', 'prof_cour@modifychap');

Route::get('/test', 'prof_cour@test');
