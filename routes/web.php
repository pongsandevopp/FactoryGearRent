<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\RentalController;
use Illuminate\Support\Facades\Auth;

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

Auth::routes([
    'register' => true, // Register Routes...
    'reset' => true, // Reset Password Routes...
    'verify' => true, // Email Verification Routes...
]);

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('Dashboard');
Route::get('/Dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('Dashboard');

Route::resource('/Users', UserController::class);
Route::resource('/Item', ItemController::class);
Route::resource('/Rentals', RentalController::class);
