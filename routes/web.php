<?php

use Illuminate\Support\Facades\Route;

Route::get('/', ['uses' => 'VehiculeController@index', 'as' => 'vehicule']);


Route::post('/vehicule/store', ['as' => 'vehicule.store', 'uses' => 'VehiculeController@store']);
Route::post('/modele/store', ['as' => 'modele.store', 'uses' => 'VehiculeController@store_modele']);
Route::post('/marque/store', ['as' => 'marque.store', 'uses' => 'VehiculeController@store_marque']);

Route::get('/vehicule/delete/{id}', ['as' => 'vehicule.delete', 'uses' => 'VehiculeController@delete_vehicule']);

Route::get('/vehicule/edit/{id}', ['as' => 'vehicule.edit', 'uses' => 'VehiculeController@edit']);
Route::post('/vehicule/update', ['as' => 'vehicule.update', 'uses' => 'VehiculeController@update']);
