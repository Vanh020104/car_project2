<?php
Route::get("/home", [\App\Http\Controllers\AdminController::class, "homeAdmin"]);
Route::get("/detailOrder/{id}", [\App\Http\Controllers\AdminController::class, "detailOrder"]);
Route::get("/carsList", [\App\Http\Controllers\AdminController::class, "carsList"]);
Route::get("/ordersList", [\App\Http\Controllers\AdminController::class, "ordersList"]);
Route::put("/updateStatus/{order}", [\App\Http\Controllers\AdminController::class, "updateStatus"]);
Route::put("/updateStatus3/{order_id}", [\App\Http\Controllers\AdminController::class, "updateStatus3"]);
Route::get("/order_today", [\App\Http\Controllers\AdminController::class, "orderToday"]);
Route::get("/monthlyRevenue", [\App\Http\Controllers\AdminController::class, "monthlyRevenue"]);
Route::get("/historyOrder", [\App\Http\Controllers\AdminController::class, "historyOrder"]);
Route::get("/revenue-chart", [\App\Http\Controllers\AdminController::class, "revenueChart"]);
Route::get("/category-counts", [\App\Http\Controllers\AdminController::class, "categoryCounts"]);
Route::post("/uploadImageCVD/{order}", [\App\Http\Controllers\AdminController::class, "uploadImageCVD"]);
Route::post("/uploadImageReturn/{order}", [\App\Http\Controllers\AdminController::class, "uploadImageReturn"]);
Route::post("/damage/{order}", [\App\Http\Controllers\AdminController::class, "damage"]);
Route::put("/updateSttRemind/{order}", [\App\Http\Controllers\AdminController::class, "updateSttRemind"]);
Route::get("/confirmUser/{order}", [\App\Http\Controllers\AdminController::class, "confirmUser"]);
Route::get("/remindReturnCar", [\App\Http\Controllers\AdminController::class, "remindReturnCar"]);
Route::get("/billOrderCompleted/{id}", [\App\Http\Controllers\AdminController::class, "billOrderCompleted"]);
Route::get("/feedback", [\App\Http\Controllers\AdminController::class, "feedback"]);
Route::get("/overdueReminder", [\App\Http\Controllers\AdminController::class, "overdueReminder"]);
Route::delete("/deleteFeedback/{feedback}", [\App\Http\Controllers\AdminController::class, "deleteFeedback"]);
Route::post("/remindOverdue/{order}", [\App\Http\Controllers\AdminController::class, "remindOverdue"]);
Route::get("/users", [\App\Http\Controllers\AdminController::class, "users"]);
Route::get("/newUser", [\App\Http\Controllers\AdminController::class, "newUser"]);
Route::post("/newUser",[\App\Http\Controllers\AdminController::class,"postNewUser"]);
Route::get("/historyDamages",[\App\Http\Controllers\AdminController::class,"historyDamages"]);
Route::get("/historyUser/{user}",[\App\Http\Controllers\AdminController::class,"historyUser"]);
Route::get("/billOrderCompletedUser/{id}", [\App\Http\Controllers\AdminController::class, "billOrderCompletedUser"]);

Route::prefix("product")->group(function (){
    Route::get("/create", [\App\Http\Controllers\ProductController::class, "create"]);
    Route::post("/create", [\App\Http\Controllers\ProductController::class, "store"]);
    Route::get("/edit/{product}", [\App\Http\Controllers\ProductController::class, "edit"]);
    Route::put("/edit/{product}", [\App\Http\Controllers\ProductController::class, "update"]);
    Route::delete("/delete/{product}", [\App\Http\Controllers\ProductController::class, "delete"]);
});
