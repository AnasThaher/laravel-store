<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\ProductsController;
use App\Http\Controllers\Auth\UserProfileController;
use App\Http\Controllers\Auth\ChangeUserPasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController as StoreProductsController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;

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

Route::get('/products/{category:slug?}', [StoreProductsController::class, 'index'])
    ->name('products');
Route::get('/products/{category:slug}/{product:slug}', [StoreProductsController::class, 'show'])
    ->name('products.show');

Route::post('/products/{product}/reviews', [StoreProductsController::class, 'review'])
    ->name('products.reviews.store');


Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::post('/cart', [CartController::class, 'store']);
Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/{id}', [CartController::class, 'destroy'])->name('cart.destroy');


Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::post('/checkout', [CheckoutController::class, 'store']);


Route::get('/', [HomeController::class,'index'])->name('home');

Route::get('dashboard',[DashboardController::class,'index'])
    ->name('dashboard.index');


Route::group([
    // prefix in route
    'prefix' => '/dashboard',
    //prefix in name
    'as' => 'dashboard.',
    //prefix in nampespase or defult namespase
    'namespase' => '',
    'middleware' => ['auth']
],function () {

    Route::get('/',[DashboardController::class,'index'])
    ->name('index');

    Route::get('/products/trash', [ProductsController::class, 'trash'])
        ->name('products.trash');
    Route::patch('/products/{product}/restore', [ProductsController::class, 'restore'])
        ->name('products.restore');

    Route::resource('/products', ProductsController::class);
    Route::group([
        // prefix in route
        'prefix' => '/categories',
        //prefix in name
        'as' => 'categories.',
        //prefix in nampespase or defult namespase
        'namespase' => '',
    ],function () {

        Route::get('/',[CategoryController::class,'index'])
        ->name('index');

        Route::get('/trash',[CategoryController::class,'trash'])
            ->name('trash');

        Route::get('/create',[CategoryController::class,'create'])
            ->name('create');

        Route::post('',[CategoryController::class,'store'])
            ->name('store');

        Route::get('/{id}/edit',[CategoryController::class,'edit'])
            ->name('edit');

        Route::put('/{id}',[CategoryController::class,'update'])
            ->name('update');

        Route::delete('/{id}',[CategoryController::class,'destroy'])
            ->name('destroy');

        Route::put('/{id}/restore',[CategoryController::class,'restore'])
            ->name('restore');


    });

});

Route::get('profile',[UserProfileController::class,'index'])->name('profile.index')->middleware(['auth:web,admin','password.confirm']);
Route::patch('profile',[UserProfileController::class,'update'])->name('profile.update')->middleware(['auth:web,admin']);

Route::get('change-password',[ChangeUserPasswordController::class,'index'])->name('change-password')->middleware(['auth:web,admin']);
Route::put('change-password',[ChangeUserPasswordController::class,'update'])->name('change-password.update')->middleware(['auth:web,admin']);

Route::get('/dashboard/breeze', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
