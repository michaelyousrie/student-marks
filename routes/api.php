<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'students'], function () {
    Route::get('/', 'Api\StudentsController@index');
    Route::get('/{student}/marks', 'Api\StudentsController@listMarks');
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

Route::group(['prefix' => 'marks'], function () {
    Route::post('/', 'Api\MarksController@store');
    Route::patch('/{mark}', 'Api\MarksController@update');
});
