<?php
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ScategorieController;
use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;




// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');
// Route::get("/categories",[CategorieController::class,"index"]);
// Route::post("/categories",[CategorieController::class,"store"]);
// Route::get("/categories/{id}",[CategorieController::class,"show"]);
// Route::delete("/categories/{id}",[CategorieController::class,"destroy"]);
// Route::put("/categories/{id}",[CategorieController::class,"update"]);
// Route::get("/scategories",[ScategorieController::class,"index"]);
// Route::post("/scategories",[ScategorieController::class,"store"]);


// Vous pouvez regrouper vos routes dans un seul middleware "api" pour éviter la redondance
Route::middleware('api')->group(function() {
    // Utilisez 'resource' au lieu de 'ressource'
    Route::resource("/categories", CategorieController::class);
    Route::resource("/scategories", ScategorieController::class);
    Route::resource("/articles", ArticleController::class);

});
