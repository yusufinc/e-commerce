<?php

use App\Http\Controllers\Backend\AboutController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\SliderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ContactController;

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


    Route::get('/contact', [ContactController::class,'index'])->name('contact.index');
    Route::get('/contact/{id}/show', [ContactController::class,'edit'])->name('contact.edit');
    Route::put('/contact/{id}/update', [ContactController::class,'update'])->name('contact.update');

    Route::delete('/contact/destroy',[ContactController::class,'destroy'])->name('contact.destroy');

    Route::post('/contact-durum/update',[ContactController::class,'status'])->name('contact.status');


});
