<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ScategorieController;




// Route d'accueil
Route::get('/', function () {
    return view('welcome');
});

// Routes pour la gestion des catégories (CRUD)
Route::resource('categories', CategorieController::class);
Route::resource('categories', ScategorieController::class);


