<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Betty Yacht - @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Betty Yacht Company">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-4.1.2/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/font-awesome-4.7.0/css/font-awesome.min.css')}}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/OwlCarousel2-2.3.4/owl.carousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/OwlCarousel2-2.3.4/owl.theme.default.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/OwlCarousel2-2.3.4/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/jquery-datepicker/jquery-ui.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/colorbox/colorbox.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/responsive.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/inner-pages.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/inner-pages_responsive.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="{{ asset('js/jquery.datepicker.extension.range.min.js') }}"></script>
</head>
<body>
<div id="app">
    <div class="super_container">
        <!-- Header -->
        <header class="header header_inner-pages">
    @include('template-parts/header')
        </header>

    <!-- Menu Mobile -->

    @include('menu/main-menu_mobile')
        <div class="allPages-menu">
    @include('menu/main-menu')
        </div>


    @yield('content')

    <!-- Footer -->

        @include('template-parts/footer')


    </div>
</div>


<script src="{{ asset('css/bootstrap-4.1.2/popper.js') }}"></script>
<script src="{{ asset('css/bootstrap-4.1.2/bootstrap.min.js') }}"></script>
<script src="{{ asset('plugins/greensock/TweenMax.min.js') }}"></script>
<script src="{{ asset('plugins/greensock/TimelineMax.min.js') }}"></script>
<script src="{{ asset('plugins/scrollmagic/ScrollMagic.min.js') }}"></script>
<script src="{{ asset('plugins/greensock/animation.gsap.min.js') }}"></script>
<script src="{{ asset('plugins/greensock/ScrollToPlugin.min.js') }}"></script>
<script src="{{ asset('plugins/OwlCarousel2-2.3.4/owl.carousel.js') }}"></script>
<script src="{{ asset('plugins/easing/easing.js') }}"></script>
<script src="{{ asset('plugins/progressbar/progressbar.min.js') }}"></script>
<script src="{{ asset('plugins/parallax-js-master/parallax.min.js') }}"></script>
<script src="{{ asset('plugins/colorbox/jquery.colorbox-min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
<script src="{{ asset('plugins/gridify/gridify-fix.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>

<script>
    $(function() {
        let options = {
            srcNode: 'img',             // grid items
            margin: '15px',             // margin in pixel
            width: '',             // grid item width in pixel
            max_width: '300px',              // dynamic gird item width
            resizable: true,            // re-layout if window resize
            transition: 'all 0.5s ease' // support transition for CSS3
        };
        $('.grid').gridify(options);
    });
</script>

</body>
</html>



