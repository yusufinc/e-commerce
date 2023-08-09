<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function urunler(Request $request){
        $size = $request->size ?? null;
        $color = $request->color ?? null;
        $startprice = $request->start_price ?? null;
        $endprice = $request->end_price ?? null;

        $order = $request->order ?? 'id';
        $short = $request->short ?? 'desc';





      $products =  Product::where('status','1')->select(['id','name','slug','size','color','price','category_id','image','short_text'])
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
      ->with('category:id,name,slug');

     $minprice = $products->min('price');
     $maxprice = $products->max('price');



        $sizelists = Product::where('status','1')->groupBy('size')->pluck('size')->toArray();


        $colors = Product::where('status','1')->groupBy('color')->pluck('color')->toArray();




     $products = $products->orderBy($order,$short)->paginate(20);


        //  $categories = Category::where('status','1')->where('cat_ust',null)->withCount('items')->get();
        return view('frontend.pages.products',compact('products','minprice','maxprice','sizelists','colors'));
    }
    public function indirimdekiurunler(){
        return view('frontend.pages.products');
    }

    public function urundetay($slug){
        $products =  Product::where('slug',$slug)->first();
        return view('frontend.pages.product',compact('products' ));

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
