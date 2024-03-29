{{--@php
$prefix = Request::route()->getPrefix();
$route = Route::current()->getName();
@endphp--}}
<!-- Side Header Start -->
<div class="side-header show">
    <button class="side-header-close"><i class="zmdi zmdi-close"></i></button>
    <!-- Side Header Inner Start -->
    <div class="side-header-inner custom-scroll">

        <nav class="side-header-menu" id="side-header-menu">
            <ul>
                <li class="has-sub-menu"><a data-clipboard-text="fa fa-th-large" href="#"><i class="fa fa-th-large" aria-hidden="true"></i> <span>Dashboard</span></a>
                    <ul class="side-header-sub-menu">
                        <li><a data-clipboard-text="fa fa-square" href="{{route('jotno.main')}}"><i class="fa fa-square" aria-hidden="true"></i><span>Home</span></a></li>
                    </ul>
                </li>

                <li class="has-sub-menu"><a data-clipboard-text="fa fa-th-large" href="#"><i class="fa fa-th-large" aria-hidden="true"></i> <span>Registration</span></a>
                    <ul class="side-header-sub-menu">
                        <li><a data-clipboard-text="fa fa-square" href="{{route('Register.customer.view')}}"><i class="fa fa-square" aria-hidden="true"></i><span>Customer List</span></a></li>
                        <li><a data-clipboard-text="fa fa-square" href="{{route('Register.stuff.view')}}"><i class="fa fa-square" aria-hidden="true"></i><span>Stuff List</span></a></li>
                    </ul>
                </li>

                <li class="has-sub-menu"><a data-clipboard-text="fa fa-th-large" href="#"><i class="fa fa-th-large" aria-hidden="true"></i> <span>Category</span></a>
                    <ul class="side-header-sub-menu">
                        <li><a data-clipboard-text="fa fa-square" href="{{route('category.view')}}"><i class="fa fa-square" aria-hidden="true"></i><span>Category List</span></a></li>
                    </ul>
                </li>

                <li class="has-sub-menu"><a data-clipboard-text="fa fa-th-large" href="#"><i class="fa fa-th-large" aria-hidden="true"></i> <span>Brand</span></a>
                    <ul class="side-header-sub-menu">
                        <li><a data-clipboard-text="fa fa-square" href="{{route('brand.view')}}"><i class="fa fa-square" aria-hidden="true"></i><span>Brand List</span></a></li>
                    </ul>
                </li>

                <li class="has-sub-menu"><a data-clipboard-text="fa fa-th-large" href="#"><i class="fa fa-th-large" aria-hidden="true"></i> <span>Size</span></a>
                    <ul class="side-header-sub-menu">
                        <li><a data-clipboard-text="fa fa-square" href="{{route('size.view')}}"><i class="fa fa-square" aria-hidden="true"></i><span>Size List</span></a></li>
                    </ul>
                </li>

                <li class="has-sub-menu"><a data-clipboard-text="fa fa-th-large" href="#"><i class="fa fa-th-large" aria-hidden="true"></i> <span>Color</span></a>
                    <ul class="side-header-sub-menu">
                        <li><a data-clipboard-text="fa fa-square" href="{{route('color.view')}}"><i class="fa fa-square" aria-hidden="true"></i><span>Color List</span></a></li>
                    </ul>
                </li>

                <li class="has-sub-menu"><a data-clipboard-text="fa fa-th-large" href="#"><i class="fa fa-th-large" aria-hidden="true"></i> <span>Weight</span></a>
                    <ul class="side-header-sub-menu">
                        <li><a data-clipboard-text="fa fa-square" href="{{route('weight.view')}}"><i class="fa fa-square" aria-hidden="true"></i><span>Weight List</span></a></li>
                    </ul>
                </li>

                <li class="has-sub-menu"><a data-clipboard-text="fa fa-th-large" href="#"><i class="fa fa-th-large" aria-hidden="true"></i> <span>Product</span></a>
                    <ul class="side-header-sub-menu">
                        <li><a data-clipboard-text="fa fa-square" href="{{route('product.view')}}"><i class="fa fa-square" aria-hidden="true"></i><span>Product List</span></a></li>
                    </ul>
                </li>
            </ul>
        </nav>

    </div><!-- Side Header Inner End -->
</div>
<!-- Side Header End -->
