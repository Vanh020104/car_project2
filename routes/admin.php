<?php
Route::get("/home", [\App\Http\Controllers\AdminController::class, "homeAdmin"]);
Route::get("/detailOrder/{id}", [\App\Http\Controllers\AdminController::class, "detailOrder"]);
Route::get("/carsList", [\App\Http\Controllers\AdminController::class, "carsList"]);
Route::get("/ordersList", [\App\Http\Controllers\AdminController::class, "ordersList"]);
Route::put("/updateStatus/{order}", [\App\Http\Controllers\AdminController::class, "updateStatus"]);
Route::get("/order_today", [\App\Http\Controllers\AdminController::class, "orderToday"]);
Route::get("/monthlyRevenue", [\App\Http\Controllers\AdminController::class, "monthlyRevenue"]);
Route::get("/historyOrder", [\App\Http\Controllers\AdminController::class, "historyOrder"]);
Route::get("/revenue-chart", [\App\Http\Controllers\AdminController::class, "revenueChart"]);
Route::get("/category-counts", [\App\Http\Controllers\AdminController::class, "categoryCounts"]);
Route::post("/uploadImageCVD/{order}", [\App\Http\Controllers\AdminController::class, "uploadImageCVD"]);
Route::post("/uploadImageReturn/{order}", [\App\Http\Controllers\AdminController::class, "uploadImageReturn"]);
Route::post("/damage/{order}", [\App\Http\Controllers\AdminController::class, "damage"]);
Route::put("/updateSttRemind/{order}", [\App\Http\Controllers\AdminController::class, "updateSttRemind"]);
Route::get("/remindReturnCar", [\App\Http\Controllers\AdminController::class, "remindReturnCar"]);
Route::prefix("product")->group(function (){
    Route::get("/create", [\App\Http\Controllers\ProductController::class, "create"]);
    Route::post("/create", [\App\Http\Controllers\ProductController::class, "store"]);
    Route::get("/edit/{product}", [\App\Http\Controllers\ProductController::class, "edit"]);
    Route::put("/edit/{product}", [\App\Http\Controllers\ProductController::class, "update"]);
    Route::delete("/delete/{product}", [\App\Http\Controllers\ProductController::class, "delete"]);
});
