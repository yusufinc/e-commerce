@extends('backend.layout.app')

@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Basic Table</h4>
          <p class="card-description">
            Add class <code>.table</code>
          </p>
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>Resim</th>
                  <th>Başlık</th>
                  <th>İçeriks.</th>
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
                            <td><label class="badge badge-{{$slider->status=='1' ? 'success': 'danger'}}">{{$slider->status=='1'? 'Akitf': 'Pasif'}}</label></td>
                            <td><a href="{{route('slider.edit',$slider->id)}}"></a>{{$slider->name}}</td>
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
