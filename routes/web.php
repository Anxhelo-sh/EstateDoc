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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::group(['middleware'=>['auth']],function() {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::post('properties', [\App\Http\Controllers\PropertyController::class, 'store'])->name('properties.store');
    Route::get('properties/create', [\App\Http\Controllers\PropertyController::class, 'create'])->name('properties.create');
    Route::put('properties/{property}', [\App\Http\Controllers\PropertyController::class, 'update'])->name('properties.update');
    Route::delete('properties/{property}', [\App\Http\Controllers\PropertyController::class, 'destroy'])->name('properties.destroy');
    Route::get('properties/{property}/edit', [\App\Http\Controllers\PropertyController::class, 'edit'])->name('properties.edit');
    Route::get('user/properties', [\App\Http\Controllers\PropertyController::class, 'getPropertyByUser'])->name('properties.user');

}) ;
Route::get('properties', [\App\Http\Controllers\PropertyController::class, 'index'])->name('properties.index');
Route::get('properties/{property}', [\App\Http\Controllers\PropertyController::class, 'show'])->name('properties.show');
