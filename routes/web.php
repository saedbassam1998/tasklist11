<?php
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/','TaskController@index');
Route::get('task/{id}', 'TaskController@show');
Route::post('store','TaskController@store');
Route::delete('delete/{id}','TaskController@destroy') ;
Route::post('edit/{id}', 'TaskController@edit');
Route::patch('update/{id}','TaskController@update');
