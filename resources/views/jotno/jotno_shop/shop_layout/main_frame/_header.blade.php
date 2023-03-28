<div style="background-color: orange" class="header-container">
    <div class="container">
        <div class="row">
            <div style="position: relative; left: 500px" class="col-lg-8 col-sm-8 col-xs-10 jtv-rhs-header jtv-header-box">
                <div class="search_cart_block">
                   {{-- <div style="background-color: #01a23c" class="search-box hidden-xs">
                        <form id="search_mini_form" action="{{route('search.product')}}" method="post">
                            @csrf
                            <input id="search" type="text" name="slug" value="" class="searchbox" placeholder="Product Search" maxlength="128">
                            <button type="submit" title="Search" class="search-btn-bg" id="submit-button"><span class="hidden-sm">Search</span><i class="fa fa-search hidden-xs hidden-lg hidden-md"></i></button>
                        </form>
                    </div>--}}
                    @php
                        $contents = Cart::content();
                        $total=0;
                        foreach($contents as $content){
                           $total += $content->subtotal;
                        }
                    @endphp
                    <div class="right_menu">
                        <div class="menu_top">
                            <div class="top-cart-contain pull-right">
                                <div class="mini-cart">
                                    <div class="basket"><a class="basket-icon" href="#"><i class="fa fa-shopping-basket"></i> Shopping Cart <span>{{Cart::count()}}</span></a>
                                        <div style="background-color: rgba(23,105,0,0.92)" class="top-cart-content">
                                            <div style="background-color: rgba(23,105,0,0.92)" class="block-subtitle">
                                                <div class="top-subtotal">{{Cart::count()}}, <span style="color: white" class="price">&#2547; {{$total}}</span></div>
                                            </div>
                                            <ul style="background-color: rgba(23,105,0,0.92)" class="mini-products-list" id="cart-sidebar">
                                                @foreach($contents as $content)
                                                <li class="item">
                                                    <div class="item-inner"><a class="product-image" title="product tilte is here" href="product-detail.html"><img alt="product tilte is here" src="{{asset('public/jotno_admin/assets/images/product/'.$content->options->image)}}"></a>
                                                        <div class="product-details">
                                                            <div class="access">
                                                                <a class="btn-remove1" title="Remove This Item" href="{{route('delete.cart', $content->rowId)}}">Remove</a>
                                                                <a class="btn-edit" title="Edit item" href="{{route('view.cart')}}"><i class="fa fa-pencil"></i><span class="hidden">Edit item</span></a> </div>
                                                            <p class="product-name"><a href="product-detail.html">{{$content->name}}</a></p>
                                                            <strong style="color: #0bb7ff">{{$content->qty}}</strong><span style="color: #0bb7ff"> x </span><span style="color: #0bb7ff" class="price">&#2547; {{$content->price}}</span></div>
                                                    </div>
                                                </li>
                                                @endforeach
                                            </ul>
                                            <div style="background-color: rgba(23,105,0,0.92)" class="actions"> <a href="{{route('view.cart')}}" class="view-cart"><span>View Cart</span></a>
                                                @if(@Auth::user()->id != NULL && Session::get('shipping_id') == NULL)
                                                    <a href="{{route('checkOut')}}"><button style="background-color: #1cb410" class="btn-checkout" title="Checkout" type="button"><span>Checkout</span></button></a>
                                                @elseif(@Auth::user()->id != NULL && Session::get('shipping_id') != NULL)
                                                    <a href="{{route('jotno.shop.payment')}}"><button style="background-color: #1cb410" class="btn-checkout" title="Checkout" type="button"><span>Checkout</span></button></a>
                                                @else
                                                    <a href="{{route('login')}}"><button style="background-color: #1cb410" class="btn-checkout" title="Checkout" type="button"><span>Checkout</span></button></a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{--<div class="language-box hidden-xs">
                            <select class="selectpicker" data-width="fit">
                                <option>English</option>
                                <option>Francais</option>
                                <option>German</option>
                                <option>Español</option>
                            </select>
                        </div>--}}
                        {{--<div class="currency-box hidden-xs">
                            <form class="form-inline">
                                <div class="input-group">
                                    <div class="currency-addon">
                                        <select class="currency-selector">
                                            <option data-symbol="$">USD</option>
                                            <option data-symbol="€">EUR</option>
                                            <option data-symbol="£">GBP</option>
                                            <option data-symbol="¥">JPY</option>
                                            <option data-symbol="$">CAD</option>
                                            <option data-symbol="$">AUD</option>
                                        </select>
                                    </div>
                                </div>
                            </form>
                        </div>--}}
                    </div>
                </div>
                <div class="top_section hidden-xs">
                    <div class="toplinks">
                        @if(@Auth::user()->id !=NULL && @Auth::user()->role == 'customer')
                        <div class="site-dir hidden-xs"> <a class="hidden-sm" href="#"><i style="color: white" class="fa fa-phone"></i> <strong style="color: white">Contact: </strong><span style="color: white"> {{@Auth::user()->mobile}}</span></a> <a href="mailto:support@example.com"><i style="color: white" class="fa fa-envelope"></i><span style="color: white"> {{@Auth::user()->email}}</span></a> </div>
                        @endif
                        {{--@include('jotno.jotno_shop.shop_layout.main_frame._message')--}}
                        <ul class="links">
                            @if(@Auth::user()->id != NULL && @Auth::user()->role == 'customer')
                                <li><a style="color: white" title="My Account" href="{{route('customer.view')}}">My Account</a></li>
                                <li><a style="color: white" title="My Order" href="{{route('jotnoshop.orderList')}}">My Order</a></li>
                            @endif
                            <li>
                                @if(@Auth::user()->id !=NULL && @Auth::user()->role == 'customer')
                                    <a style="color: white" class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
                                @else
                                    <a style="color: white" href="{{route('login')}}">Login</a><br>
                                @endif
                                {{--<a style="color: white" title="Log In" href="{{ route('login') }}">Log In</a>--}}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-9 col-sm-9 col-xs-12 jtv-rhs-header">
                <div class="jtv-mob-toggle-wrap">
                    <div class="mm-toggle"><i class="fa fa-reorder"></i><span class="mm-label">Menu</span></div>
                </div>
            </div>
            <div style="position: relative; right: 900px; top: 20px"><a title="ecommerce Template" href="{{url('')}}"><img alt="ecommerce Template" src="{{asset('public/jotno_shop/assets/images/logo.png')}}"></a></div>
            <div class="col-lg-3 col-sm-3 col-xs-12">

                {{--<div class="nav-icon">
                    <div class="mega-container visible-lg visible-md visible-sm">
                        <div class="navleft-container">
                            <div style="background-color: #1cb410" class="mega-menu-title">
                                <h3 style="background-color: #1cb410"><i class="fa fa-navicon"></i>Categories</h3>
                            </div>
                            <div class="mega-menu-category">
                                <ul class="nav">
                                    <li><a href="#">Home</a>
                                        <div class="wrap-popup column1">
                                            <div style="background-color: #1c7430" class="popup">
                                                <ul class="nav">
                                                    <li><a style="color: white" href="index.html">Home Shop 1</a></li>
                                                    <li><a style="color: white" href="version2/index.html">Home Shop 2</a></li>
                                                    <li><a style="color: white" href="version3/index.html">Home Shop 3</a></li>
                                                    <li><a style="color: white" href="version4/index.html">Home Shop 4</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                    <li><a href="#">Page</a>
                                        <div class="wrap-popup">
                                            <div class="popup">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <ul class="nav">
                                                            <li><a href="shop-grid.html"><span>Shop Grid</span></a></li>
                                                            <li><a href="shop-grid-sidebar.html"><span>Shop Grid Sidebar</span></a></li>
                                                            <li><a href="shop-list.html"><span>Shop List</span></a></li>
                                                            <li><a href="shop-list-sidebar.html"><span>Shop List Sidebar</span></a></li>
                                                            <li><a href="product-detail.html"><span>Product Detail</span></a></li>
                                                            <li><a href="product-detail-sidebar.html"><span>Product Detail Sidebar</span></a></li>
                                                            <li><a href="shopping-cart.html"><span>Shopping Cart</span></a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <ul class="nav">
                                                            <li><a href="checkout.html"><span>Checkout</span></a></li>
                                                            <li><a href="wishlist.html"><span>Wishlist</span></a></li>
                                                            <li><a href="dashboard.html"><span>Dashboard</span></a></li>
                                                            <li><a href="compare.html"><span>Compare</span></a></li>
                                                            <li><a href="quick-view.html"><span>Quick View</span></a></li>
                                                            <li><a href="complete-order.html">Complete Order</a></li>
                                                            <li><a href="my-account-information.html">Account Information</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <ul class="nav">
                                                            <li><a href="faq.html"><span>FAQ</span></a></li>
                                                            <li><a href="sitemap.html"><span>Sitemap</span></a></li>
                                                            <li><a href="track-order.html"><span>Track Order</span></a></li>
                                                            <li><a href="register-ac.html"><span>Register Account</span></a></li>
                                                            <li><a href="forgot-password.html"><span>Forgot Password</span></a></li>
                                                            <li><a href="team.html"><span>Team</span></a></li>
                                                            <li><a href="404error.html"><span>404 Error Page</span></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li><a href="#">Men's</a>
                                        <div class="wrap-popup">
                                            <div class="popup">
                                                <div class="row">
                                                    <div class="col-md-4 col-sm-6">
                                                        <h3><a href="shop-grid-sidebar.html">Clothing</a></h3>
                                                        <ul class="nav">
                                                            <li><a href="shop-grid-sidebar.html">T-Shirts</a></li>
                                                            <li><a href="shop-grid-sidebar.html">Shirts</a></li>
                                                            <li><a href="shop-grid-sidebar.html">Trousers</a></li>
                                                            <li><a href="shop-grid-sidebar.html">Sleep Wear</a></li>
                                                        </ul>
                                                        <br>
                                                        <h3><a href="shop-grid-sidebar.html">Shoes</a></h3>
                                                        <ul class="nav">
                                                            <li><a href="shop-grid-sidebar.html">Flat Shoes</a></li>
                                                            <li><a href="shop-grid-sidebar.html">Flat Sandals</a></li>
                                                            <li><a href="shop-grid-sidebar.html">Boots</a></li>
                                                            <li><a href="shop-grid-sidebar.html">Heels</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6 has-sep">
                                                        <h3><a href="shop-grid-sidebar.html">Jwellery</a></h3>
                                                        <ul class="nav">
                                                            <li><a href="shop-grid-sidebar.html">Bracelets</a></li>
                                                            <li><a href="shop-grid-sidebar.html">Necklaces &amp; Pendent</a></li>
                                                            <li><a href="shop-grid-sidebar.html">Pendants</a></li>
                                                            <li><a href="shop-grid-sidebar.html">Pins &amp; Brooches</a></li>
                                                        </ul>
                                                        <br>
                                                        <h3><a href="shop-grid-sidebar.html">Watches</a></h3>
                                                        <ul class="nav">
                                                            <li><a href="shop-grid-sidebar.html">Fastrack</a></li>
                                                            <li><a href="shop-grid-sidebar.html">Casio</a></li>
                                                            <li><a href="shop-grid-sidebar.html">Sonata</a></li>
                                                            <li><a href="shop-grid-sidebar.html">Maxima</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-4 has-sep hidden-sm">
                                                        <div class="custom-menu-right">
                                                            <div class="box-banner media">
                                                                <div class="add-right"><a href="#"><img src="{{asset('public/jotno_shop/assets/images/jtv-menu-banner1.jpg')}}" class="img-responsive" alt="New Arrive"></a></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <a href="#" class="ads"><img src="{{asset('public/jotno_shop/assets/images/jtv-menu-banner4.jpg')}}" alt="Mega Sale" class="img-responsive"></a> </div>
                                        </div>
                                    </li>
                                    <li><a href="#">Women's</a>
                                        <div class="wrap-popup">
                                            <div class="popup">
                                                <div class="row">
                                                    <div class="col-md-4 col-sm-6">
                                                        <h3><a href="shop-grid-sidebar.html">Clothing</a></h3>
                                                        <ul class="nav">
                                                            <li><a href="shop-grid-sidebar.html">Dress sale</a></li>
                                                            <li><a href="shop-grid-sidebar.html">Sarees</a></li>
                                                            <li><a href="shop-grid-sidebar.html">Kurta & kurti</a></li>
                                                            <li><a href="shop-grid-sidebar.html">Dress materials</a></li>
                                                            <li><a href="shop-grid-sidebar.html">Salwar kameez sets</a></li>
                                                        </ul>
                                                        <br>
                                                        <h3><a href="shop-grid-sidebar.html">Jewellery</a></h3>
                                                        <ul class="nav">
                                                            <li><a href="shop-grid-sidebar.html">Rings</a></li>
                                                            <li><a href="shop-grid-sidebar.html">Earrings</a></li>
                                                            <li><a href="shop-grid-sidebar.html">Jewellery sets</a></li>
                                                            <li><a href="shop-grid-sidebar.html">Pendants & lockets</a></li>
                                                            <li><a href="shop-grid-sidebar.html">Plastic jewellery</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6 has-sep">
                                                        <h3><a href="shop-grid-sidebar.html">Beauty</a></h3>
                                                        <ul class="nav">
                                                            <li><a href="shop-grid-sidebar.html">Make up</a></li>
                                                            <li><a href="shop-grid-sidebar.html">Hair care</a></li>
                                                            <li><a href="shop-grid-sidebar.html">Deodorants</a></li>
                                                            <li><a href="shop-grid-sidebar.html">Bath & body</a></li>
                                                            <li><a href="shop-grid-sidebar.html">Skin care</a></li>
                                                        </ul>
                                                        <br>
                                                        <h3><a href="shop-grid-sidebar.html">Footwear</a></h3>
                                                        <ul class="nav">
                                                            <li><a href="shop-grid-sidebar.html">Flats</a></li>
                                                            <li><a href="shop-grid-sidebar.html">Heels</a></li>
                                                            <li><a href="shop-grid-sidebar.html">Boots</a></li>
                                                            <li><a href="shop-grid-sidebar.html">Slippers</a></li>
                                                            <li><a href="shop-grid-sidebar.html">Shoes</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-4 has-sep hidden-sm">
                                                        <div class="custom-menu-right">
                                                            <div class="box-banner media">
                                                                <div class="add-desc">
                                                                    <h3>Top<br>
                                                                        Glass </h3>
                                                                    <div class="price-sale">2018</div>
                                                                    <a href="#">Shop Now</a> </div>
                                                                <div class="add-right"><img src="{{asset('public/jotno_shop/assets/images/jtv-menu-banner2.jpg')}}" alt="Top Glass" class="img-responsive"></div>
                                                            </div>
                                                            <div class="box-banner media">
                                                                <div class="add-desc">
                                                                    <h3>Save</h3>
                                                                    <div class="price-sale">35%</div>
                                                                    <a href="#">Buy Now</a> </div>
                                                                <div class="add-right"><img src="{{asset('public/jotno_shop/assets/images/jtv-menu-banner3.jpg')}}" alt="Save 35%" class="img-responsive"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="nosub"><a href="shop-grid-sidebar.html">Kids</a></li>
                                    <li class="nosub"><a href="shop-grid-sidebar.html">Accessories</a></li>
                                    <li><a href="blog.html">Blog</a>
                                        <div class="wrap-popup column1">
                                            <div class="popup">
                                                <ul class="nav">
                                                    <li><a href="blog.html">Blog</a></li>
                                                    <li><a href="blog-archive.html">Blog Archive</a></li>
                                                    <li><a href="blog_single_post.html">Blog Single</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="nosub"><a href="contact.html">Contact Us</a></li>
                                </ul>
                                <div class="side-banner"><img src="{{asset('public/jotno_shop/assets/images/top-banner.jpg')}}" alt="Flash Sale" class="img-responsive"></div>
                            </div>
                        </div>
                    </div>
                </div>--}}
            </div>
            {{--<div class="col-lg-9 col-sm-9 col-xs-12 jtv-rhs-header">
                <div class="jtv-mob-toggle-wrap">
                    <div class="mm-toggle"><i class="fa fa-reorder"></i><span class="mm-label">Menu</span></div>
                </div>
                <div class="jtv-header-box">
                    <div class="search_cart_block">
                        <div style="background-color: #01a23c" class="search-box hidden-xs">
                            <form id="search_mini_form" action="#" method="get">
                                <input id="search" type="text" name="q" value="" class="searchbox" placeholder="Search entire store here..." maxlength="128">
                                <button type="submit" title="Search" class="search-btn-bg" id="submit-button"><span class="hidden-sm">Search</span><i class="fa fa-search hidden-xs hidden-lg hidden-md"></i></button>
                            </form>
                        </div>
                        <div class="right_menu">
                            <div class="menu_top">
                                <div class="top-cart-contain pull-right">
                                    <div class="mini-cart">
                                        <div class="basket"><a class="basket-icon" href="#"><i class="fa fa-shopping-basket"></i> Shopping Cart <span>3</span></a>
                                            <div style="background-color: rgba(23,105,0,0.92)" class="top-cart-content">
                                                <div style="background-color: rgba(23,105,0,0.92)" class="block-subtitle">
                                                    <div class="top-subtotal">3 items, <span style="color: white" class="price">$399.49</span></div>
                                                </div>
                                                <ul style="background-color: rgba(23,105,0,0.92)" class="mini-products-list" id="cart-sidebar">
                                                    <li class="item">
                                                        <div class="item-inner"><a class="product-image" title="product tilte is here" href="product-detail.html"><img alt="product tilte is here" src="{{asset('public/jotno_shop/assets/images/products/product-fashion-1.jpg')}}"></a>
                                                            <div class="product-details">
                                                                <div class="access"><a class="btn-remove1" title="Remove This Item" href="#">Remove</a> <a class="btn-edit" title="Edit item" href="#"><i class="fa fa-pencil"></i><span class="hidden">Edit item</span></a> </div>
                                                                <p class="product-name"><a href="product-detail.html">Product tilte is here</a></p>
                                                                <strong>1</strong> x <span class="price">$119.99</span></div>
                                                        </div>
                                                    </li>
                                                    <li class="item">
                                                        <div class="item-inner"><a class="product-image" title="Product tilte is here" href="product-detail.html"><img alt="Product tilte is here" src="{{asset('public/jotno_shop/assets/images/products/product-fashion-1.jpg')}}"></a>
                                                            <div class="product-details">
                                                                <div class="access"><a class="btn-remove1" title="Remove This Item" href="#">Remove</a> <a class="btn-edit" title="Edit item" href="#"><i class="fa fa-pencil"></i><span class="hidden">Edit item</span></a> </div>
                                                                <p class="product-name"><a href="product-detail.html">Product tilte is here</a></p>
                                                                <strong>1</strong> x <span class="price">$79.66</span></div>
                                                        </div>
                                                    </li>
                                                    <li class="item">
                                                        <div class="item-inner"><a class="product-image" title="Product tilte is here" href="product-detail.html"><img alt="Product tilte is here" src="{{asset('public/jotno_shop/assets/images/products/product-fashion-1.jpg')}}"></a>
                                                            <div class="product-details">
                                                                <div class="access"><a class="btn-remove1" title="Remove This Item" href="#">Remove</a> <a class="btn-edit" title="Edit item" href="#"><i class="fa fa-pencil"></i><span class="hidden">Edit item</span></a> </div>
                                                                <p class="product-name"><a href="product-detail.html">Product tilte is here</a></p>
                                                                <strong>1</strong> x <span class="price">$99.89</span></div>
                                                        </div>
                                                    </li>
                                                </ul>
                                                <div style="background-color: rgba(23,105,0,0.92)" class="actions"> <a href="shopping-cart.html" class="view-cart"><span>View Cart</span></a>
                                                    <button style="background-color: #1cb410" onclick="window.location.href='checkout.html'" class="btn-checkout" title="Checkout" type="button"><span>Checkout</span></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            --}}{{--<div class="language-box hidden-xs">
                                <select class="selectpicker" data-width="fit">
                                    <option>English</option>
                                    <option>Francais</option>
                                    <option>German</option>
                                    <option>Español</option>
                                </select>
                            </div>--}}{{--
                            --}}{{--<div class="currency-box hidden-xs">
                                <form class="form-inline">
                                    <div class="input-group">
                                        <div class="currency-addon">
                                            <select class="currency-selector">
                                                <option data-symbol="$">USD</option>
                                                <option data-symbol="€">EUR</option>
                                                <option data-symbol="£">GBP</option>
                                                <option data-symbol="¥">JPY</option>
                                                <option data-symbol="$">CAD</option>
                                                <option data-symbol="$">AUD</option>
                                            </select>
                                        </div>
                                    </div>
                                </form>
                            </div>--}}{{--
                        </div>
                    </div>
                    <div class="top_section hidden-xs">
                        <div class="toplinks">
                            <div class="site-dir hidden-xs"> <a class="hidden-sm" href="#"><i style="color: white" class="fa fa-phone"></i> <strong style="color: white">Hotline:</strong><span style="color: white"> +1 123 456 7890</span></a> <a href="mailto:support@example.com"><i style="color: white" class="fa fa-envelope"></i><span style="color: white"> support@example.com</span></a> </div>
                            @include('jotno.jotno_shop.shop_layout.main_frame._message')
                            <ul class="links">
                                <li><a style="color: white" title="My Account" href="my-account.html">My Account</a></li>
                                <li><a style="color: white" title="My Wishlist" href="wishlist.html">Wishlist</a></li>
                                <li><a style="color: white" title="Checkout" href="checkout.html">Checkout</a></li>
                                <li><a style="color: white" title="Track Order" href="track-order.html">Track Order</a></li>
                                <li>
                                    @if(@Auth::user()->id !=NULL)
                                        <a style="color: white" class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
                                    @else
                                        <a style="color: white" href="{{route('login')}}">Login</a><br>
                                    @endif
                                    --}}{{--<a style="color: white" title="Log In" href="{{ route('login') }}">Log In</a>--}}{{--
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>--}}
        </div>
    </div>
</div>

