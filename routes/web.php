<?php

use Illuminate\Support\Facades\Route;

use Carbon\Carbon;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/',[App\Http\Controllers\HomeController::class,"home"]);
Route::get('/detail/{product:slug}', [\App\Http\Controllers\HomeController::class,"product"])->name('product.detail');
Route::get('/category/{category:slug}', [\App\Http\Controllers\HomeController::class,"category"]);

Route::get('/errors', [\App\Http\Controllers\HomeController::class, "Errors"])->name("errors");
Route::get('/cars_list', [\App\Http\Controllers\HomeController::class,"cars_list"]);
Route::get('/filters', [\App\Http\Controllers\HomeController::class,"filterProducts"]);
Route::get('/car_list/{category:slug}', [\App\Http\Controllers\HomeController::class,"cars"]);
Route::get('/filter/{category:slug}', [\App\Http\Controllers\HomeController::class,"filterProduct"]);





Route::middleware("auth")->group(function (){
    Route::get('/add-to-cart/{product}', [\App\Http\Controllers\HomeController::class,"addToCart"]);
    Route::get('/cart', [\App\Http\Controllers\HomeController::class,"cart"]);
    Route::get('/delete-from-cart/{product}', [\App\Http\Controllers\HomeController::class, "deleteFromCart"]);
    Route::get('/clear-cart', [\App\Http\Controllers\HomeController::class, "clearCart"]);
    Route::post('/checkout', [\App\Http\Controllers\HomeController::class,"placeOrder"]);
    Route::get('/thank-you/{order}', [\App\Http\Controllers\HomeController::class,"thankYou"]);
    Route::get('/feedback/{order}', [\App\Http\Controllers\HomeController::class,"feedback"]);
    Route::post('/feedbacks', [\App\Http\Controllers\HomeController::class,"placefeedback"]);


    Route::get('/checkout', [\App\Http\Controllers\HomeController::class,"checkout"])->name('checkout');
    Route::get('/paypal-success/{order}', [\App\Http\Controllers\HomeController::class,"paypalSuccess"]);
    Route::get('/paypal-cancel/{order}', [\App\Http\Controllers\HomeController::class,"paypalCancel"]);
    Route::get('account_profile', [\App\Http\Controllers\HomeController::class,"accountProfile"]);
    Route::get('/renewed', [\App\Http\Controllers\HomeController::class, "getAvailableProducts"])->name("renewed");
    Route::get('account_favorites', [\App\Http\Controllers\HomeController::class,"accountFavorites"]);
    Route::post('/favorites/add', [\App\Http\Controllers\HomeController::class,"addFavorite"])->name('favorites.add');
    Route::get('/favorites', [\App\Http\Controllers\HomeController::class,"showFavorites"])->name('favorites.show');
    Route::get('/favorites/remove/{favoriteId}', [\App\Http\Controllers\HomeController::class, 'removeFromFavorites'])->name('favorites.remove');
    Route::get('/car_list', [\App\Http\Controllers\HomeController::class,"cars"]);
    Route::get('/filter', [\App\Http\Controllers\HomeController::class,"filterProduct"]);
    Route::get("/confirmUser/{order}", [\App\Http\Controllers\HomeController::class, "confirmUser"]);
    Route::get("/confirmUserCompleted/{order}", [\App\Http\Controllers\HomeController::class, "confirmUserCompleted"]);
    Route::get("/detailsBill/{order}", [\App\Http\Controllers\HomeController::class, "detailsBill"]);
    Route::get('/cars_list', [\App\Http\Controllers\HomeController::class,"cars_list"]);
    Route::get('/filters', [\App\Http\Controllers\HomeController::class,"filterProducts"]);
    Route::get('/add_extend/{order}', [\App\Http\Controllers\HomeController::class,"addExtend"]);
    Route::put("/processingCancel/{order}",[\App\Http\Controllers\AdminController::class,"processingCancel"]);
    Route::get("/confirmUser/{order}", [\App\Http\Controllers\AdminController::class, "confirmUser"]);
    Route::post('/update/{id}', [\App\Http\Controllers\HomeController::class,"update"])->name('update');
});




Auth::routes();
Route::get('/home_admin', [App\Http\Controllers\HomeController::class, 'homeAdmin']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware(["auth","is_admin"])->prefix("admin")->group(function () {
    include_once "admin.php";
});
