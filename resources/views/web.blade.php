<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Shatabna</title>

        <!-- Favicon -->
        <link rel="icon" href="{{asset('web/img/icon/favicon.ico')}}" type="image/x-icon">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{asset('web/css/bootstrap.min.css')}}">

        <!-- Bootstrap rtl -->
        <link
            rel="stylesheet"
            id="style_web"
            href=""
        />

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- Fontawesome CSS -->
        <link rel="stylesheet" href="{{asset('web/plugins/fontawesome/css/fontawesome.min.css')}}">
        <link rel="stylesheet" href="{{asset('web/plugins/fontawesome/css/all.min.css')}}">

        <!-- Owl Carousel CSS -->
        <link rel="stylesheet" href="{{asset('web/css/owl.carousel.min.css')}}">
        <link rel="stylesheet" href="{{asset('web/css/owl.theme.default.min.css')}}">

        <!-- Select2 CSS -->
        <link rel="stylesheet" href="{{asset('web/plugins/select2/css/select2.min.css')}}">

        {{--  page سجل لاان  --}}
        <link href="{{asset('web/page/css/main.css')}}" rel="stylesheet">
        <link href="{{asset('web/page/css/responsive.css')}}" rel="stylesheet">

        {{--font arabic--}}
        <link rel="stylesheet" type="text/css" href="https://www.fontstatic.com/f=hanimation" />

        <!-- Main CSS -->
        <link rel="stylesheet" href="{{asset('web/css/style.css')}}">

    </head>
    <body>

        <div id="app"></div>

        <!-- jQuery -->
        <script src="{{asset('web/js/jquery-3.6.0.min.js')}}"></script>

        <!-- Bootstrap Bundle JS -->
        <script src="{{asset('web/js/bootstrap.bundle.min.js')}}"></script>

        <!-- Owl Carousel -->
        <script src="{{asset('web/js/owl.carousel.min.js')}}"></script>

        <!-- Select2 JS -->
        <script src="{{asset('web/plugins/select2/js/select2.min.js')}}"></script>

        <!-- Slick JS -->
        <script src="{{asset('web/js/slick.js')}}"></script>

        {{--  page سجل لاان  --}}
        <script src="{{asset('web/page/js/script.js')}}"></script>

        <!-- Sticky Sidebar JS -->
        <script src="{{asset('web/plugins/theia-sticky-sidebar/ResizeSensor.js')}}"></script>
        <script src="{{asset('web/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js')}}"></script>

        <!-- Chart JS -->
        <script src="{{asset('web/plugins/apexchart/apexcharts.min.js')}}"></script>

        <!-- sweet alert -->
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script src="{{asset('web/plugins/apexchart/chart-data.js')}}"></script>

        <!-- Custom JS -->
        <script src="{{asset('web/js/script.js')}}"></script>

        <script src="{{mix('js/app.js')}}"></script>

    </body>
</html>
