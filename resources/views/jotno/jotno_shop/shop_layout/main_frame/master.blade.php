<!DOCTYPE html>
<html lang="en">
<head>
    @include('jotno.jotno_shop.shop_layout.main_frame._head')
</head>

<body style="background-color: #ffffff" class="cms-index-index cms-home-page">

<!-- Start Newsletter Popup -->
@include('jotno.jotno_shop.shop_layout.main_frame._popup')
<!-- End Newsletter Popup -->

<!-- Start Mobile Menu -->
@include('jotno.jotno_shop.shop_layout.main_frame._mobile_menu')
<!-- End Mobile Menu -->

<div id="page">
    <!-- Header -->
    <header>
        @include('jotno.jotno_shop.shop_layout.main_frame._header')
    </header>
    <!-- end header -->

    <!-- Start Body Content -->
    @yield('content')
    <!-- End Body Content -->

    <!-- Start Brand Logo -->
@include('jotno.jotno_shop.shop_layout.main_frame._brand')
<!-- End Brand Logo -->

    <!-- Start Footer -->
@include('jotno.jotno_shop.shop_layout.main_frame._footer')
<!-- End Footer -->
</div>

<!-- Start JavaScript -->
@include('jotno.jotno_shop.shop_layout.main_frame._script')
<!-- Start JavaScript -->

</body>
</html>
