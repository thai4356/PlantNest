<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlantController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::controller(App\Http\Controllers\PlantController::class)->group(function () {
    Route::get('/add-plant','create');
    Route::post('/add-plant','store');
    Route::get('/show-plant','index');
//    Route::get('/edit-products/{product_id}','edit');
//    Route::put('/update-products/{product_id}','update');
//    Route::delete('/delete-product/{product_id}','destroy');
//    Route::get('/show-products','index');
//    Route::get('AddToCart/{id}',[productController::class,'AddToCart'])->name('AddToCart');
});
