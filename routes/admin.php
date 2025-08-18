<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\AdvertisementController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

Route::get('profile', [ProfileController::class, 'index'])->name('profile');
Route::post('profile/update', [ProfileController::class, 'updateProfile'])->name('profile.update');
Route::post('profile/update/password', [ProfileController::class, 'updatePassword'])->name('password.update');

///////////////////////////////////////////
////    Advertisement Controller Route
///////////////////////////////////////////

Route::get('advertisements', [AdvertisementController::class, 'index'])->name('advertisements.index');

Route::post('advertisement/homepage-section-one', [AdvertisementController::class, 'homepageBannerSectionOne'])
    ->name('homepage-banner-section-one');

Route::post('advertisement/homepage-section-two', [AdvertisementController::class, 'homepageBannerSectionTwo'])
    ->name('homepage-banner-section-two');

Route::post('advertisement/homepage-banner-section-one/status-update', [AdvertisementController::class, 'updateStatusSectionOne'])
    ->name('advertisement.homepage-banner-section-one.status.update');

Route::post('advertisement/homepage-banner-section-two/status-update', [AdvertisementController::class, 'updateStatusSectionTwo'])
    ->name('advertisement.homepage-banner-section-two.status.update');


///////////////////////////////////////////
////    Brands Controller Route
///////////////////////////////////////////

Route::put('brands/change-status', [BrandController::class, 'changeStatus'])->name('brands.change-status');
Route::get('brands/data', [BrandController::class, 'getData'])->name('brands.data');
Route::resource('brands', BrandController::class);