<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('bootstrap5/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('bootstrap-icons/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="{{asset('style/style.css')}}">
    <link rel="stylesheet" href="{{asset('style/now-ui-dashboard/now-ui-dashboard.css')}}">
    <link rel="stylesheet" href="{{asset('swiper/swiper-bundle.min.css')}}">
    <script src="{{asset('swiper/swiper-bundle.min.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
  
    {{-- <script src="{{asset('bootstrap5/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('bootstrap5/bootstrap.min.js')}}"></script> --}}

   
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
      <!--swiper-->
    <title>PASARGAD</title>
</head>
<body>

   <x-flash-message/>
    {{$slot}}

</body>
</html>