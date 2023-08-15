<?php

namespace App\Http\Controllers\Backend;

use ImageResize;
use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Requests\SliderRequest;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $sliders = Slider::all();
       return view('backend.pages.slider.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SliderRequest $request)
    {

       if($request->hasFile('image')){
        $resim = $request->file('image');
        $dosyadi = time().'-'.Str::slug($request->name);
        $uzanti = $resim->getClientOriginalExtension();
        $yukleklasor = 'img/slider/';

        if ($uzanti == 'pdf' || $uzanti == 'svg' || $uzanti == 'webp' ) {
            $resim->move(public_path($yukleklasor),$dosyadi.'.'.$uzanti);
        }
        else {
            $resim = ImageResize::make($resim);

            $resim->encode('webp',75)->save($yukleklasor.$dosyadi.'webp');
        }

    }

    Slider::create([
        'name' =>$request->name,
        'link' =>$request->link,
        'content' =>$request->content,
        'status' =>$request->status,
        'image'=>$dosyadi ?? NULL,
    ]);


        return back()->withSuccess('Başarıyla Oluşturuldu!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
            $slider = Slider::where('id',$id)->first();
        return view('backend.pages.slider.edit',compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
