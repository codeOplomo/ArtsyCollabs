<?php

use App\Http\Controllers\ArtProjectsController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PartnersController;
use App\Http\Controllers\ProfileController;
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
//     return view('register');
// });

// Auth::routes();

Route::get('/', function () {
    return redirect()->route('register');
});


Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::resource('profile', ProfileController::class)->only(['index']);
    Route::resource('art-projects', ArtProjectsController::class)->only(['index']);
    Route::resource('partners', PartnersController::class)->only(['index']);
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
