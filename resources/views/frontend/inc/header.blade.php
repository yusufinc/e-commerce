<header class="site-navbar" role="banner">
    <div class="site-navbar-top">
      <div class="container">
        <div class="row align-items-center">

          <div class="col-6 col-md-4 order-2 order-md-1 site-search-icon text-left ">
            <form action="" class="site-block-top-search ">
              <span class="icon icon-search2"></span>
              <input type="text" style="border: 1px solid #f6f3f3;border-radius:22px; width:250px; height:35px" class="form-control bg-light" placeholder="ara...">
            </form>
          </div>

          <div class="col-12 mb-3 mb-md-0 col-md-4 order-1 order-md-2 text-center">
            <div class="site-logo ">
              <a href="{{route('anasayfa')}}" class="js-logo-clone" style="
              border-radius: 20px;
              border: 1px solid #ddd;
          ">{{config('app.name')}}</a>
            </div>
          </div>

          <div class="col-6 col-md-4 order-3 order-md-3 text-right">
            <div class="site-top-icons">
              <ul>
                <li class="px-1"><a href="#"><i class="fa-solid fa-user fa-lg"></i></a></li>
                <li class="px-1"><a href="#"><i class="fa-solid fa-heart fa-lg"></i></a></li>
                <li class="px-1">
                  <a href="{{route('sepet')}}" class="site-cart">
                    <i class="fa-solid fa-basket-shopping fa-lg"></i>
                    <span class="count">2</span>
                  </a>
                </li>
                <li class="d-inline-block d-md-none ml-md-0"><a href="#" class="site-menu-toggle js-menu-toggle"><span class="icon-menu"></span></a></li>
              </ul>
            </div>
          </div>

        </div>
      </div>
    </div>
    <nav class="site-navigation text-right text-md-center" role="navigation">
      <div class="container">
        <ul class="site-menu js-clone-nav d-none d-md-block">
        <li class="active"><a href="{{route('anasayfa')}}">Anasayfa</a></li>
          <li class="has-children">
            <a href="#">Kategori</a>
            <ul class="dropdown">
              @if (!@empty($categories) && $categories->count()>0)
                  @foreach($categories as $category)
                      @if ($category->cat_ust==null)
                          <li class="has-children">
                            <a href="#">{{$category->name}}</a>
                            <ul class="dropdown">
                                 @foreach ($categories as $subCategory)
                                     @if ($subCategory->cat_ust == $category->id)
                                         <li> <a href="#"> {{$subCategory->name}}</a> </li>
                                     @endif
                                 @endforeach
                            </ul>
                          </li>
                      @endif
                  @endforeach
              @endif

                {{-- <li><a href="#">Menu Two</a></li>
                    <li><a href="#">Menu Three</a></li>
                    <li class="has-children">
                      <a href="#">Sub Menu</a>
                      <ul class="dropdown">
                        <li><a href="#">Menu One</a></li>
                        <li><a href="#">Menu Two</a></li>
                        <li><a href="#">Menu Three</a></li>
                      </ul>
                    </li> --}}


            </ul>
          </li>
          <li>
            <a href="{{route('hakkimizda')}}">Hakkımızda</a>
          </li>
          <li><a href="{{route('urunler')}}">Ürünler</a></li>
          <li><a href="{{route('iletisim')}}">İletişim</a></li>
        </ul>
      </div>
    </nav>
  </header>
