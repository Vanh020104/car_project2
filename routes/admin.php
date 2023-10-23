<?php
Route::get("/home", [\App\Http\Controllers\AdminController::class, "homeAdmin"]);
Route::get("/detailOrder/{id:id}", [\App\Http\Controllers\AdminController::class, "detailOrder"]);
Route::get("/carsList", [\App\Http\Controllers\AdminController::class, "carsList"]);
Route::get("/ordersList", [\App\Http\Controllers\AdminController::class, "ordersList"]);


Route::prefix("product")->group(function (){
    Route::get("/create", [\App\Http\Controllers\ProductController::class, "create"]);
    Route::post("/create", [\App\Http\Controllers\ProductController::class, "store"]);
    Route::get("/edit/{product}", [\App\Http\Controllers\ProductController::class, "edit"]);
    Route::put("/edit/{product}", [\App\Http\Controllers\ProductController::class, "update"]);
    Route::delete("/delete/{product}", [\App\Http\Controllers\ProductController::class, "delete"]);
});
