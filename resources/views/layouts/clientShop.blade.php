<!doctype html>
<html class="no-js" lang="zxx">


<!-- Mirrored from tunatheme.com/tf/html/broccoli-preview/broccoli/shop-grid.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 25 Jul 2024 16:15:32 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Broccoli - Organic Food HTML Template</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @yield('css')
    <style>
        .btn-logout:hover{
            color: rgb(67, 175, 5);
        }
    </style>
    <!-- Place favicon.png in the root directory -->
    <link rel="shortcut icon" href="{{asset('assets/clients/img/favicon.png')}}" type="image/x-icon" />
    <!-- Font Icons css -->
    <link rel="stylesheet" href="{{asset('assets/clients/css/font-icons.css')}}">
    <!-- plugins css -->
    <link rel="stylesheet" href="{{asset('assets/clients/css/plugins.css')}}">
    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="{{asset('assets/clients/css/style.css')}}">
    <!-- Responsive css -->
    <link rel="stylesheet" href="{{asset('assets/clients/css/responsive.css')}}">
</head>

<body>
    <!--[if lte IE 9]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
    <![endif]-->

    <!-- Add your site or application content here -->

<!-- Body main wrapper start -->
<div class="wrapper">

    <!-- HEADER AREA START (header-5) -->
    <header class="ltn__header-area ltn__header-5 ltn__header-transparent gradient-color-2">

        @include('clients.blocks.headerShop')
    </header>
    <!-- HEADER AREA END -->
    <!-- Utilize Mobile Menu Start -->
  
    <!-- Utilize Mobile Menu End -->

   

    <!-- BREADCRUMB AREA START -->
    <div class="ltn__breadcrumb-area ltn__breadcrumb-area-2 ltn__breadcrumb-color-white bg-overlay-theme-black-90 bg-image plr--9---" data-bg="img/bg/9.jpg">
        <div class="container">
          @include('clients.blocks.bannerHeader')
        </div>
    </div>
    <!-- BREADCRUMB AREA END -->
    
    <!-- PRODUCT DETAILS AREA START -->
    <div class="ltn__product-area ltn__product-gutter mb-120">
        <div class="container">
          @yield('content')
        </div>
    </div>
    <!-- PRODUCT DETAILS AREA END -->

  
    <!-- FOOTER AREA START -->
    <footer class="ltn__footer-area  ">
     @include('clients.blocks.footer')
    </footer>
    <!-- FOOTER AREA END -->


</div>
<!-- Body main wrapper end -->

    <!-- All JS Plugins -->
    <script src="{{asset('assets/clients/js/plugins.js')}}"></script>
    <!-- Main JS -->
    <script src="{{asset('assets/clients/js/main.js')}}"></script>
    @yield('js')
</body>

<!-- Mirrored from tunatheme.com/tf/html/broccoli-preview/broccoli/shop-grid.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 25 Jul 2024 16:15:32 GMT -->
</html>

