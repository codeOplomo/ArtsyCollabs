<?php

use App\Http\Controllers\ArtProjectsController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
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


// Auth::routes();

// Route::get('/', function () {
//     return redirect()->route('register');
// });

Route::get('/', function () {
    return view('test');
});

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile-admin', [DashboardController::class, 'profile'])->name('admin.profile');

    Route::resource('profile', ProfileController::class)->only(['index', 'store']);
    Route::resource('art-projects', ArtProjectsController::class)->only(['index', 'store']);
    Route::resource('partners', PartnersController::class)->only(['index', 'store']);
});



// Route::get('/dashboard', function () {
//     return view('dashboard.dashmin');
// })->name('dashboard');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


