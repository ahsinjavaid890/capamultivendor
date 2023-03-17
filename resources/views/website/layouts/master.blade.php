<!DOCTYPE html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="x-ua-compatible" content="ie=edge" />
        <title>Capa </title>
        <meta name="robots" content="noindex, follow" />
        <meta name="description" content="" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('public/website/assets/images/favicon/favicon.png')}}" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800&display=swap" rel="stylesheet" />

        <!-- CSS
  ============================================ -->

            <!-- Vendor CSS (Bootstrap & Icon Font) -->
         <!-- <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/vendor/ionicons.min.css">
        <link rel="stylesheet" href="assets/css/vendor/simple-line-icons.css">
        <link rel="stylesheet" href="assets/css/vendor/font-awesome.min.css"> -->

            <!-- Plugins CSS (All Plugins Files) -->
         <!-- <link rel="stylesheet" href="assets/css/plugins/animate.css">
        <link rel="stylesheet" href="assets/css/plugins/jquery-ui.min.css">
        <link rel="stylesheet" href="assets/css/plugins/swiper.css">  -->

        <!-- Use the minified version files listed below for better performance and remove the files listed above -->
        <link rel="stylesheet" href="{{asset('public/website/assets/css/vendor/vendor.min.css')}}" />
        <link rel="stylesheet" href="{{asset('public/website/assets/css/plugins/plugins.min.css')}}" />
        <link rel="stylesheet" href="{{asset('public/website/assets/css/style.min.css')}}">

        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.css" rel="stylesheet" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/css/toastr.css" rel="stylesheet" />  
        <!-- Main Style CSS -->
        <!-- <link rel="stylesheet" href="assets/css/style.css" />     -->
        <input type="hidden" id="app_url" value="{{ url('') }}" name="">
        @stack('otherstyle')
    </head>

    <body class="event-plan">
        <!-- Header Section Start From Here -->
        @include('website.layouts.header')

        @include('website.layouts.mobileheader')

        @include('website.layouts.cart_search')

        @yield('content')

        @include('website.layouts.footer')
        @include('website.layouts.loader')
                <!-- JS
============================================ -->

            <!-- Vendors JS -->
        <!-- <script src="assets/js/vendor/jquery-3.6.0.min.js"></script>
        <script src="assets/js/vendor/bootstrap.bundle.min.js"></script>
        <script src="assets/js/vendor/jquery-migrate-3.3.2.min.js"></script>
        <script src="assets/js/vendor/modernizr-3.11.2.min.js"></script> -->

            <!-- Plugins JS -->
         <!-- <script src="assets/js/plugins/jquery-ui.min.js"></script>
        <script src="assets/js/plugins/swiper.min.js"></script>
        <script src="assets/js/plugins/countdown.js"></script>
        <script src="assets/js/plugins/scrollup.js"></script>
        <script src="assets/js/plugins/elevateZoom.js"></script> -->

        <!-- Use the minified version files listed below for better performance and remove the files listed above -->
        <script src="{{asset('public/website/assets/js/vendor/vendor.min.js')}}"></script>
        <script src="{{asset('public/website/assets/js/plugins/plugins.min.js')}}"></script>
        
        <!-- Main Activation JS -->

        <script src="{{asset('public/website/assets/js/main.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/js/toastr.js"></script>
        <script src="{{asset('public/website/assets/js/custom.js')}}"></script>
        <script>
        $(document).ready(function() {
            toastr.options.timeOut = 10000; 
            @if (Session::has('error'))
                toastr.error('{{ Session::get('error') }}');
            @elseif(Session::has('success'))
                toastr.success('{{ Session::get('success') }}');
            @endif          
        });

    </script>
        @stack('otherscript')
        @yield('scripts')


        <script type="text/javascript">
        function addproductinwishlist(id)
        {
            $('#addwishlist'+id).submit();
        }
        function removeproductinwishlist(id)
        {
            $('#removewishlist'+id).submit();
        }
        </script>

    </body>
</html>
