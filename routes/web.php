<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Home\HomeSliderController;
use App\Http\Controllers\Home\AboutController;

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

// Home routes
Route::controller(HomeSliderController::class)->group(function() {
    Route::get('/home/slider', 'homeSlider')->name('home.slider');
    Route::post('/home/slider/store', 'storeSlider')->name('home.slider.store');
});

// About page routes
Route::controller(AboutController::class)->group(function() {
    Route::get('/about/page', 'aboutPage')->name('about.page');
    Route::post('/about/store', 'storeAbout')->name('about.store');
    Route::get('/about', 'homeAbout')->name('about.home');
});


Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
