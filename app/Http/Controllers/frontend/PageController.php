<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Product;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function urunler(Request $request){
        $size = $request->size ?? null;
        $color = $request->color ?? null;
        $startprice = $request->start_price ?? null;
        $endprice = $request->end_price ?? null;
      $products =  Product::where('status','1')

      ->where(function($q) use ($size,$color,$startprice,$endprice)
      {
        if(!empty($size)){
             $q->where('size',$size);
        }

        if(!empty($color)){
             $q->where('color',$color);
        }
        if(!empty( $startprice) && $endprice){
             $q->whereBetween('price',[$startprice,$endprice]);
        }
        return $q;

      })
      ->paginate(1);
        return view('frontend.pages.products',compact('products'));
    }
    public function indirimdekiurunler(){
        return view('frontend.pages.products');
    }

    public function urundetay($slug){
        $products =  Product::where('slug',$slug)->first();
        return view('frontend.pages.product',compact('products'));

    }

    public function hakkimizda(){
        $about =  About::where('id',1)->first();
        return view('frontend.pages.about',compact('about'));


    }


    public function cart(){
        return view('frontend.pages.cart');

    }

    public function iletisim(){

        return view('frontend.pages.contact');

    }
}
