@extends('frontend.layout.layout')

@section('content')
<div class="bg-light py-3">
    <div class="container">
      <div class="row">
        <div class="col-md-12 mb-0"><a href="index.html">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Shop</strong></div>
      </div>
    </div>
  </div>

  <div class="site-section">
    <div class="container">

      <div class="row mb-5">
        <div class="col-md-9 order-2">

          <div class="row">
            <div class="col-md-12 mb-5">
              <div class="float-md-left mb-4"><h2 class="text-black h5">Ürünler</h2></div>
              <div class="d-flex">
                <div class="dropdown mr-1 ml-md-auto">

                </div>
                <div class="btn-group">
                  <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" id="dropdownMenuReference" data-toggle="dropdown">Sıralama</button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuReference">
                    <a class="dropdown-item" href="#" data-sira="a_z_order">A'dan Z'ye</a>
                    <a class="dropdown-item" href="#" data-sira="z_a_order">Z'den A'ya</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#" data-sira="price_min_order">Azalan Fiyata göre</a>
                    <a class="dropdown-item" href="#" data-sira="price_max_order">Artan Fiyata göre</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row mb-5">
            <div class="col-lg-12">
                @if (session()->get('success'))
                    <div class="alert alert-success">{{session()->get('success')}}</div>
                @endif
            </div>
        </div>
          <div class="row mb-5">
        @if (!empty($products) && $products-> count() > 0)
        @foreach ($products as $product)
        <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
            <div class="block-4 text-center border">
            <figure class="block-4-image">
                <a href="{{route('urundetay',$product->slug)}}"><img src="{{asset($product->image)}}" alt="Image placeholder" class="img-fluid"></a>
            </figure>
            <div class="block-4-text p-4">
                <h3><a href="{{route('urundetay',$product->slug)}}">{{$product->name}}</a></h3>
                <p class="mb-0">{{$product->short_text}}</p>
                <p class="text-primary font-weight-bold">{{number_format($product->price,0)}}</p>

                <form action="{{route('sepet.add')}}" method="POST" >
                    @csrf
                    <input type="hidden" name="id" value="{{$product->id}}">
                    <input type="hidden" name="size" value="{{$product->size}}">

                  <button type="submit" class="buy-now btn btn-sm btn-primary">Sepete Ekle</button>
                  </form>

            </div>
            </div>
        </div>
@endforeach
@endif
          </div>
          <div class="row" data-aos="fade-up">
            {{$products->withQueryString()->links('pagination::custom')}}
            {{-- <div class="col-md-12 text-center">
              <div class="site-block-27">
                <ul>
                  <li><a href="#">&lt;</a></li>
                  <li class="active"><span>1</span></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
                  <li><a href="#">5</a></li>
                  <li><a href="#">&gt;</a></li>
                </ul>
              </div>
            </div> --}}
          </div>
        </div>

        <div class="col-md-3 order-1 mb-5 mb-md-0">
          <div class="border p-4 rounded mb-4">
            <h3 class="mb-3 h6 text-uppercase text-black d-block">Kategori</h3>
            <ul class="list-unstyled mb-0">
                @if (!empty($categories) && $categories->count() > 0)
                    @foreach ($categories->where('cat_ust',null) as $category)
                    <li class="mb-1"><a href="{{route($category->slug.'urunler')}}" class="d-flex"><span>{{$category->name}}</span> <span class="text-black ml-auto">({{$category->getTotalProductCount()}})</span></a></li>
                    @endforeach
               @endif
            </ul>
          </div>

          <div class="border p-4 rounded mb-4">
            <div class="mb-4">
              <h3 class="mb-3 h6 text-uppercase text-black d-block">Fiyata göre sırala</h3>
              <div id="slider-range" class="border-primary"></div>
              <input type="text" name="text" id="amount" class="form-control border-0 pl-0 bg-white" disabled="" />
            </div>

            <div class="mb-4">
              <h3 class="mb-3 h6 text-uppercase text-black d-block">Boyut</h3>
              @if (!@empty($sizelists))
                  @foreach ($sizelists as $sizelist)
                    <label for="s_sm" class="d-flex">
                <input type="checkbox" id="s_sm" class="mr-2 mt-1"> <span class="text-black">{{$sizelist}}</span>
              </label>
                  @endforeach
              @endif
            </div>

            <div class="mb-4">
              <h3 class="mb-3 h6 text-uppercase text-black d-block">Renk</h3>
              @if (!@empty($colors))
              @foreach ($colors as $color)
              <a href="#" class="d-flex color-item align-items-center" >
                <span class="bg-success color d-inline-block rounded-circle mr-2"></span> <span class="text-black">{{$color}}</span>
              </a>
              @endforeach
          @endif
            </div>

          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="site-section site-blocks-2">
              <div class="row justify-content-center text-center mb-5">
                <div class="col-md-7 border-2 text-center site-section-heading pt-4">
                  <h2>Kategoriler</h2>
                </div>
              </div>
              <div class="row">
                @if (!@empty($categories))
                    @foreach ($categories->where('cat_ust',null) as $category)
                    <div class="col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-0" data-aos="fade" data-aos-delay="">
                        <a class="block-2-item" href="{{route($category->slug.'urunler')}}">
                            <figure class="image">
                            <img src="{{asset($category->image)}}" alt="" class="img-fluid">
                            </figure>
                            <div class="text">
                            <h3>{{$category->name}}</h3>
                            </div>
                        </a>
                    </div>
                    @endforeach
                @endif
              </div>

          </div>
        </div>
      </div>

    </div>
  </div>
@endsection

@section('customjs')

<script>
    var minprice = "{{$minprice}}";
    var maxprice = "{{$maxprice}}";
</script>

@endsection
