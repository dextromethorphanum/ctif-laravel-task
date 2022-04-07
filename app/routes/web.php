<?php

use App\Http\Controllers\APIController;
use App\Http\Controllers\IBANController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
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

Route::get('/', [IndexController::class, 'index']);
Route::post('/php/ibanAPI.php', [APIController::class, 'main']);

Route::prefix('admin')->name('admin.')->middleware(['auth', 'auth.isAdmin'])->group(function () {
    Route::resource('/users', UserController::class);
    Route::resource('/ibans', IBANController::class);

    Route::view('/', 'admin.index')->name('index');
    Route::view('/create-user', 'admin.users.create')->name('create-user');
    Route::get('/roles-management', [UserController::class, 'index'])->name('roles-management');
    Route::get('/ibans-management', [IBANController::class, 'index'])->name('ibans-management');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/logout', [LoginController::class, 'logout']);
require __DIR__.'/auth.php';
