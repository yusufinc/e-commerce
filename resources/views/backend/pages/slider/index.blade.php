@extends('backend.layout.app')

@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Basic Table</h4>
          <p class="card-description">
            <a href="{{route('panel.slider.create')}}" class="btn btn-info">Yeni</a>
          </p>
            @if (session()->get('success'))
            <div class="alert alert-success">
                {{session()->get('success')}}
            </div>
            @endif
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>Resim</th>
                  <th>Başlık</th>
                  <th>İçerik</th>
                  <th>Link</th>
                  <th>Status</th>
                  <th>Edit</th>
                </tr>
              </thead>
              <tbody>

                @if (!empty($sliders) && $sliders->count()>0)
                    @foreach ($sliders as $slider)
                        <tr>
                            <td class="py-1">
                            <img src="{{$slider->image}}" alt="image"/>
                            </td>
                            <td>{{$slider->name}}</td>
                            <td>{{$slider->content?? ''}}</td>
                            <td>{{$slider->link}}</td>
                            <td><label class="badge badge-{{$slider->status=='1' ? 'success': 'danger'}} px-2 py-2">{{$slider->status=='1'? 'Akitf': 'Pasif'}}</label></td>
                            <td class="d-flex">
                                <a href="{{route('panel.slider.edit',$slider->id)}}" class="btn btn-primary badge">Düzenle</a>

                                <form action="{{route('panel.slider.destroy',$slider->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger badge px-4 ml-2"> Sil </button>

                                </form>

                            </td>
                        </tr>
                    @endforeach

                @endif



              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>



  </div>
@endsection
