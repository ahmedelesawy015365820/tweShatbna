<!DOCTYPE html>
<html lang="ar" dir="rtl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Laravel</title>

        <!-- Favicon -->
		<link rel="shortcut icon" href="{{asset('admin/img/favicon.png')}}">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="{{asset('admin/css/bootstrap.min.css')}}">


        <!-- Bootstrap rtl -->
        <link
            rel="stylesheet"
            id="style_link"
            href="https://cdn.rtlcss.com/bootstrap/v4.5.3/css/bootstrap.min.css"
        />

		<!-- Fontawesome CSS -->
		<link rel="stylesheet" href="{{asset('admin/plugins/fontawesome/css/fontawesome.min.css')}}">
		<link rel="stylesheet" href="{{asset('admin/plugins/fontawesome/css/all.min.css')}}">

		<!-- Feather CSS -->
		<link rel="stylesheet" href="{{asset('admin/css/feather.css')}}">

		<!-- Select2 CSS -->
		<link rel="stylesheet" href="{{asset('admin/plugins/select2/css/select2.min.css')}}">

		<!-- Date Tine Picker  CSS -->
		<link rel="stylesheet" href="{{asset('admin/css/bootstrap-datetimepicker.min.css')}}">

		<!-- Datatables CSS -->
		<link rel="stylesheet" href="{{asset('admin/plugins/datatables/datatables.min.css')}}">

        {{--font arabic--}}
        <link rel="stylesheet" type="text/css" href="https://www.fontstatic.com/f=hanimation" />

        <!-- Main CSS -->
		<link rel="stylesheet" href="{{asset('admin/css/style.css')}}">


    </head>
    <body>

        <div id="admin"></div>

        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <!-- Bootstrap Core JS -->
		<script src="{{asset('admin/js/bootstrap.bundle.min.js')}}"></script>

		<!-- Feather Icon JS -->
		<script src="{{asset('admin/js/feather.min.js')}}"></script>

		<!-- Slimscroll JS -->
		<script src="{{asset('admin/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>

		<!-- Select2 JS -->
		<script src="{{asset('admin/plugins/select2/js/select2.min.js')}}"></script>

        <!-- Datepicker Core JS -->
        <script src="{{asset('admin/plugins/moment/moment.min.js')}}"></script>
        <script src="{{asset('admin/js/bootstrap-datetimepicker.min.js')}}"></script>

        <!-- Datatables JS -->
        <script src="{{asset('admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('admin/plugins/datatables/datatables.min.js')}}"></script>

        <!-- sweet alert -->
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script src="{{asset('admin/js/script.js')}}"></script>

        <script src="{{mix('control/js/admin.js')}}"></script>
        <!-- Custom JS -->
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    </body>
</html>
