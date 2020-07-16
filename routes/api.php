<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'students'], function () {
    Route::get('/', 'Api\StudentsController@index');
    Route::post('/', 'Api\StudentsController@store');
    Route::patch('/{student}', 'Api\StudentsController@update');
    Route::delete('/{student}', 'Api\StudentsController@destroy');
});

Route::group(['prefix' => 'subjects'], function () {
    Route::get('/', 'Api\SubjectsController@index');
    Route::post('/', 'Api\SubjectsController@store');
    Route::patch('/{subject}', 'Api\SubjectsController@update');
    Route::delete('/{subject}', 'Api\SubjectsController@destroy');
});
