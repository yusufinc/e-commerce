<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Slider;
use App\Models\About;

class PageHomeController extends Controller
{
    public function anasayfa(){
       $slider = Slider::where('status','1')->first();
        $title = "Anasayfa";




        $about = About::where('id',1)->first();
        return view('frontend.pages.index',compact('slider','title','about'));
    }
}
