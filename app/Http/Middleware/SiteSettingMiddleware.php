<?php

namespace App\Http\Middleware;

use App\Models\SiteSetting;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Category;

class SiteSettingMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

          $settings =  SiteSetting::pluck('data','name')->toArray();
          $categories = Category::where('status','1')
          ->with('subcategory')
          ->withCount('items')->get();

          $countQty = 0;
          $cartItem = session('cart',[]);
          foreach($cartItem as $cart){
            $countQty += $cart['qty'];
          }
view()->share(['settings'=>$settings,'categories'=>$categories,'countQty'=>$countQty]);
        return $next($request);
    }
}
