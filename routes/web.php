<?php
use App\Http\Controllers\PropertyController;
use Illuminate\Support\Facades\Route;

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
Auth::routes();

Route::get('/',[\App\Http\Controllers\PropertyController::class, 'index']);
Route::get('/home', [\App\Http\Controllers\PropertyController::class, 'index'])->name('home');
/*
 * Routes  for the property detail page
 * & Listing property page
 * */
Route::get('properties', [\App\Http\Controllers\PropertyController::class, 'index'])->name('properties.index');

/*
 * Routes  for :
 * -My Properties
 * Update & Delete & Create  Property
 * */

Route::group(['middleware' => ['host','auth']], function () {
    Route::get('user/properties', [\App\Http\Controllers\PropertyController::class, 'getPropertyByUser'])->name('properties.user');
    Route::post('properties', [\App\Http\Controllers\PropertyController::class, 'store'])->name('properties.store');
    Route::get('properties/create', [\App\Http\Controllers\PropertyController::class, 'create'])->name('properties.create');
    Route::put('properties/{property}', [\App\Http\Controllers\PropertyController::class, 'update'])->name('properties.update');
    Route::delete('properties/{property}', [\App\Http\Controllers\PropertyController::class, 'destroy'])->name('properties.destroy');
    Route::get('properties/{property}/edit', [\App\Http\Controllers\PropertyController::class, 'edit'])->name('properties.edit');

});

Route::get('properties/{property}', [\App\Http\Controllers\PropertyController::class, 'show'])->name('properties.show');


/*
 * Routes  for :
 * -Reservation Page
 *
 * */
Route::group(['middleware' => ['simpleuser','auth']], function () {
    Route::get('reservations/create/{property}', [\App\Http\Controllers\ReservationController::class, 'create'])->name('reservations.create');
    Route::post('reservations/store', [\App\Http\Controllers\ReservationController::class, 'store'])->name('reservations.store');
    Route::post('reviews/store', [\App\Http\Controllers\ReviewController::class, 'store'])->name('reviews.store');

});



