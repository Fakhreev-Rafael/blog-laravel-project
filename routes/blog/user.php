<?php

use App\Http\Controllers\Blog\User\AccountController;
use App\Http\Controllers\Blog\User\HomeController;
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

Route::get('/', [HomeController::class, 'index'])->name('blog.user.home');

// confirm email
Route::get('/account/confirm', [AccountController::class, 'confirm'])->name('blog.user.account.confirm');

// for authenticated users
Route::middleware(['auth'])->group(function() {

    // display the user's account information for edit
    Route::get('/account/edit', [AccountController::class, 'edit'])->name('blog.user.account.edit');
    // update the user's account information
    Route::post('/account/update', [AccountController::class, 'update'])->name('blog.user.account.update');



});
