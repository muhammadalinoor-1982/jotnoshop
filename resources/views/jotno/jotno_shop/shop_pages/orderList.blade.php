@extends('jotno.jotno_shop.shop_layout.main_frame.master')
@section('content')
    <br><br><br><br>
    <div class="main-container col2-right-layout">
        <div class="main container">
            <div class="row">
                <section class="col-sm-9 col-xs-12">
                    <div class="col-main">
                        <div class="my-account">
                            <div class="page-title">
                                <h2>My Orders</h2>
                            </div>
                            <div class="dashboard">
                                <div class="recent-orders">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-responsive table-bordered text-left my-orders-table">
                                            <thead>
                                            <tr class="first last">
                                                <th>#</th>
                                                <th>Date</th>
                                                <th>Ship To</th>
                                                <th><span class="nobr">Order Total</span></th>
                                                <th>Status</th>
                                                <th class="text-center">Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>100000022</td>
                                                <td>4/30/18</td>
                                                <td>Mr.Vince Roy</td>
                                                <td><span class="price">$1,306.84</span></td>
                                                <td class="text-primary"><em>New</em></td>
                                                <td class="text-center last"><div class="btn-group"> <a href="#" class="btn btn-view-order">View Order</a> <a href="#" class="btn btn-reorder">Reorder</a> </div></td>
                                            </tr>
                                            <tr>
                                                <td>100000021</td>
                                                <td>3/03/18</td>
                                                <td>Mr.Vince Roy</td>
                                                <td><span class="price">$1702.04</span></td>
                                                <td class="text-success"><em>Performed</em></td>
                                                <td class="text-center last"><div class="btn-group"> <a href="#" class="btn btn-view-order">View Order</a> <a href="#" class="btn btn-reorder">Reorder</a> </div></td>
                                            </tr>
                                            <tr>
                                                <td>100000020</td>
                                                <td>1/03/18</td>
                                                <td>Mr.Vince Roy</td>
                                                <td><span class="price">$702.04</span></td>
                                                <td class="text-danger"><em>Canceled</em></td>
                                                <td class="text-center last"><div class="btn-group"> <a href="#" class="btn btn-view-order">View Order</a> <a href="#" class="btn btn-reorder">Reorder</a> </div></td>
                                            </tr>
                                            <tr>
                                                <td>100000019</td>
                                                <td>3/02/18</td>
                                                <td>Mr.Vince Roy</td>
                                                <td><span class="price">$1105.02</span></td>
                                                <td class="text-warning"><em>Pending</em></td>
                                                <td class="text-center last"><div class="btn-group"> <a href="#" class="btn btn-view-order">View Order</a> <a href="#" class="btn btn-reorder">Reorder</a> </div></td>
                                            </tr>
                                            <tr>
                                                <td>100000018</td>
                                                <td>3/02/18</td>
                                                <td>Mr.Vince Roy</td>
                                                <td><span class="price">$202.50</span></td>
                                                <td class="text-success"><em>Performed</em></td>
                                                <td class="text-center last"><div class="btn-group"> <a href="#" class="btn btn-view-order">View Order</a> <a href="#" class="btn btn-reorder">Reorder</a> </div></td>
                                            </tr>
                                            <tr>
                                                <td>100000017</td>
                                                <td>1/02/18</td>
                                                <td>Mr.Vince Roy</td>
                                                <td><span class="price">$2882.85</span></td>
                                                <td class="text-success"><em>Performed</em></td>
                                                <td class="text-center last"><div class="btn-group"> <a href="#" class="btn btn-view-order">View Order</a> <a href="#" class="btn btn-reorder">Reorder</a> </div></td>
                                            </tr>
                                            <tr>
                                                <td>100000016</td>
                                                <td>25/01/18</td>
                                                <td>Mr.Vince Roy</td>
                                                <td><span class="price">$52.10</span></td>
                                                <td class="text-danger"><em>Canceled</em></td>
                                                <td class="text-center last"><div class="btn-group"> <a href="#" class="btn btn-view-order">View Order</a> <a href="#" class="btn btn-reorder">Reorder</a> </div></td>
                                            </tr>
                                            <tr>
                                                <td>100000015</td>
                                                <td>24/01/18</td>
                                                <td>Mr.Vince Roy</td>
                                                <td><span class="price">$12002.54</span></td>
                                                <td class="text-warning"><em>Pending</em></td>
                                                <td class="text-center last"><div class="btn-group"> <a href="#" class="btn btn-view-order">View Order</a> <a href="#" class="btn btn-reorder">Reorder</a> </div></td>
                                            </tr>
                                            <tr>
                                                <td>100000014</td>
                                                <td>12/01/18</td>
                                                <td>Mr.Vince Roy</td>
                                                <td><span class="price">$952.80</span></td>
                                                <td class="text-success"><em>Performed</em></td>
                                                <td class="text-center last"><div class="btn-group"> <a href="#" class="btn btn-view-order">View Order</a> <a href="#" class="btn btn-reorder">Reorder</a> </div></td>
                                            </tr>
                                            <tr>
                                                <td>100000013</td>
                                                <td>3/01/18</td>
                                                <td>Mr.Vince Roy</td>
                                                <td><span class="price">$1202.12</span></td>
                                                <td class="text-success"><em>Performed</em></td>
                                                <td class="text-center last"><div class="btn-group"> <a href="#" class="btn btn-view-order">View Order</a> <a href="#" class="btn btn-reorder">Reorder</a> </div></td>
                                            </tr>
                                            </tbody>
                                        </table>
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
                                <li><a href="dashboard.html"><i class="fa fa-angle-right"></i> Account Dashboard</a></li>
                                <li><a href="my-account-information.html"><i class="fa fa-angle-right"></i> Account Information</a></li>
                                <li><a href="my-address.html"><i class="fa fa-angle-right"></i> Address Book</a></li>
                                <li class="current"><a href="my-order.html"><i class="fa fa-angle-right"></i> My Orders</a></li>
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

