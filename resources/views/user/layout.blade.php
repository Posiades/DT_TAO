<!DOCTYPE html>
<html>
  <head>
    <title>DT TAO - @yield('title')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="author" content="DT TAO">
    <meta name="keywords" content="DT TAO, Iphone, ipad, macbook">
    <meta name="description" content="Shop ủy quyền apple, SHop sản phẩm apple">
    <link rel="icon" href="{{ asset('images/mini_logo.png') }}" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.1/font/bootstrap-icons.min.css" rel="stylesheet"> 
  <style>
    .cart-concern .cart-button {
    position: absolute;
    bottom: 50px; /* Increase this value to move the button higher */
    left: 0;
    right: 0;
    z-index: 2; 
    }

    .card-detail {
        position: relative;
        padding-top: 60px; 
        z-index: 1;
    }
    .card-title {
        padding-top: 10px; 
    }

    .card-title a {
        display: block;
        padding-top: 20px; 
    }
    .cart-concern {
        z-index: 2;
    }

    .card-detail {
        z-index: 1; 
    }

  </style>
  </head>

  <body data-bs-spy="scroll" data-bs-target="#navbar" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" tabindex="0">

    @include('user/formIPV4')
    
    @include('user/svg')

    @include('user/search')

    @include('user/header')
    
    @yield('content')

    @include('user/footer')
   
    <script src="{{asset('js/jquery-1.11.0.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script type="text/javascript" src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/plugins.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/script.js')}}"></script>
    <script src="{{asset('js/modernizr.js')}}"></script>
    <script src="{{asset('js/customUser.js')}}"></script>
  </body>
</html>