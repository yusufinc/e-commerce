<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function iletisimkaydet(Request $request){
        // $data = $request->all();
        // $data['ip'] = $request->ip();


        $newData = [
            'name'=>Str::title($request->name),
            'email'=>$request->email,
            'email'=>$request->subject,
            'email'=>$request->message,
            'ip'=>request()->ip(),


        ];
      $sonkaydedilen =  Contact::create($newData);

      return back()->withSuccess('Başarıyla gönderildi');
    }
}
