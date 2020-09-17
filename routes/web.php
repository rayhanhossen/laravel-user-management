<?php

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'can:manage-users'])->prefix('admin')->group(function(){
    // Users Route
    Route::prefix('user')->group(function(){
    Route::get('/', [App\Http\Controllers\Admin\UsersController::class, 'index'])->name('user.index');
    Route::post('/store', [App\Http\Controllers\Admin\UsersController::class, 'store'])->name('user.store');
    Route::get('/create', [App\Http\Controllers\Admin\UsersController::class, 'create'])->name('user.create');
    Route::get('/edit/{user}', [App\Http\Controllers\Admin\UsersController::class, 'edit'])->name('user.edit');
    Route::get('/update/{user}', [App\Http\Controllers\Admin\UsersController::class, 'update'])->name('user.update');
    Route::get('/destroy/{user}', [App\Http\Controllers\Admin\UsersController::class, 'destroy'])->name('user.destroy');
    });

});