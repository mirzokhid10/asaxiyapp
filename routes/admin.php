<?php

use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Route;
use Illuminate\Container\Attributes\DB;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\ProductsController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\FlashSaleController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\AdvertisementController;
use App\Http\Controllers\Backend\ChildCategoryController;
use App\Http\Controllers\Backend\SellerProductController;
use App\Http\Controllers\Backend\ProductsVariantController;
use App\Http\Controllers\Backend\ProductCharacterController;
use App\Http\Controllers\Backend\ProductImageGalleryController;
use App\Http\Controllers\Backend\ProductsVariantItemController;
use App\Http\Controllers\Backend\ProductCharacterValueController;
use App\Http\Controllers\Backend\ProductCharacterOptionsController;

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

///////////////////////////////////////////
////    Products Controller Route
///////////////////////////////////////////
Route::get('products/get-subcategories', [ProductsController::class, 'getSubCategories'])->name('products.get-subcategories');
Route::get('product/get-child-categories', [ProductsController::class, 'getChildCategories'])->name('products.get-child-categories');
Route::put('products/change-status', [ProductsController::class, 'changeStatus'])->name('products.change-status');
Route::resource('products', ProductsController::class);

///////////////////////////////////////////
////    Products Controller Route
///////////////////////////////////////////

Route::resource('products-image-gallery', ProductImageGalleryController::class);

///////////////////////////////////////////
////    Admin Product Variant Route
///////////////////////////////////////////

Route::put('products-variant/change-status', [ProductsVariantController::class, 'changeStatus'])->name('products-variant.change-status');
Route::resource('products-variant', ProductsVariantController::class);

///////////////////////////////////////////
////    Admin Product Variant Item Route
///////////////////////////////////////////
Route::get('products-variant-item/{productId}/{productVariantId}', [ProductsVariantItemController::class, 'index'])->name('products-variant-item.index');
Route::get('products-variant-item/create/{productId}/{productVariantId}', [ProductsVariantItemController::class, 'create'])->name('products-variant-item.create');
Route::post('products-variant-item', [ProductsVariantItemController::class, 'store'])->name('products-variant-item.store');
Route::get('products-variant-item-edit/{productVariantId}', [ProductsVariantItemController::class, 'edit'])->name('products-variant-item.edit');

Route::put('products-variant-item-update/{productVariantId}', [ProductsVariantItemController::class, 'update'])->name('products-variant-item.update');
Route::delete('products-variant-item/{productVariantId}', [ProductsVariantItemController::class, 'destroy'])->name('products-variant-item.destroy');
Route::put('products-variant-item-status', [ProductsVariantItemController::class, 'changeStatus'])->name('products-variant-item.change-status');

///////////////////////////////////////////
////    Characteristics Of Product Routes
///////////////////////////////////////////

Route::resource('products-characters', ProductCharacterController::class);

///////////////////////////////////////////
////    Options Of Product Characteristics Routes
///////////////////////////////////////////

Route::get('products-characters/{characteristicId}/options', [ProductCharacterOptionsController::class, 'index'])
    ->name('products-characters.options.index');
Route::get('products-characters/{characteristicId}/options/create', [ProductCharacterOptionsController::class, 'create'])
    ->name('products-characters.options.create');
Route::post('products-characters/{characteristicId}/options', [ProductCharacterOptionsController::class, 'store'])
    ->name('products-characters.options.store');
Route::get('products-characters/{characteristicId}/options/{optionId}/edit', [ProductCharacterOptionsController::class, 'edit'])
    ->name('products-characters.options.edit');
Route::put('products-characters/{characteristicId}/options/{optionId}', [ProductCharacterOptionsController::class, 'update'])
    ->name('products-characters.options.update');
Route::delete('products-characters/{characteristicId}/options/{optionId}', [ProductCharacterOptionsController::class, 'destroy'])
    ->name('products-characters.options.destroy');

///////////////////////////////////////////
////    Values Of Product Characteristics Routes
///////////////////////////////////////////

Route::prefix('products/{productId}')->group(function () {
    Route::resource('values', ProductCharacterValueController::class)
        ->names('products.values')
        ->except(['show']); // usually you don’t need a "show" page
});

///////////////////////////////////////////
////    Seller product routes
///////////////////////////////////////////

Route::get('seller-products', [SellerProductController::class, 'index'])->name('seller-products.index');
Route::get('seller-pending-products', [SellerProductController::class, 'pendingProducts'])->name('seller-pending-products.index');
Route::put('change-approve-status', [SellerProductController::class, 'changeApproveStatus'])->name('change-approve-status');

///////////////////////////////////////////
////    Product Character Routes
///////////////////////////////////////////

///////////////////////////////////////////
////    Flash Sale routes
///////////////////////////////////////////

Route::get('flash-sale', [FlashSaleController::class, 'index'])->name('flash-sale.index');
Route::put('flash-sale', [FlashSaleController::class, 'update'])->name('flash-sale.update');
Route::post('flash-sale/add-product', [FlashSaleController::class, 'addProduct'])->name('flash-sale.add-product');
Route::put('flash-sale/show-at-home/status-change', [FlashSaleController::class, 'changeShowAtHomeStatus'])->name('flash-sale.show-at-home.change-status');
Route::put('flash-sale-status', [FlashSaleController::class, 'changeStatus'])->name('flash-sale-status');
Route::delete('flash-sale/{id}', [FlashSaleController::class, 'destroy'])->name('flash-sale.destroy');

Route::get('user-data', function() {
    $model = DB::table('users')->take(10); // <==
    return DataTables::eloquent($model)->skipPaging() // <==
        ->toJson();
});
// FlashSale Product Searching Route
Route::get('/api/products/search', function (Request $request) {
    $query = $request->get('q');
    return Product::where('name', 'like', "%$query%")
        ->select('id', 'name')
        ->limit(20)
        ->get();
});
