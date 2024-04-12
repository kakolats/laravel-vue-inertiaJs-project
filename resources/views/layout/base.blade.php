<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="{{asset('css/fontawesome.css')}}">
    <link rel="stylesheet" href="{{asset('css/templatemo-scholar.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.css')}}">
    <link rel="stylesheet" href="{{asset('css/animate.css')}}">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
</head>
<body class="antialiased">
@include("layout.header")
<div class="container">

    @yield("content")

</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.js"></script>
<script src="{{asset('js/isotope.min.js')}}"></script>
<script src="{{asset('js/owl-carousel.js')}}"></script>
<script src="{{asset('js/counter.js')}}"></script>
<script src="{{asset('js/custom.js')}}"></script>
</html>
