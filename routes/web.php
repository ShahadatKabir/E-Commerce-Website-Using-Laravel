<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SliderController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('index');
});

 Route::get('/backend', function () {
     return view('backend.home');
 });

Route::resource('brands',\App\Http\Controllers\BrandController::class);

Route::middleware('auth')->group(function () {
    Route::resource('products',ProductController::class);
    Route::get('product/active/{id}',[ProductController::class,'ProductInactive'])->name('product.inactive');
    Route::get('product/Inactive/{id}',[ProductController::class,'ProductActive'])->name('product.active');
});

Route::resource('categories',\App\Http\Controllers\CategoryController::class);
Route::resource('sliders',\App\Http\Controllers\SliderController::class);
Route::middleware('auth')->group(function () {
    Route::get('/backend/logout', [\App\Http\Controllers\BackEndController::class, 'destroy'])->name('backend.logout');

});
Route::get('/dashboard', function () {
    return view('backend.home');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
