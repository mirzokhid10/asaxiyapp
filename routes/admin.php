<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\AdvertisementController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\ChildCategoryController;
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

///////////////////////////////////////////
////    Category Controller Route
///////////////////////////////////////////

Route::put('category/change-status', [CategoryController::class, 'changeStatus'])->name('category.change-status');
Route::resource('category', CategoryController::class);

///////////////////////////////////////////
////    Sub Category Controller Route
///////////////////////////////////////////

Route::put('sub-category/change-status', [SubCategoryController::class, 'changeStatus'])->name('sub-category.change-status');
Route::resource('sub-category', SubCategoryController::class);

///////////////////////////////////////////
////    Child Category Controller Route
///////////////////////////////////////////

Route::put('child-category/change-status', [ChildCategoryController::class, 'changeStatus'])->name('child-category.change-status');
Route::get('get-subcategories', [ChildCategoryController::class, 'getSubCategories'])->name('get-subcategories');
Route::resource('child-category', ChildCategoryController::class);
