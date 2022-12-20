<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\ProductController;
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
    //Section
    Route::get('/section',[SectionController::class,'index'])->name('section.index');
    Route::post('/section/create',[SectionController::class,'create'])->name('section.create');
    Route::delete('/section/{id}/destroy',[SectionController::class,'destroy'])->name('section.destroy');
});
