<?php

use App\Http\Controllers\Blog\Auth\AuthenticateController;
use App\Http\Controllers\Blog\Auth\ForgotPasswordController;
use App\Http\Controllers\BLog\Auth\LogOutController;
use App\Http\Controllers\Blog\Auth\NewPasswordController;
use App\Http\Controllers\Blog\Auth\RegistrateController;
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

// Routes for guests
Route::middleware(['guest'])->group(function() {

    // Display form of authentication
    Route::get('/authentication', [AuthenticateController::class, 'authentication'])->name('blog.user.authentication');
    // Execute authentication
    Route::post('/authentication/execute', [AuthenticateController::class, 'execute'])->name('blog.user.authentication.execute');

    // Display form of registration
    Route::get('/registration', [RegistrateController::class, 'registration'])->name('blog.user.registration');
    // Execute registration
    Route::post('/registration/execute', [RegistrateController::class, 'execute'])->name('blog.user.registration.execute');

    // Display form of forgot-password
    Route::get('/forgot-password', [ForgotPasswordController::class, 'forgotPassword'])->name('blog.user.forgot.password');
    // execute form of forgot-password
    Route::post('/forgot-password/execute', [ForgotPasswordController::class, 'execute'])->name('blog.user.forgot.password.execute');

    // Display form of new password
    Route::get('/new-password', [NewPasswordController::class, 'newPassword'])->name('blog.user.new.password');
    // Execute form of new password
    Route::post('/new-password/execute', [NewPasswordController::class, 'execute'])->name('blog.user.new.password.execute');
    

});

// Route for authenticated users
Route::middleware(['auth'])->group(function() {

    // Execute logging out
    Route::get('/logout/execute', [LogOutController::class, 'execute'])->name('blog.user.logout.execute');

});
