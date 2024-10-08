<!DOCTYPE html>
<html lang="en" class="">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tài Khoản - @yield('title')</title>
  <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
  
  <link rel="stylesheet" href="{{asset('admin/css/main.css?v=1628755089081')}}">
  <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png"/>
  <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png"/>
  <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png"/>
  <link rel="mask-icon" href="safari-pinned-tab.svg" color="#00b4b6"/>
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-130795909-1"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
          .modal-backdrop {
            z-index: 1040 !important; /* Đảm bảo giá trị này thấp hơn modal */
        }

        .modal {
            z-index: 1050 !important; /* Đảm bảo modal luôn nằm trên backdrop */
        }

    </style>

</head>
<body>
  


@include('client/left_side')

@yield('content')


<script type="text/javascript" src="{{asset('admin/js/main.min.js?v=1628755089081')}}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
<link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.9.95/css/materialdesignicons.min.css">
<script type="text/javascript" src="{{asset('js/bootstrap.bundle.min.js')}}"></script>

</body>
</html>
