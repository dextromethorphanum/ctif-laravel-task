<?php

use App\Http\Controllers\IBANController;
use App\Http\Controllers\LoginController;
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

Route::get('/', [IBANController::class, 'index']);

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::view('/', 'admin.index')->name('index');
    Route::view('/create-user', 'admin.create-user')->name('create-user');
    Route::view('/roles-management', 'admin.roles-management')->name('roles-management');
    Route::view('/ibans-management', 'admin.ibans-management')->name('ibans-management');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/logout', [LoginController::class, 'logout']);
require __DIR__.'/auth.php';
