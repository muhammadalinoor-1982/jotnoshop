@extends('jotno.jotno_shop.shop_layout.main_frame.master')
@section('content')
    <br><br><br><br>
    <!-- main-container -->
    <div class="main-container col2-right-layout">
        <div class="main container">
            <div class="row">
                <section class="col-sm-9 col-xs-12">
                    <div class="col-main">
                        <div class="my-account">
                            <div class="page-title">
                                <h2>Order Details</h2>
                            </div>
                            <div class="dashboard">
                                <div class="recent-orders">
                                    <div class="title-buttons"><strong>Order and Delivery</strong></div>
                                    <div class="table-responsive">
                                        <table  class="data-table" id="my-orders-table">
                                            <thead>
                                            <tr class="first last">
                                                <th>Order ID</th>
                                                <th>Order Proceed</th>
                                                <th>Order Date</th>
                                                <th>Delivery Type</th>
                                                <th>Delivery Charge</th>
                                                <th>Status</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr style="color: rgba(0,46,255,0.92)" class="first odd">
                                                <td>{{$order->custom_id}}</td>
                                                <td>{{$order->created_at->diffForHumans()}} </td>
                                                <td>{{$order->created_at}} </td>
                                                <td>
                                                    {{$order['payment']['payment_method']}}
                                                    @if($order['payment']['payment_method'] == 'Bkash')
                                                        (Transaction ID: {{$order['payment']['transaction_id']}})
                                                    @endif
                                                </td>
                                                <td>&#2547; {{$order['payment']['shipping_type']}}</td>
                                                @if($order->status == 'pending')
                                                    <td style="color: red"><strong>Pending</strong></td>
                                                @else
                                                    <td style="color: green"><strong>Approved</strong></td>
                                                @endif

                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="page-title">
                                </div><br>
                                <div class="recent-orders">
                                    <div class="title-buttons"><strong>Billing Address</strong></div>
                                    <div class="table-responsive">
                                        <table  class="data-table" id="my-orders-table">
                                            <thead>
                                            <tr class="first last">
                                                <th>Name</th>
                                                <th>Phone</th>
                                                <th>Email</th>
                                                <th>Address</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr style="color: rgba(0,46,255,0.92)" class="first odd">
                                                <td>{{$order['shipping']['name']}}</td>
                                                <td>{{$order['shipping']['phone']}}</td>
                                                <td>{{$order['shipping']['email']}}</td>
                                                <td>{{$order['shipping']['address']}}</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="box-account">
                                    <div class="page-title">

                                    </div>
                                </div>
                                @foreach($order['orderDetails'] as $details)
                                <div class="box-account">
                                    <div class="col2-set">
                                        <div class="col-1">
                                            <h5>Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{$details['product']['name']}} </h5>
                                            <address>
                                                Weight &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <strong style="color: rgba(0,121,255,0.92)">{{$details['weight']['name']}}</strong><br>
                                                Quantity &nbsp;&nbsp;&nbsp;: <strong style="color: rgba(0,121,255,0.92)">{{$details->quantity}}</strong><br>
                                                Price &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <strong style="color: rgba(0,121,255,0.92)">&#2547; {{(!empty($details['product']['disc_price']))?$details['product']['disc_price']:$details['product']['price']}}</strong><br>
                                                @php
                                                $subTotal = ((!empty($details['product']['disc_price']))?$details['product']['disc_price']:$details['product']['price']) * $details->quantity;
                                                @endphp
                                                Sub Total &nbsp;: <strong style="color: rgba(0,121,255,0.92)">&#2547; {{$subTotal}}</strong><br><br>
                                            </address>
                                        </div>
                                        <div class="col-2">
                                            <h5>{{$details['product']['name']}}</h5>
                                            <img src="{{url('public/jotno_admin/assets/images/product/'.$details['product']['image'])}}" alt="" style="width: 10%">
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                <div class="box-account">
                                    <div class="page-title">

                                    </div>
                                    <div class="page-title">
                                        @php
                                            $finalCost = $order['payment']['shipping_type']+$order->order_total;
                                        @endphp
                                        <h2 style="color: rgba(0,46,255,0.92)">Grand Total: &#2547; {{$finalCost}}</h2> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (Delivery Charge: &#2547; {{$order['payment']['shipping_type']}}) + (Total: &#2547; {{$order->order_total}})
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <aside class="col-right sidebar col-sm-3 col-xs-12">
                    <div class="block block-account">
                        <div class="block-title">My Account</div>
                        <div class="block-content">
                            <ul>
                                <li class="current"><a href="dashboard.html"><i class="fa fa-angle-right"></i> Account Dashboard</a></li>
                                <li><a href="my-account-information.html"><i class="fa fa-angle-right"></i> Account Information</a></li>
                                <li><a href="my-address.html"><i class="fa fa-angle-right"></i> Address Book</a></li>
                                <li><a href="my-order.html"><i class="fa fa-angle-right"></i> My Orders</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i> Billing Agreements</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i> Recurring Profiles</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i> My Product Reviews</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i> My Tags</a></li>
                                <li><a href="wishlist.html"><i class="fa fa-angle-right"></i> My Wishlist</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i> My Downloadable</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i> Newsletter Subscriptions</a></li>
                            </ul>
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

