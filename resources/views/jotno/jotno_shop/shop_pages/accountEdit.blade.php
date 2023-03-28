@extends('jotno.jotno_shop.shop_layout.main_frame.master')
@section('content')
    <br><br><br><br>
    <!-- main-container -->
    <div class="main-container col2-right-layout">
        <div class="main container">
            <div class="row">
                <section class="col-sm-9 col-xs-12">
                    <div class="col-main">
                        <form method="post" action="{{route('customer.update',$editData->id)}}" enctype="multipart/form-data">
                            @csrf
                        <div class="my-account">
                            <div class="page-title">
                                <h2>Edit Account Information</h2>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-md-6 col-xs-12">
                                    <div class="title-box">
                                        <h3>Account Information</h3>
                                    </div>
                                    <ul class="list-unstyled">
                                        <li>
                                            <div class="form-group">
                                                <label for="fname"><strong>Name </strong></label>
                                                <input type="text" name="name" class="form-control" value="{{$editData->name}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="lname"><strong>Email </strong></label>
                                                <input type="email" name="email" class="form-control" value="{{$editData->email}}">
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-group">
                                                <label for="emailAddress"><strong>Phone </strong></label>
                                                <input type="text" name="mobile" class="form-control" value="{{$editData->mobile}}">
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-group">
                                                <label for="emailAddress"><strong>Address </strong></label>
                                                <input type="text" name="address" class="form-control" value="{{$editData->address}}">
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="buttons-set">
                                <button id="send2" name="send" type="submit" class="button login"><span>Update</span></button>
                        </div>
                    </div>
                </form>
                </section>
                <aside class="col-right sidebar col-sm-3 col-xs-12">
                    <div class="block block-account">
                        <div class="block-title">My Account</div>
                        <div class="block-content">
                            <ul>
                                <li class="current"><a href="{{route('customer.view')}}"><i class="fa fa-angle-right"></i> Account Information</a></li>
                                @if (Route::has('password.request'))
                                    <li><a href="{{ route('password.request') }}"><i class="fa fa-angle-right"></i> Reset Password</a></li>
                                @endif
                                @if(@Auth::user()->id != NULL && @Auth::user()->role == 'customer')
                                    <li><a href="{{route('jotnoshop.orderList')}}"><i class="fa fa-angle-right"></i> My Orders</a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                    <div class="block block-compare">
                        <div class="block-title "><span>Compare Products (3)</span></div>
                        <div class="block-content">
                            <ol id="compare-items">
                                <li class="item">
                                    <input type="hidden" value="2173" class="compare-item-id">
                                    <a class="jtv-btn-remove" title="Remove This Item" href="#"></a> <a href="#" class="product-name"><i class="fa fa-angle-right"></i>Product Title Here</a></li>
                                <li class="item">
                                    <input type="hidden" value="2174" class="compare-item-id">
                                    <a class="jtv-btn-remove" title="Remove This Item" href="#"></a> <a href="#" class="product-name"><i class="fa fa-angle-right"></i>Product Title Here</a></li>
                                <li class="item">
                                    <input type="hidden" value="2175" class="compare-item-id">
                                    <a class="jtv-btn-remove" title="Remove This Item" href="#"></a> <a href="#" class="product-name"><i class="fa fa-angle-right"></i>Product Title Here</a></li>
                            </ol>
                            <div class="ajax-checkout">
                                <button type="submit" title="Submit" class="button button-compare"><span>Compare</span></button>
                                <button type="submit" title="Submit" class="button button-clear"><span>Clear</span></button>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
    <!--End main-container -->
    <!-- Support Policy Box -->
    <div class="container">
        <div style="background-color: lawngreen; border-color: lawngreen" class="support-policy-box">
            <div class="row">
                @foreach($categories as $category)
                    <div class="col-md-2 col-sm-2 col-xs-2">
                        <div style="color: black" class="content">
                            <a href="{{route('jotno.cat_product',$category->category_id)}}"><h4 >{{$category->category_id}}</h4></a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Main Container -->
    <section class="main-container">
        <div style="background-color: #ffffff" class="container">
            <div class="row">
                <div class="col-sm-12 col-xs-12">

                    <!-- Trending Products Slider -->
                    @foreach($categories as $category)
                        @php
                            $category_wise_product = App\Product::where('category_id',$category->category_id)->orderBy('id','desc')->get();
                        @endphp
                        <div style="background-color: #ffffff; border: #ffffff" class="jtv-trending-products">
                            <div class="slider-items-products">
                                <div style="border-color: #1cb410" class="jtv-new-title">
                                    <h2>{{$category->category_id}}</h2>
                                </div>
                                <div id="trending-slider" class="product-flexslider hidden-buttons">
                                    <div class="slider-items slider-width-col4 products-grid">
                                        @foreach($category_wise_product as $cat_product)
                                            @if($cat_product->status == 'active')
                                                <div class="item">
                                                    <div  style="background-color: #ffffff" class="item-inner">
                                                        <div class="item-img">
                                                            <div class="item-img-info"><a class="product-image" title="Product tilte is here" href="product-detail.html"> <img alt="Product tilte is here" src="{{asset('public/jotno_admin/assets/images/product/'.$cat_product->image)}}"> </a>
                                                                <div class="new-label new-top-left">new</div>
                                                                <div class="mask-shop-white"></div>
                                                                <div style="background-color: #08bc11; color: black" class="new-label new-top-left"><strong>new</strong></div>
                                                                <a class="quickview-btn" href="quick-view.html"><span>Quick View</span></a> <a href="wishlist.html">
                                                                    <div class="mask-left-shop"><i class="fa fa-heart"></i></div>
                                                                </a> <a href="compare.html">
                                                                    <div class="mask-right-shop"><i class="fa fa-signal"></i></div>
                                                                </a> </div>
                                                        </div>
                                                        <div class="item-info">
                                                            <div class="info-inner">
                                                                <div class="item-title"> <a style="color: black" title="Product tilte is here" href="product-detail.html">{{$cat_product->name}} </a> </div>
                                                                <div class="item-content">
                                                                    <div style="color: darkorange" class="rating"> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                                                                    <div class="item-price">
                                                                        <div class="price-box"> <span class="regular-price"> <span class="price">&#2547; {{(!empty($cat_product->disc_price))?$cat_product->disc_price:$cat_product->price}}</span></span>
                                                                            @if(!empty($cat_product->disc_price))
                                                                                <p class="old-price"> <span class="price-label">Regular Price:</span> <span class="price">&#2547; {{($cat_product->price)}}</span> </p>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                    <div class="actions">
                                                                        <div class="add_cart">
                                                                            <a href="{{route('jotno.product.details',$cat_product->slug)}}"><button style="background-color: #00ff12; border-color: #00ff12" class="button btn-cart" type="button"><span><i class="fa fa-shopping-cart"></i>Add to Cart </span></button></a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                @endforeach
                <!-- End Trending Products Slider -->
@endsection

