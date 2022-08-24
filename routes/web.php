<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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
    return view('frontend.index');
});

// Admin routes
Route::controller(AdminController::class)->group(function() {
    Route::post('/admin/logout', 'destroy')->name('admin.logout');
    Route::get('/admin/profile', 'profile')->name('admin.profile');
    Route::get('/admin/profile/edit', 'editProfile')->name('admin.profile.edit');
    Route::post('/admin/profile/store', 'storeProfile')->name('admin.profile.store');

    Route::get('/admin/password/edit', 'editPassword')->name('admin.password.edit');
    Route::post('/admin/password/store', 'storePassword')->name('admin.password.store');
});

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
