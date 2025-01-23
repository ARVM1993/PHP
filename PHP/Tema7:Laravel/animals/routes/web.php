<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalController;

Route::get('/', function () {
    return view('welcome');
});

Route::get("/hello", function () {
    return "Hello, World!" ;
});

Route::get("/user/{id}", function (string $id) {
    return "hola user con id $id";
});


Route::resource("/animal", AnimalController::class);