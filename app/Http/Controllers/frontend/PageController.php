<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function urunler(){

    }

    public function urundetay(){

    }

    public function hakkimizda(){

    }
    public function iletisim(){

        return view('frontend.pages.contact');

    }
}
