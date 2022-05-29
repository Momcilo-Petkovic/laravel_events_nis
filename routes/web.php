<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
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


// HOME STUFF

Route::get('/home', [HomeController::class, 'authCheck']);


// AUTHENTHICATION STUFF
Route::get('/login', [CustomAuthController::class,'login'])->name('login')->middleware('alreadyLoggedIn');
Route::get('/registration', [CustomAuthController::class,'registration'])->name('registration');

Route::post('/register-user', [CustomAuthController::class, 'registerUser'])->name('register-user');
Route::post('/login-user', [CustomAuthController::class, 'loginUser'])->name('login-user');
Route::get('/dashboard', [CustomAuthController::class, 'dashboard'])->name('dashboard')->middleware('isLoggedIn');
Route::get('/logout', [CustomAuthController::class, 'logout']);

Route::get('/user/verify/{token}', [CoustomAuthController::class, 'verifyEmail']);



// ADMIN STUFF
Route::get('/adminlogin', [AdminController::class, 'adminLogin'])->name('adminlogin')->middleware('alreadyLoggedInA'); // link do login_a VIEW
Route::get('/adminregister', [AdminController::class, 'adminRegistration'])->name('adminregister')->middleware('alreadyLoggedInA'); // link do register_a VIEW

Route::post('/register-admin', [AdminController::class, 'registerAdmin'])->name('register-admin'); // funkcija za registraciju
Route::post('/login-admin', [AdminController::class, 'loginAdmin'])->name('login-admin'); // funkcija za logovanje
Route::get('/admin-dashboard', [AdminController::class, 'adminDashboard'])->name('admin-dashboard')->middleware('isLoggedInA');
Route::get('/admin-logout', [AdminController::class, 'adminLogout']);

Route::post('/insert-place', [AdminController::class, 'insertPlace'])->name('insert-place');

Route::get('/admin-dashboard', [AdminController::class, 'returnData']);


Route::post('/insert-performance', [AdminController::class, 'insertPerformance'])->name('insert-performance');
Route::post('/insert-genre', [AdminController::class, 'insertGenre'])->name('insert-genre');
Route::post('/insert-type', [AdminController::class, 'insertType'])->name('insert-type');