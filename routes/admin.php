<?php

use App\Http\Controllers\Admin\loginController;
use App\Http\Controllers\Admin\registerController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\admin\ProductController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
*/



    Route::group([
        'prefix' => LaravelLocalization::setLocale().'/admin',
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function () {

Route::middleware('guest:admin')->name('admin.')->group(function () {

    Route::get('login',[loginController::class,'view'])->name('login');
    Route::post('login', [loginController::class, 'store']);

    Route::get('register', [registerController::class, 'view'])->name('register');
    Route::post('register', [registerController::class, 'store']);

});


Route::middleware('isAdmin')->name('admin.')->group(function () {

    Route::get('logout', [loginController::class, 'logout'])->name('logout');

    ################################ Categories ###################################

    Route::prefix('/categories')->name('categories.')->group(function(){
        Route::get('index', [CategoriesController::class, 'index'])->name('index');
        Route::get('create', [CategoriesController::class, 'create']);
        Route::post('store', [CategoriesController::class, 'store']);
        Route::get('edit/{id}', [CategoriesController::class, 'edit'])->name('edit');
        Route::post('update/{id}', [CategoriesController::class, 'update'])->name('update');
        Route::get('destroy/{id}', [CategoriesController::class, 'destroy'])->name('destroy');
    });

    ################################ products ###################################

    Route::prefix('/products')->name('products.')->group(function () {
        Route::get('index', [ProductController::class, 'index'])->name('index');
        Route::get('create', [ProductController::class, 'create'])->name('create');
        Route::post('store', [ProductController::class, 'store'])->name('store');
        Route::get('category/{id}', [ProductController::class, 'category']);
        Route::get('edit/{id}', [ProductController::class, 'edit'])->name('edit');
        Route::post('update', [ProductController::class, 'update'])->name('update');
        Route::post('destroy', [ProductController::class, 'destroy'])->name('destroy');

    });


    Route::get('/home', function () {
        return view('admin.home');
    })->name('home');







});


});
