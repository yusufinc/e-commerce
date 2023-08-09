<?php

use App\Http\Controllers\AjaxController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontend\PageHomeController;
use App\Http\Controllers\frontend\PageController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['middleware'=>'sitesetting'], function() {

    Route::get('/',[PageHomeController::class,'anasayfa'])->name('anasayfa');

    Route::get('/urunler',[PageController::class,'urunler'])->name('urunler');
    Route::get('/erkek/{slug?}',[PageController::class,'urunler'])->name('erkekurunler');
    Route::get('/kadin/{slug?}',[PageController::class,'urunler'])->name('kadinurunler');
    Route::get('/cocuk/{slug?}',[PageController::class,'urunler'])->name('cocukurunler');
    Route::get('/indirimdekiler',[PageController::class,'indirimdekiurunler'])->name('indirimdekiurunler');

    Route::get('/urun/{slug}',[PageController::class,'urundetay'])->name('urundetay');

    Route::get('/hakkimizda',[PageController::class,'hakkimizda'])->name('hakkimizda');

    Route::get('/iletisim',[PageController::class,'iletisim'])->name('iletisim');

    Route::post('/iletisim/kaydet',[AjaxController::class,'iletisimkaydet'])->name('iletisim.kaydet');

    Route::get('/sepet',[PageController::class,'cart'])->name('sepet');

});


