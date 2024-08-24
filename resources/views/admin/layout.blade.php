<!DOCTYPE html>
<html lang="en" class="">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>DT TAO ADMIN - @yield('title')</title>
  <link rel="icon" href="{{ asset('images/mini_logo.png') }}" type="image/x-icon">
  <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
  
  <link rel="stylesheet" href="{{asset('admin/css/main.css?v=1628755089081')}}">
 <style>
  .field.has-addons {
  display: flex;
}

.field.has-addons .control:not(:last-child) {
  flex: 1;
}

.field.has-addons .control:not(:last-child) .input {
  border-top-right-radius: 0;
  border-bottom-right-radius: 0;
}

.field.has-addons .control:last-child .button {
  border-top-left-radius: 0;
  border-bottom-left-radius: 0;
}

@media screen and (max-width: 768px) {
  .field.has-addons {
    flex-direction: column;
  }
  
  .field.has-addons .control:not(:last-child) .input {
    border-radius: 4px;
    margin-bottom: 0.5rem;
  }
  
  .field.has-addons .control:last-child .button {
    border-radius: 4px;
  }
}
 </style>
</head>
<body>
  
@include('admin/header')

@include('admin/left_side')

@yield('content')

@include('admin/footer')

<script type="text/javascript" src="{{asset('admin/js/main.min.js?v=1628755089081')}}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
<link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.9.95/css/materialdesignicons.min.css">
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window, document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '658339141622648');
  fbq('track', 'PageView');
</script>
<script type="text/javascript" src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>
