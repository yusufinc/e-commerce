<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\SliderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\CategoryController;


Route::group(['middleware'=>['panelsetting','auth'],'prefix'=>'panel','as'=>'panel.'], function() {

    Route::get('/',[DashboardController::class,'index'])->name('index');


    Route::get('/slider',[SliderController::class,'index'])->name('slider.index');

    Route::get('/slider/ekle',[SliderController::class,'create'])->name('slider.create');

    Route::get('/slider/{id}/edit',[SliderController::class,'edit'])->name('slider.edit');

    Route::post('/slider/store',[SliderController::class,'store'])->name('slider.store');

    Route::put('/slider/{id}/update',[SliderController::class,'update'])->name('slider.update');

    Route::delete('/slider/destroy',[SliderController::class,'destroy'])->name('slider.destroy');

    Route::post('/slider-durum/update',[SliderController::class,'status'])->name('slider.status');



    Route::resource('/category',CategoryController::class)->except('destroy');
    Route::delete('/category/destroy',[CategoryController::class,'destroy'])->name('category.destroy');
    Route::post('/category-durum/update',[CategoryController::class,'status'])->name('category.status');


});
