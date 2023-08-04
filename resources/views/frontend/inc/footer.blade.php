<footer class="site-footer border-top">
    <div class="container">
      <div class="row">

        <div class="col-lg-4 mb-5 mb-lg-4">
          <div class="row">
            <div class="col-md-12">
              <h3 class="footer-heading mb-4">Menü</h3>
            </div>
            <div class="col-md-6 col-lg-4">
              <ul class="list-unstyled">
                <li><a href="{{route('anasayfa')}}">Anasayfa</a></li>
                  <li><a href="{{route('hakkimizda')}}">Hakkımızda</a></li>
                  <li><a href="{{route('urunler')}}">Ürünler</a></li>
                  <li><a href="{{route('iletisim')}}">İletişim</a></li>
              </ul>
            </div>
          </div>
        </div>

        <div class="col-md-4 col-lg-4">
          <div class="block-5 mb-5">
            <h3 class="footer-heading mb-4">İetişim Bilgilerim</h3>
            <ul class="list-unstyled">
              <li class="address">{{$settings['adres']}}</li>
              <li class="phone"><a href="tel://{{str_replace(' ','',$settings['phone'])}}">{{$settings['phone']}}</a></li>
              <li class="email">{{$settings['email']}}</li>
            </ul>
          </div>
        </div>

        <div class="col-md-4 col-lg-4">
            <div class="menu1">
                <div class="toggle1">
                  <i class="fa-solid fa-share-nodes"></i>
                  </div>

                    <li style="--i:0;--clr:#1877f2">
                    <a href="#"><i class="fa-brands fa-facebook"></i></a>
                  </li>
                  <li style="--i:1;--clr:#25d366">
                    <a href="#"><i class="fa-brands fa-spotify"></i></a>
                  </li>
                  <li style="--i:2;--clr:#1da1f2">
                    <a href="#"><i class="fa-brands fa-twitter"></i></a>
                  </li>
                   <li style="--i:3;--clr:#FF5733">
                    <a href="#"><i class="fa-brands fa-reddit"></i></a>
                  </li>
                  <li style="--i:4;--clr:#0a66c2">
                    <a href="#"><i class="fa-brands fa-discord"></i></a>
                  </li>
                  <li style="--i:5;--clr:#c32aa3">
                    <a href="#"><i class="fa-brands fa-instagram"></i></a>
                  </li>
                  <li style="--i:6;--clr:#1b1e21">
                    <a href="#"><i class="fa-brands fa-github"></i></a>
                  </li>
                  <li style="--i:7;--clr:#ff0000">
                    <a href="#"><i class="fa-brands fa-youtube"></i></a>
                  </li>
              </div>
          </div>

      </div>


      <div class="row pt-5 mt-5 text-center">
        <div class="col-md-12">
            <p>
                Copyright &copy; {{date('Y')}} Tüm Hakları Saklıdır
            </p>
        </div>
      </div>
    </div>
  </footer>
