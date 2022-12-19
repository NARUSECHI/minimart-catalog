<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SectionController;
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
    //Home
    Route::get('/',[HomeController::class,'index'])->name('index;');

    //Section
    Route::get('/section',[SectionController::class,'index'])->name('section.index');
    Route::post('/section/create',[SectionController::class,'create'])->name('section.create');
    Route::delete('/section/{id}/destroy',[SectionController::class,'destroy'])->name('section.destroy');
});
