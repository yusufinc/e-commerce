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
        return view('backend.pages.slider.edit');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SliderRequest $request)
    {
        if($request->hasFile('image')){
            $resim = $request->file('image');
            $uzanti = $resim->getClientOriginalExtension();
            $dosyadi = time().'.'.Str::slug($request->name);

            $yukleKlasor = 'img/slider/';

            if ($uzanti == 'pdf' || $uzanti == 'svg' || $uzanti == 'webp' || $uzanti == 'jiff' ) {
                $resim->move(public_path($yukleKlasor),$dosyadi.'.'.$uzanti);

                $resimurl = $yukleKlasor.$dosyadi.'.'.$uzanti;
            }
            else {
                $resim = ImageResize::make($resim);
                $resim->encode('webp',75)->save($yukleKlasor.$dosyadi.'.webp');

                $resimurl = $yukleKlasor.$dosyadi.'.webp';
            }

        }



    Slider::create([
        'name' =>$request->name,
        'link' =>$request->link,
        'content' =>$request->content,
        'status' =>$request->status,
        'image'=>$resimurl ?? NULL,
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
        if($request->hasFile('image')){

            $resim = $request->file('image');
            $uzanti = $resim->getClientOriginalExtension();
            $dosyadi = time().'.'.Str::slug($request->name);

            $yukleKlasor = 'img/slider/';

            if ($uzanti == 'pdf' || $uzanti == 'svg' || $uzanti == 'webp' || $uzanti == 'jiff' ) {
                $resim->move(public_path($yukleKlasor),$dosyadi.'.'.$uzanti);
            }
            else {
                $resim = ImageResize::make($resim);
                $resim->encode('webp',75)->save($yukleKlasor.$dosyadi.'.webp');
            }

            $resimurl = $yukleKlasor.$dosyadi.'.'.$uzanti;

        }

        Slider::where('id',$id)->update([
            'name' =>$request->name,
            'link' =>$request->link,
            'content' =>$request->content,
            'status' =>$request->status,
            'image'=>$resimurl ?? NULL,
        ]);


            return back()->withSuccess('Başarıyla Güncellendi!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $slider = Slider::where('id',$id)->firstOrFail();
        if(file_exists($slider->image)){
            if(!empty($slider->image)){
            unlink($slider->image);
        }
        }

        $slider->delete();
        return back()->withSuccess('Başarıyla Kaldırıldı!');
    }

    public function status(Request $request){
        $update=$request->statu;

        $updatecheck = $update == true ? 'aktif' : 'pasif';

        Slider::where('id',$request->id)->update(['status'=>$update]);


        return response(['error'=>false,'status'=>$update]);
    }
}
