@extends('jotno.jotno_shop.shop_layout.main_frame.master')
@section('content')
    <!-- Start Body Content -->
    <div role="tabpanel" class="tab-pane  fade in active" id="checkout">
        <!-- Checkout are start-->
        <div class="checkout-area">
            <div class="">
                <div class="row">
                    <div style="position: relative; left: 500px" class="col-md-10 col-sm-12 col-xs-12">
                        <br>
                        <div class="row">
                            <div class="col-md-6 col-xs-12">
                                <div class="billing-details">
                                    <div class="contact-text right-side">
                                        <h2>Shipping Details</h2>
                                        <form method="post" action="{{route('checkout.store')}}">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="input-box">
                                                        <label>Name <em>*</em></label>
                                                        <input type="text" name="name" class="info @error('name') is-invalid @enderror" placeholder="Name">
                                                        @error('name')
                                                        <div class=" text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="input-box">
                                                        <label>Phone <em>*</em></label>
                                                        <input type="text" name="phone" class="info @error('phone') is-invalid @enderror" placeholder="Phone">
                                                        @error('phone')
                                                        <div class=" text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <div class="input-box">
                                                        <label>Email</label>
                                                        <input type="email" name="email" class="info mb-10 @error('email') is-invalid @enderror" placeholder="Email Address">
                                                        @error('email')
                                                        <div class=" text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <div class="input-box">
                                                        <label>Shipping Address <em>*</em></label>
                                                        <input type="text" name="address" class="info mb-10 @error('address') is-invalid @enderror" placeholder="Shipping Address">
                                                        @error('address')
                                                        <div class=" text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="update-continue-btn text-right">
                                                    <button class="button btn-continue" title="Submit" type="submit"><span>Submit</span></button>
                                                </div>
                                                {{--<div class="col-md-12 col-sm-12 col-xs-12">
                                                    <div class="create-acc clearfix">
                                                        <div class="acc-toggle">
                                                            <input type="checkbox" id="acc-toggle">
                                                            <label for="acc-toggle">Create an Account ?</label>
                                                        </div>
                                                        <div class="create-acc-body">
                                                            <div class="sm-des"> Create an account by entering the information below. If you are a returning customer please login at the top of the page. </div>
                                                            <div class="input-box">
                                                                <label>Account password <em>*</em></label>
                                                                <input type="password" name="pass" class="info" placeholder="Password">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>--}}
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                           {{-- <div class="col-md-6 col-xs-12">
                                <div class="billing-details">
                                    <div class="right-side">
                                        <div class="ship-acc clearfix">
                                            <div class="ship-toggle">
                                                <input type="checkbox" id="ship-toggle">
                                                <label for="ship-toggle">Ship to a different address?</label>
                                            </div>
                                            <div class="ship-acc-body">
                                                <form action="#">
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <div class="input-box">
                                                                <label>First Name <em>*</em></label>
                                                                <input type="text" name="namm" class="info" placeholder="First Name">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <div class="input-box">
                                                                <label>Last Name<em>*</em></label>
                                                                <input type="text" name="namm" class="info" placeholder="Last Name">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                            <div class="input-box">
                                                                <label>Company Name</label>
                                                                <input type="text" name="cpany" class="info" placeholder="Company Name">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <div class="input-box">
                                                                <label>Email Address<em>*</em></label>
                                                                <input type="email" name="email" class="info" placeholder="Your Email">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <div class="input-box">
                                                                <label>Phone Number<em>*</em></label>
                                                                <input type="text" name="phone" class="info" placeholder="Phone Number">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                            <div class="input-box">
                                                                <label>Country <em>*</em></label>
                                                                <select class="selectpicker select-custom" data-live-search="true">
                                                                    <option data-tokens="Bangladesh">Bangladesh</option>
                                                                    <option data-tokens="India">India</option>
                                                                    <option data-tokens="Pakistan">Pakistan</option>
                                                                    <option data-tokens="Pakistan">Pakistan</option>
                                                                    <option data-tokens="Srilanka">Srilanka</option>
                                                                    <option data-tokens="Nepal">Nepal</option>
                                                                    <option data-tokens="Butan">Butan</option>
                                                                    <option data-tokens="USA">USA</option>
                                                                    <option data-tokens="England">England</option>
                                                                    <option data-tokens="Brazil">Brazil</option>
                                                                    <option data-tokens="Canada">Canada</option>
                                                                    <option data-tokens="China">China</option>
                                                                    <option data-tokens="Koeria">Koeria</option>
                                                                    <option data-tokens="Soudi">Soudi Arabia</option>
                                                                    <option data-tokens="Spain">Spain</option>
                                                                    <option data-tokens="France">France</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                            <div class="input-box">
                                                                <label>Address <em>*</em></label>
                                                                <input type="text" name="add1" class="info mb-10" placeholder="Street Address">
                                                                <input type="text" name="add2" class="info mt10" placeholder="Apartment, suite, unit etc. (optional)">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                            <div class="input-box">
                                                                <label>Town/City <em>*</em></label>
                                                                <input type="text" name="add1" class="info" placeholder="Town/City">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <div class="input-box">
                                                                <label>State/Divison <em>*</em></label>
                                                                <select class="selectpicker select-custom" data-live-search="true">
                                                                    <option data-tokens="Barisal">Barisal</option>
                                                                    <option data-tokens="Dhaka">Dhaka</option>
                                                                    <option data-tokens="Kulna">Kulna</option>
                                                                    <option data-tokens="Rajshahi">Rajshahi</option>
                                                                    <option data-tokens="Sylet">Sylet</option>
                                                                    <option data-tokens="Chittagong">Chittagong</option>
                                                                    <option data-tokens="Rangpur">Rangpur</option>
                                                                    <option data-tokens="Maymanshing">Maymanshing</option>
                                                                    <option data-tokens="Cox">Cox's Bazar</option>
                                                                    <option data-tokens="Saint">Saint Martin</option>
                                                                    <option data-tokens="Kuakata">Kuakata</option>
                                                                    <option data-tokens="Sajeq">Sajeq</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <div class="input-box">
                                                                <label>Post Code/Zip Code<em>*</em></label>
                                                                <input type="text" name="zipcode" class="info" placeholder="Zip Code">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="form">
                                            <div class="input-box">
                                                <label>Order Notes</label>
                                                <textarea placeholder="Notes about your order, e.g. special notes for delivery." class="area-tex"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Checkout are end-->
    </div>

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

