<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Yusuf e-Commerce</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="{{asset('/')}}https://fonts.googleapis.com/css?family=Mukta:300,400,700">
    <link rel="stylesheet" href="{{asset('/')}}fonts/icomoon/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('/')}}https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <link rel="stylesheet" href="{{asset('/')}}css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('/')}}css/magnific-popup.css">
    <link rel="stylesheet" href="{{asset('/')}}css/jquery-ui.css">
    <link rel="stylesheet" href="{{asset('/')}}css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{asset('/')}}css/owl.theme.default.min.css">


    <link rel="stylesheet" href="{{asset('/')}}css/aos.css">

    <link rel="stylesheet" href="{{asset('/')}}css/style.css">

  </head>
  <body>

  <div class="site-wrap">

        @include('frontend.inc.header');

        @yield('content')

       @include('frontend.inc.footer');

  </div>

  <script src="{{asset('/')}}js/jquery-3.3.1.min.js"></script>
  <script src="{{asset('/')}}js/jquery-ui.js"></script>
  <script src="{{asset('/')}}js/popper.min.js"></script>
  <script src="{{asset('/')}}js/bootstrap.min.js"></script>
  <script src="{{asset('/')}}js/owl.carousel.min.js"></script>
  <script src="{{asset('/')}}js/jquery.magnific-popup.min.js"></script>
  <script src="{{asset('/')}}js/aos.js"></script>

  @yield('customjs')

  <script src="{{asset('/')}}js/main.js"></script>
  <script>
    const menu=document.querySelector(".menu1");
const toggle=document.querySelector(".toggle1");
toggle.addEventListener("click",()=>{
  menu.classList.toggle("active");
})
  </script>

  </body>
</html>
