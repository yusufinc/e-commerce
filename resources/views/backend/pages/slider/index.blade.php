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
                            <td>
                              <div class="checkbox" item-id="{{$slider->id}}">
                                  <label>
                                      <input type="checkbox" class="durum"  data-on="Aktif" data-off="Pasif" data-onstyle="success  data-ofstyle="danger" data-toggle="toggle" {{$slider->status=='1' ? 'checked': ''}} >
                                  </label>
                              </div>
                            </td>
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

@section('customjs')
<script>

    $(document).on('change', '.durum', function(e){
        alert('test');
    });

</script>
@endsection
