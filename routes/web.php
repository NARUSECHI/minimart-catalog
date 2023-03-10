<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\UsersController;
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



Auth::routes();

Route::group(['middleware' => 'auth'],function(){
    //Product
    Route::get('/',[ProductController::class,'index'])->name('index');
    Route::get('/product/create',[ProductController::class,'create'])->name('create');
    Route::post('/product/store',[ProductController::class,'store'])->name('store');
    Route::get('/product/{id}/edit',[ProductController::class,'edit'])->name('edit');
    Route::patch('/product/{id}/update',[ProductController::class,'update'])->name('update');
    Route::delete('/product/{id}/delete',[ProductController::class,'destroy'])->name('destroy');
    Route::post('/product/search',[ProductController::class,'search'])->name('search');
    //Section
    Route::get('/section',[SectionController::class,'index'])->name('section.index');
    Route::post('/section/create',[SectionController::class,'create'])->name('section.create');
    Route::delete('/section/{id}/destroy',[SectionController::class,'destroy'])->name('section.destroy');
    //Profile
    Route::get('/profile/{id}',[ProfileController::class,'index'])->name('profile.index');
    Route::get('/profile/{id}/edit',[ProfileController::class,'edit'])->name('profile.edit');
    Route::patch('/profile/{id}/update',[ProfileController::class,'update'])->name('profile.update');
    Route::delete('/profile/{id}/destroy',[ProfileController::class,'destroy'])->name('profile.destroy');
    //Admin
    Route::group(['prefix'=>'admin','as'=>'admin.'],function(){
        Route::get('/',[UsersController::class,'index'])->name('index');
        Route::delete('/{id}/deactivate',[UsersController::class,'deactivate'])->name('deactivate');
        Route::patch('/{id}/activate',[UsersController::class,'activate'])->name('activate');
        Route::delete('/{id}/destroy',[UsersController::class,'destroy'])->name('destroy');
    });
});
