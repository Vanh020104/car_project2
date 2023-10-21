<?php
Route::get("/dashboard", [\App\Http\Controllers\AdminController::class, "homeAdmin"]);
Route::get("/detailOrder/{id:id}", [\App\Http\Controllers\AdminController::class, "detailOrder"]);
Route::get("/cars", [\App\Http\Controllers\AdminController::class, "cars"]);
Route::get("/order", [\App\Http\Controllers\AdminController::class, "orders"]);
