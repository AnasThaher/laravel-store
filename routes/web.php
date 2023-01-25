<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\CategoryController;

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

Route::get('dashboard',[DashboardController::class,'index'])
    ->name('dashboard.index');

Route::group([
    // prefix in route
    'prefix' => '/dashboard',
    //prefix in name
    'as' => 'dashboard.',
    //prefix in nampespase or defult namespase
    'namespase' => '',
],function () {

    Route::get('/',[DashboardController::class,'index'])
    ->name('dashboard.index');

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

