<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContentFormRequest;
use App\Models\Contact;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AjaxController extends Controller
{
    public function iletisimkaydet(ContentFormRequest $request){
        // $data = $request->all();
        // $data['ip'] = $request->ip();


   /* $validationdata = $request->validate([
            'name'=>'required|string|min:2',
            'email' => 'required|email',
            'subject'=> 'required',
            'message'=> 'required'
    ],[
        'name.required' => 'isim soyisim girmeniz gerekiyor',
        'name.string' => 'isim soyisim karakterden oluşmalı',
        'name.min' => 'İsim soyisim en az 2 karakterli olabilir',


        'email.required' => 'email girmeniz gerekiyor',
        'email.email' => 'email formatında girmeniz gerekiyor',


        'subject.required' => 'konu girmeniz gerekiyor',
        'message.required' => 'Mesajınızı girmeniz gerekiyor',

    ]); */
        $newData = [
            'name'=>Str::title($request->name),
            'email'=>$request->email,
            'subject'=>$request->subject,
            'message'=>$request->message,
            'ip'=>request()->ip(),


        ];
      $sonkaydedilen =  Contact::create($newData);

      return back()->with(['message'=>'Başarıyla gönderildi']);
    }


    public function logout(){
        Auth::logout();

        return redirect()->route('anasayfa');
    }
}
