<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\GoogleController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

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

if (App::environment('production')) {
    URL::forceScheme('https');
}

Route::get('/', function () {
    return view('home');
});

Route::post('/register', [AuthController::class, 'store'])->name('register');

Route::get('/login', [AuthController::class, 'login'])->name('login');

Route::post('/login-check', [AuthController::class, 'loginCheck'])->name('login-check');

Route::get('/dashboard', [AuthController::class, 'dashboard'])->middleware('isLoggedIn');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/google',[GoogleController::class,'redirectToGoole']);

Route::get('/google/callback',[GoogleController::class,'handleGoogleCallBack']);

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/login', [AdminAuthController::class, 'login'])->name('admin.login');

    Route::post('/login-check', [AdminAuthController::class, 'adminLoginCheck'])->name('login-check');

    Route::get('/dashboard', [AdminAuthController::class, 'dashboard'])->name('dashboard')->middleware('isAdminLoggedIn');

    Route::get('/logout', [AdminAuthController::class, 'logout'])->name('logout');
});
