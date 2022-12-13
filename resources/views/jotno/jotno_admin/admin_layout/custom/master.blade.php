<!doctype html>
<html class="no-js" lang="en">

<head>
    @include('jotno.jotno_admin.admin_layout.custom._head')
</head>

<body class="skin-dark">

<div class="main-wrapper">

    <!-- Header Section Start -->
@include('jotno.jotno_admin.admin_layout.custom._header')
<!-- Header Section End -->

    <!-- Side Header Start -->
@include('jotno.jotno_admin.admin_layout.custom._side_header')
<!-- Side Header End -->

    <!-- Content Body Start -->
    <div class="content-body">

        <!-- Page Headings Start -->

        <!-- Page Headings End -->

        <!-- Top Report Wrap Start -->
        <!-- Top Report Wrap End -->
        @yield('content')

    </div>
    <!-- Content Body End -->

    <!-- Footer Section Start -->
@include('jotno.jotno_admin.admin_layout.custom._footer')
<!-- Footer Section End -->

</div>

<!-- Start java script -->
@include('jotno.jotno_admin.admin_layout.custom._script')
<!-- End java script -->



</body>

</html>
