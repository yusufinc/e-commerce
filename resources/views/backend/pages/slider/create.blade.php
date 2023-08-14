@extends('backend.layout.app')

@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Temel Form Elemanları</h4>
                <p class="card-description">Aşağıdaki formu doldurun</p>
                <form class="forms-sample">
                    <div class="form-group">
                        <label for="exampleInputName1">Ad</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-primary text-white">
                                    <i class="ti-user"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control" id="exampleInputName1" placeholder="Adınızı girin">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">E-posta adresi</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-success text-white">
                                    <i class="ti-email"></i>
                                </span>
                            </div>
                            <input type="email" class="form-control" id="exampleInputEmail3" placeholder="E-posta adresinizi girin">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword4">Parola</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-danger text-white">
                                    <i class="ti-lock"></i>
                                </span>
                            </div>
                            <input type="password" class="form-control" id="exampleInputPassword4" placeholder="Parolanızı girin">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleSelectGender">Cinsiyet</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-warning text-dark">
                                    <i class="fa-solid fa-venus-mars"></i>
                                </span>
                            </div>
                            <select class="form-control" id="exampleSelectGender">
                                <option disabled>Cinsiyet seç</option>
                                <option>Erkek</option>
                                <option>Kadın</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Dosya yükleme</label>
                        <input type="file" name="img[]" class="file-upload-default">
                        <div class="input-group col-xs-12">
                            <input type="text" class="form-control file-upload-info bg-info text-dark" disabled placeholder="Resim yükleyin">
                            <span class="input-group-append">
                                <button class="file-upload-browse btn btn-warning" type="button">Yükle</button>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputCity1">Şehir</label>
                        <input type="text" class="form-control" id="exampleInputCity1" placeholder="Şehir girin">
                    </div>
                    <div class="form-group">
                        <label for="exampleTextarea1">Metin Alanı</label>
                        <textarea class="form-control" id="exampleTextarea1"  placeholder="Mesajınızı girin" rows="4"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Gönder</button>
                    <button class="btn btn-light">İptal</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
