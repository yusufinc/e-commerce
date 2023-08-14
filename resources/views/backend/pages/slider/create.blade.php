@extends('backend.layout.app')

@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Slider Ekle</h4>
                <form action="{{route('panel.slider.store')}}" class="forms-sample" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label id="resim">Resim yükleme</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-primary text-white">
                                    <i class="fa-solid fa-image-portrait"></i>
                                </span>
                            </div>
                            <input type="file" name="imgage" class="file-upload-default">
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
                            <input type="text" class="form-control" name="name" id="name" placeholder="Adınızı girin">
                        </div>
                    </div>



                    <div class="form-group">
                        <label for="content">İçerik</label>
                        <div class="input-group">
                            <textarea type="text" class="form-control" name="content" id="content" placeholder="İçerik"> </textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="link">Link</label>
                        <div class="input-group">
                            <textarea type="text" class="form-control" name="link" id="link" placeholder="link"> </textarea>
                        </div>
                    </div>



                   <div class="form-group">
                        <label for="durum">Durum</label>
                        <div class="input-group">
                           <select name="status" class="form-control" id="durum">
                            <option value="1" selected>Aktif</option>
                            <option value="0">Pasif</option>
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
