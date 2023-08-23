@extends('backend.layout.app')

@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Kategori</h4>
          <p class="card-description">
            <a href="{{route('panel.category.create')}}" class="btn btn-info">Yeni</a>
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

                @if (!empty($categories) && $categories->count()>0)
                    @foreach ($categories as $category)
                        <tr class="item" item-id="{{$category->id}}">
                            <td class="py-1">
                            <img src="{{asset($category->image)}}" alt="image"/>
                            </td>
                            <td>{{$category->name}}</td>
                            <td>{{$category->category->name ?? ''}}</td>
                            <td>
                              <div class="checkbox" >
                                  <label>
                                      <input type="checkbox" class="durum"  data-on="Aktif" data-off="Pasif" data-onstyle="success  data-ofstyle="danger" data-toggle="toggle" {{$category->status=='1' ? 'checked': ''}} >
                                  </label>
                              </div>
                            </td>
                            <td class="d-flex">
                                <a href="{{route('panel.category.edit',$category->id)}}" class="btn btn-primary badge">Düzenle</a>

                                <button type="button" class="silBtn btn btn-danger badge px-4 ml-2"> Sil </button>


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
            id = $(this).closest('.item').attr('item-id');
            statu = $(this).prop('checked');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                },
                type:"POST",
                url:"{{route('panel.category.status')}}",
                data:{
                    id:id,
                    statu:statu
                },

                success: function (response){
                    if (response.status=="true") {
                        alertify.success("Durum Aktif Edildi");
                    }
                    else {
                        alertify.error("Durum Pasif Edildi");
                    }
                }
            });
    });

    $(document).on('click', '.silBtn', function(e){
        e.preventDefault();
        var item = $(this).closest('.item');
         id = $(this).closest('.item').attr('item-id');
        alertify.confirm("Silme istediğinize emin misiniz?",
            function(){


            $.ajax({
                    headers: {
                        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                    },
                    type:"DELETE",
                    url:"{{route('panel.category.destroy')}}",
                    data:{
                        id:id,
                    },

                    success: function (response){
                        if (response.error==false) {
                            item.remove();
                            alertify.success(response.message);
                        }
                        else {
                            alertify.error("Bir hata oluştu");
                        }
                    }
                });

                },

    function(){

        alertify.error('Silme İptal edildi');

      });
    });

</script>
@endsection
