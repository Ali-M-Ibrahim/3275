<?php

use App\Http\Controllers\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('getStudents',[StudentController::class,'index']);
Route::get('getStudent/{id}',[StudentController::class,'getById']);
Route::post('addStudent',[StudentController::class,'create']);
