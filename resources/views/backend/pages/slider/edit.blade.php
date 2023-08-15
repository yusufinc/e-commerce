@extends('backend.layout.app')

@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Slider Ekle</h4>

                @if ($errors)
                    @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">
                        {{$error}}
                    </div>
                    @endforeach
                @endif

                @if (session()->get('success'))
                <div class="alert alert-success">
                    {{session()->get('success')}}
                </div>
                @endif


                    @if (!empty($slider->id))
                    @php
                    $routelink = route('panel.slider.update',$slider->id);
                    @endphp
                     @else
                        @php
                            $routelink = route('panel.slider.store');
                        @endphp
                    @endif
                <form action="{{$routelink}}" class="forms-sample" method="POST" enctype="multipart/form-data">
                    @csrf

                    @if (!empty($slider->id))
                        @method('PUT')
                    @endif


                    <div class="form-group">
                       <div class="input-group col-xs-12">
                        <img src="{{asset($slider->image ?? 'img.resimyok.webp')}}" alt="">
                       </div>
                    </div>

                    <div class="form-group">
                        <label id="resim">Resim yükleme</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-primary text-white">
                                    <i class="fa-solid fa-image-portrait"></i>
                                </span>
                            </div>
                            <input type="file" name="image" class="file-upload-default">
                            <input type="text" class="form-control file-upload-info bg-info text-dark" id="resim" disabled placeholder="Resim yükleyin">
                            <span class="input-group-append">
                                <button class="file-upload-browse btn btn-warning" type="button">Yükle</button>
                            </span>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="name">Ad</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-primary text-white">
                                    <i class="ti-user"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control" name="name" value="{{$slider->name ?? ''}}" id="name" placeholder="Slider Başlığı girin">
                        </div>
                    </div>



                    <div class="form-group">
                        <label for="content">İçerik</label>
                        <div class="input-group">
                            <textarea class="form-control" name="content" value id="content" row="3" placeholder="İçerik">
                                {!! $slider->content ?? '' !!}
                            </textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="link">Link</label>
                        <div class="input-group">
                            <input type="text" class="form-control" value="{{$slider->link ?? ''}}" id="link" name="link" placeholder="link">
                        </div>
                    </div>



                   <div class="form-group">
                        <label for="durum">Durum</label>
                            @php
                                    $status = $slider->status ?? '1';
                            @endphp
                        <div class="input-group">
                           <select name="status" class="form-control" id="status">
                               <option value="0" {{$status == '0' ? 'selected' : ''}}>Pasif</option>
                               <option value="1" {{$status == '1' ? 'selected' : ''}}>Aktif</option>
                           </select>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary mr-2">Gönder</button>
                    <button class="btn btn-light">İptal</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
