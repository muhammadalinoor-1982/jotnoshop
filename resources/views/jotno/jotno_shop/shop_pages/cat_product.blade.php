@extends('jotno.jotno_shop.shop_layout.main_frame.master')
@section('content')
<!-- Start Body Content -->
    <!-- Revslider -->
    <div class="container jtv-home-revslider">
        <div class="row">
            <div class="col-lg-9 col-sm-9 col-xs-12 jtv-main-home-slider">
                <div id='rev_slider_1_wrapper' class='rev_slider_wrapper fullwidthbanner-container'>
                    <div id='rev_slider_1' class='rev_slider fullwidthabanner'>
                        <ul>
                            @foreach($main_carousels as $carousel)
                                @if($carousel->status == 'active')
                            <li data-transition='slotzoom-horizontal' data-slotamount='7' data-masterspeed='1000' data-thumb='images/slider/slide-img1.jpg'><img src='{{asset('public/jotno_admin/assets/images/mainCarousel/'.$carousel->image)}}' alt="slider image1" data-bgposition='left top'  data-bgfit='cover' data-bgrepeat='no-repeat'  />
                                <div class="info">
                                    <div class='tp-caption ExtraLargeTitle sft  tp-resizeme ' data-x='0'  data-y='165'  data-endspeed='500'  data-speed='500' data-start='1100' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:2;white-space:nowrap;'><span>{!!$carousel->description!!}</span></div>
                                    <div class='tp-caption LargeTitle sfl  tp-resizeme ' data-x='0'  data-y='220'  data-endspeed='500'  data-speed='500' data-start='1300' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:3;white-space:nowrap;'>{{$carousel->heading}}</div>
                                    <div    class='tp-caption Title sft  tp-resizeme ' data-x='0'  data-y='300'  data-endspeed='500'  data-speed='500' data-start='1500' data-easing='Power2.easeInOut' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:4;white-space:nowrap;'>{{$carousel->name}}</div>
                                    <div class='tp-caption sfb  tp-resizeme ' data-x='0'  data-y='350'  data-endspeed='500'  data-speed='500' data-start='1500' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:4;white-space:nowrap;'><a style="background-color: #1cb410; border-color: #1cb410" href='{{$carousel->link}}' class="buy-btn">Browse Now</a></div>
                                </div>
                            </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            {{--<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="banner-block"> <a href="#"> <img src="{{asset('public/jotno_shop/assets/images/banner1.jpg')}}" alt=""> </a>
                    <div class="text-des-container pad-zero">
                        <div class="text-des">
                            <p>Designer</p>
                            <h2>Handbags</h2>
                        </div>
                    </div>
                </div>
                <div class="banner-block"> <a href="#"> <img src="{{asset('public/jotno_shop/assets/images/banner2.jpg')}}" alt=""> </a>
                    <div class="text-des-container">
                        <div class="text-des">
                            <p>The Ultimate</p>
                            <h2>Shoes Collection</h2>
                        </div>
                    </div>
                </div>
            </div>--}}
        </div>
    </div>
    <!-- Support Policy Box -->
    <!-- Main Container -->
    <section class="main-container">
        <div style="background-color: #ffffff" class="container">
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    {{--<div class="col-main">
                        <div style="background-color: #2b542c; border: #2b542c" class="jtv-featured-products">
                            <div class="slider-items-products">
                                <div style="border-color: #1cb410" class="jtv-new-title">
                                    <h2 style="color: white">Featured Products</h2>
                                </div>
                                <div id="featured-slider" class="product-flexslider hidden-buttons">
                                    <div class="slider-items slider-width-col4 products-grid">
                                        <div class="item">
                                            <div style="background-color: #1cb410" class="item-inner">
                                                <div class="item-img">
                                                    <div class="item-img-info"><a class="product-image" title="Product tilte is here" href="product-detail.html"> <img alt="Product tilte is here" src="{{asset('public/jotno_shop/assets/images/products/product-fashion-1.jpg')}}"> </a>
                                                        <div class="new-label new-top-left">new</div>
                                                        <div class="mask-shop-white"></div>
                                                        <a class="quickview-btn" href="quick-view.html"><span>Quick View</span></a> <a href="wishlist.html">
                                                            <div class="mask-left-shop"><i class="fa fa-heart"></i></div>
                                                        </a> <a href="compare.html">
                                                            <div class="mask-right-shop"><i class="fa fa-signal"></i></div>
                                                        </a> </div>
                                                </div>
                                                <div class="item-info">
                                                    <div class="info-inner">
                                                        <div class="item-title"> <a title="Product tilte is here" href="product-detail.html">Product tilte is here </a> </div>
                                                        <div class="item-content">
                                                            <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                                                            <div class="item-price">
                                                                <div class="price-box"> <span class="regular-price"> <span class="price">$99.00</span></span>
                                                                    <p class="old-price"> <span class="price-label">Regular Price:</span> <span class="price"> $167.00 </span> </p>
                                                                </div>
                                                            </div>
                                                            <div class="actions">
                                                                <div class="add_cart">
                                                                    <button class="button btn-cart" type="button"><span><i class="fa fa-shopping-cart"></i> Add to Cart</span></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="item-inner">
                                                <div class="item-img">
                                                    <div class="item-img-info"><a class="product-image" title="Product tilte is here" href="product-detail.html"> <img alt="Product tilte is here" src="{{asset('public/jotno_shop/assets/images/products/product-fashion-1.jpg')}}"> </a>
                                                        <div class="mask-shop-white"></div>
                                                        <a class="quickview-btn" href="quick-view.html"><span>Quick View</span></a> <a href="wishlist.html">
                                                            <div class="mask-left-shop"><i class="fa fa-heart"></i></div>
                                                        </a> <a href="compare.html">
                                                            <div class="mask-right-shop"><i class="fa fa-signal"></i></div>
                                                        </a> </div>
                                                </div>
                                                <div class="item-info">
                                                    <div class="info-inner">
                                                        <div class="item-title"> <a title="Product tilte is here" href="product-detail.html">Product tilte is here </a> </div>
                                                        <div class="item-content">
                                                            <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                                                            <div class="item-price">
                                                                <div class="price-box"> <span class="regular-price"> <span class="price">$75.00</span></span></div>
                                                            </div>
                                                            <div class="actions">
                                                                <div class="add_cart">
                                                                    <button class="button btn-cart" type="button"><span><i class="fa fa-shopping-cart"></i> Add to Cart</span></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="item-inner">
                                                <div class="item-img">
                                                    <div class="item-img-info"><a class="product-image" title="Product tilte is here" href="product-detail.html"> <img alt="Product tilte is here" src="{{asset('public/jotno_shop/assets/images/products/product-fashion-1.jpg')}}"> </a>
                                                        <div class="mask-shop-white"></div>
                                                        <div class="new-label new-top-left">new</div>
                                                        <a class="quickview-btn" href="quick-view.html"><span>Quick View</span></a> <a href="wishlist.html">
                                                            <div class="mask-left-shop"><i class="fa fa-heart"></i></div>
                                                        </a> <a href="compare.html">
                                                            <div class="mask-right-shop"><i class="fa fa-signal"></i></div>
                                                        </a> </div>
                                                </div>
                                                <div class="item-info">
                                                    <div class="info-inner">
                                                        <div class="item-title"> <a title="Product tilte is here" href="product-detail.html">Product tilte is here </a> </div>
                                                        <div class="item-content">
                                                            <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                                                            <div class="item-price">
                                                                <div class="price-box"> <span class="regular-price"> <span class="price">$155.00</span></span>
                                                                    <p class="old-price"> <span class="price-label">Regular Price:</span> <span class="price"> $199.00 </span> </p>
                                                                </div>
                                                            </div>
                                                            <div class="actions">
                                                                <div class="add_cart">
                                                                    <button class="button btn-cart" type="button"><span><i class="fa fa-shopping-cart"></i> Add to Cart</span></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="item-inner">
                                                <div class="item-img">
                                                    <div class="item-img-info"><a class="product-image" title="Product tilte is here" href="product-detail.html"> <img alt="Product tilte is here" src="{{asset('public/jotno_shop/assets/images/products/product-fashion-1.jpg')}}"> </a>
                                                        <div class="sale-label sale-top-left">Sale</div>
                                                        <div class="mask-shop-white"></div>
                                                        <div class="new-label new-top-left">new</div>
                                                        <a class="quickview-btn" href="quick-view.html"><span>Quick View</span></a> <a href="wishlist.html">
                                                            <div class="mask-left-shop"><i class="fa fa-heart"></i></div>
                                                        </a> <a href="compare.html">
                                                            <div class="mask-right-shop"><i class="fa fa-signal"></i></div>
                                                        </a> </div>
                                                </div>
                                                <div class="item-info">
                                                    <div class="info-inner">
                                                        <div class="item-title"> <a title="Product tilte is here" href="product-detail.html">Product tilte is here </a> </div>
                                                        <div class="item-content">
                                                            <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                                                            <div class="item-price">
                                                                <div class="price-box"> <span class="regular-price"> <span class="price">$225.00</span></span></div>
                                                            </div>
                                                            <div class="actions">
                                                                <div class="add_cart">
                                                                    <button class="button btn-cart" type="button"><span><i class="fa fa-shopping-cart"></i> Add to Cart</span></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="item-inner">
                                                <div class="item-img">
                                                    <div class="item-img-info"><a class="product-image" title="Product tilte is here" href="product-detail.html"> <img alt="Product tilte is here" src="{{asset('public/jotno_shop/assets/images/products/product-fashion-1.jpg')}}"> </a>
                                                        <div class="mask-shop-white"></div>
                                                        <div class="new-label new-top-left">new</div>
                                                        <a class="quickview-btn" href="quick-view.html"><span>Quick View</span></a> <a href="wishlist.html">
                                                            <div class="mask-left-shop"><i class="fa fa-heart"></i></div>
                                                        </a> <a href="compare.html">
                                                            <div class="mask-right-shop"><i class="fa fa-signal"></i></div>
                                                        </a> </div>
                                                </div>
                                                <div class="item-info">
                                                    <div class="info-inner">
                                                        <div class="item-title"> <a title="Product tilte is here" href="product-detail.html">Product tilte is here </a> </div>
                                                        <div class="item-content">
                                                            <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                                                            <div class="item-price">
                                                                <div class="price-box"> <span class="regular-price"> <span class="price">$129.00</span></span></div>
                                                            </div>
                                                            <div class="actions">
                                                                <div class="add_cart">
                                                                    <button class="button btn-cart" type="button"><span><i class="fa fa-shopping-cart"></i> Add to Cart</span></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="item-inner">
                                                <div class="item-img">
                                                    <div class="item-img-info"><a class="product-image" title="Product tilte is here" href="product-detail.html"> <img alt="Product tilte is here" src="{{asset('public/jotno_shop/assets/images/products/product-fashion-1.jpg')}}"> </a>
                                                        <div class="mask-shop-white"></div>
                                                        <div class="new-label new-top-left">new</div>
                                                        <a class="quickview-btn" href="quick-view.html"><span>Quick View</span></a> <a href="wishlist.html">
                                                            <div class="mask-left-shop"><i class="fa fa-heart"></i></div>
                                                        </a> <a href="compare.html">
                                                            <div class="mask-right-shop"><i class="fa fa-signal"></i></div>
                                                        </a> </div>
                                                </div>
                                                <div class="item-info">
                                                    <div class="info-inner">
                                                        <div class="item-title"> <a title="Product tilte is here" href="product-detail.html">Product tilte is here </a> </div>
                                                        <div class="item-content">
                                                            <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                                                            <div class="item-price">
                                                                <div class="price-box"> <span class="regular-price"> <span class="price">$179.00</span></span></div>
                                                            </div>
                                                            <div class="actions">
                                                                <div class="add_cart">
                                                                    <button class="button btn-cart" type="button"><span><i class="fa fa-shopping-cart"></i> Add to Cart</span></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>--}}

                        <!-- Main Container -->
                        <div class="main-container col1-layout">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-12 col-xs-12">
                                        <article class="col-main">
                                            <div class="page-title">
                                                {{--@foreach($products as $product)--}}
                                                    <h2>{{$category->name}}</h2>
                                                {{--@endforeach--}}
                                            </div>
                                            {{--<div class="toolbar">
                                                <div class="sorter">
                                                    <div class="view-mode"> <span title="Grid" class="button button-active button-grid">&nbsp;</span><a href="shop-list-sidebar.html" title="List" class="button-list">&nbsp;</a> </div>
                                                </div>
                                                <div id="sort-by">
                                                    <label class="left">Sort By: </label>
                                                    <ul>
                                                        <li><a href="#">Position<span class="right-arrow"></span></a>
                                                            <ul>
                                                                <li><a href="#">Name</a></li>
                                                                <li><a href="#">Price</a></li>
                                                                <li><a href="#">Position</a></li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                    <a class="button-asc left" href="#" title="Set Descending Direction"><span class="top_arrow"></span></a> </div>
                                                <div class="pager">
                                                    <div id="limiter">
                                                        <label>View: </label>
                                                        <ul>
                                                            <li><a href="#">16<span class="right-arrow"></span></a>
                                                                <ul>
                                                                    <li><a href="#">20</a></li>
                                                                    <li><a href="#">30</a></li>
                                                                    <li><a href="#">35</a></li>
                                                                </ul>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>--}}
                                            <div class="category-products">
                                                <ul class="products-grid">
                                                    @foreach($products as $product)
                                                    <li class="item col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                                        <div class="item-inner">
                                                            <div class="item-img">
                                                                <div class="item-img-info"><a class="product-image" title="Product tilte is here" href="product-detail.html"> <img alt="Product tilte is here" src="{{asset('public/jotno_admin/assets/images/product/'.$product->image)}}"> </a>
                                                                    <div class="new-label new-top-left">new</div>
                                                                    <div class="sale-label sale-top-right">sale</div>
                                                                    <div class="mask-shop-white"></div>
                                                                    <div class="new-label new-top-left">new</div>
                                                                    <a class="quickview-btn" href="quick-view.html"><span>Quick View</span></a> <a href="wishlist.html">
                                                                        <div class="mask-left-shop"><i class="fa fa-heart"></i></div>
                                                                    </a> <a href="compare.html">
                                                                        <div class="mask-right-shop"><i class="fa fa-signal"></i></div>
                                                                    </a> </div>
                                                            </div>
                                                            <div class="item-info">
                                                                <div class="info-inner">
                                                                    <div class="item-title"> <a title="Product tilte is here" href="product-detail.html">{{$product->name}} </a> </div>
                                                                    <div class="item-content">
                                                                        <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                                                                        <div class="item-price">
                                                                            <div class="price-box"> <span class="regular-price"> <span class="price">&#2547; {{(!empty($product->disc_price))?$product->disc_price:$product->price}}</span></span>
                                                                                @if(!empty($product>'disc_price'))
                                                                                <p class="old-price"> <span class="price-label">Regular Price:</span> <span class="price"> &#2547; {{($product->price)}} </span> </p>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                        <div class="actions">
                                                                            <div class="add_cart">
                                                                                <button class="button btn-cart" type="button"><span><i class="fa fa-shopping-cart"></i> Add to Cart</span></button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            <div class="toolbar bottom">
                                                <div class="row">
                                                    <div class="col-sm-6 text-left">
                                                        <div class="pages">
                                                            <ul class="pagination">
                                                                <li><a href="#">«</a></li>
                                                                <li class="active"><a href="#">1</a></li>
                                                                <li><a href="#">2</a></li>
                                                                <li><a href="#">3</a></li>
                                                                <li><a href="#">»</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 text-right">Showing 1 to 15 of 25 (2 Pages)</div>
                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Main Container End -->

                        <!-- Latest Blog -->
                    {{--<div class="jtv-latest-blog">
                        <div class="jtv-new-title">
                            <h2>Latest News</h2>
                        </div>
                        <div class="row">
                            <div class="blog-outer-container">
                                <div class="blog-inner">
                                    <div class="col-xs-12 col-sm-4 blog-preview_item">
                                        <div class="entry-thumb jtv-blog-img-hover"> <a href="blog_single_post.html"> <img alt="Blog" src="{{asset('public/jotno_shop/assets/images/blog-img1.jpg')}}"> </a> </div>
                                        <h4 class="blog-preview_title"><a href="blog_single_post.html">Neque porro quisquam est qui</a></h4>
                                        <div class="blog-preview_info">
                                            <ul class="post-meta">
                                                <li><i class="fa fa-user"></i>By <a href="#">admin</a></li>
                                                <li><i class="fa fa-comments"></i><a href="#">8 comments</a></li>
                                                <li><i class="fa fa-clock-o"></i><span class="day">12</span><span class="month">Feb</span></li>
                                            </ul>
                                            <div class="blog-preview_desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. <a class="read_btn" href="blog_single_post.html">Read More</a></div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-4 blog-preview_item">
                                        <div class="entry-thumb jtv-blog-img-hover"> <a href="blog_single_post.html"> <img alt="Blog" src="{{asset('public/jotno_shop/assets/images/blog-img1.jpg')}}"> </a> </div>
                                        <h4 class="blog-preview_title"><a href="blog_single_post.html">Neque porro quisquam est qui</a></h4>
                                        <div class="blog-preview_info">
                                            <ul class="post-meta">
                                                <li><i class="fa fa-user"></i>By <a href="#">admin</a></li>
                                                <li><i class="fa fa-comments"></i><a href="#">20 comments</a></li>
                                                <li><i class="fa fa-clock-o"></i><span class="day">25</span><span class="month">Feb</span></li>
                                            </ul>
                                            <div class="blog-preview_desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. <a class="read_btn" href="blog_single_post.html">Read More</a></div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-4 blog-preview_item">
                                        <div class="entry-thumb jtv-blog-img-hover"> <a href="blog_single_post.html"> <img alt="Blog" src="{{asset('public/jotno_shop/assets/images/blog-img1.jpg')}}"> </a> </div>
                                        <h4 class="blog-preview_title"><a href="blog_single_post.html">Dolorem ipsum quia dolor sit amet</a></h4>
                                        <div class="blog-preview_info">
                                            <ul class="post-meta">
                                                <li><i class="fa fa-user"></i>By <a href="#">admin</a></li>
                                                <li><i class="fa fa-comments"></i><a href="#">8 comments</a></li>
                                                <li><i class="fa fa-clock-o"></i><span class="day">15</span><span class="month">Jan</span></li>
                                            </ul>
                                            <div class="blog-preview_desc">Sed ut perspiciatis unde omnis iste natus error sit voluptatem dolore lauda. <a class="read_btn" href="blog_single_post.html">Read More</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>--}}
                    <!-- End Latest Blog -->
                </div>
            </div>
        </div>
    </section>

    <!-- Collection Banner -->
    {{--<div class="jtv-collection-area">
    <div class="container">
        <div class="column-right pull-left col-sm-4 no-padding"> <a href="#"> <img src="{{asset('public/jotno_shop/assets/images/women-top.jpg')}}" alt="Top Collections"> </a>
            <div class="col-right-text">
                <h5 class="text-uppercase">Top Collections <span> 35% </span> get it now</h5>
            </div>
        </div>
        <div class="column-left pull-right col-sm-8 no-padding">
            <div class="column-left-top">
                <div class="col-left-top-left pull-left col-sm-8 no-padding"> <a href="#"> <img src="{{asset('public/jotno_shop/assets/images/men-suits.jpg')}}" alt="Men's Suits"> </a>
                    <div class="col-left-top-left-text">
                        <h5 class="text-uppercase">Dressing for your Wedding</h5>
                        <h3 class="text-uppercase">Men's Suits</h3>
                        <h5 class="text-uppercase">Look Good, Feel Good</h5>
                    </div>
                </div>
                <div class="col-left-top-right pull-right col-sm-4 no-padding"> <a href="#"> <img src="{{asset('public/jotno_shop/assets/images/footwear.jpg')}}" alt="footwear"> </a>
                    <div class="col-left-top-right-text text-center">
                        <h5 class="text-uppercase">Footwear Fashion Sale</h5>
                        <h3>50%</h3>
                        <h5 class="text-uppercase">Buy 1, Get 1</h5>
                    </div>
                </div>
            </div>
            <div class="column-left-bottom col-sm-12 no-padding">
                <div class="col-left-bottom-left pull-left col-sm-4 no-padding"> <a href="#"> <img src="{{asset('public/jotno_shop/assets/images/handbag.jpg')}}" alt="Handbag"> </a>
                    <div class="col-left-bottom-left-text">
                        <h5 class="text-uppercase">What's New?</h5>
                        <h3 class="text-uppercase">Bag's</h3>
                        <h5 class="text-uppercase">Everyday<br>
                            Low Prices</h5>
                    </div>
                </div>
                <div class="col-left-bottom-right pull-right col-sm-8 no-padding"> <a href="#"> <img src="{{asset('public/jotno_shop/assets/images/watch-banner.jpg')}}" alt="Watch"> </a>
                    <div class="col-left-bottom-right-text">
                        <h5 class="text-uppercase">Never Miss a Second</h5>
                        <h3 class="text-uppercase">Watch</h3>
                        <h5 class="text-uppercase">Time to buy a watch!</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>--}}
    <!-- collection area end -->
    {{--<div class="container">
    <div class="row">
        <div class="col-sm-4 col-xs-12">
            <div style="background-color: #2b542c; border: #2b542c" class="jtv-hot-deal-product">
                <div style="border-color: #1cb410" class="jtv-new-title">
                    <h2 style="color: white">Deals Of The Day</h2>
                </div>
                <ul class="products-grid">
                    <li class="right-space two-height item">
                        <div style="background-color: #002a08" class="item-inner">
                            <div class="item-img">
                                <div class="item-img-info"><a href="#" title="Product tilte is here" class="product-image"><img src="{{asset('public/jotno_shop/assets/images/products/product-fashion-1.jpg')}}" alt="Product tilte is here"> </a>
                                    <div style="background-color: #08bc11; color: black" class="hot-label hot-top-left"><strong>Hot Deal</strong></div>
                                    <div class="mask-shop-white"></div>
                                    <a class="quickview-btn" href="quick-view.html"><span>Quick View</span></a> <a href="wishlist.html">
                                        <div class="mask-left-shop"><i class="fa fa-heart"></i></div>
                                    </a> <a href="compare.html">
                                        <div class="mask-right-shop"><i class="fa fa-signal"></i></div>
                                    </a> </div>
                                <div class="jtv-timer-box">
                                    <div class="countbox_1 timer-grid"></div>
                                </div>
                            </div>

                            <div class="item-info">
                                <div class="info-inner">
                                    <div class="item-title"> <a title="Product tilte is here" href="product-detail.html">Product tilte is here </a> </div>
                                    <div class="item-content">
                                        <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                                        <div class="item-price">
                                            <div class="price-box"> <span class="regular-price"> <span style="color: white" class="price">$125.00</span></span></div>
                                        </div>
                                        <div class="actions">
                                            <div class="add_cart">
                                                <button class="button btn-cart" type="button"><span><i class="fa fa-shopping-cart"></i> Add to Cart</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12 hidden-sm">
            <div class="sidebar-banner">
                <div class="jtv-top-banner"> <a href="#"> <img src="{{asset('public/jotno_shop/assets/images/banner3.jpg')}}" alt="banner"> </a> </div>
                <div class="jtv-top-banner"> <a href="#"> <img src="{{asset('public/jotno_shop/assets/images/banner4.jpg')}}" alt="banner"> </a> </div></div>
        </div>
        <!-- Top Seller Slider -->
        <div class="col-sm-4 col-xs-12">
            <div style="background-color: #2b542c; border: #2b542c" class="jtv-top-products">
                <div class="slider-items-products">
                    <div style="border-color: #1cb410" class="jtv-new-title">
                        <h2 style="color: white">Top Seller</h2>
                    </div>
                    <div id="top-products-slider" class="product-flexslider hidden-buttons">
                        <div class="slider-items slider-width-col4 products-grid">
                            <div class="item">
                                <div style="background-color: #002a08" class="item-inner">
                                    <div class="item-img">
                                        <div class="item-img-info"><a class="product-image" title="Product tilte is here" href="product-detail.html"> <img alt="Product tilte is here" src="{{asset('public/jotno_shop/assets/images/products/product-fashion-1.jpg')}}"> </a>
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
                                            <div class="item-title"> <a title="Product tilte is here" href="product-detail.html">Product tilte is here </a> </div>
                                            <div class="item-content">
                                                <div class="rating"> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                                                <div class="item-price">
                                                    <div class="price-box"> <span class="regular-price"> <span style="color: white" class="price">$125.00</span></span></div>
                                                </div>
                                                <div class="actions">
                                                    <div class="add_cart">
                                                        <button class="button btn-cart" type="button"><span><i class="fa fa-shopping-cart"></i> Add to Cart</span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="item-inner">
                                    <div class="item-img">
                                        <div class="item-img-info"><a class="product-image" title="Product tilte is here" href="product-detail.html"> <img alt="Product tilte is here" src="{{asset('public/jotno_shop/assets/images/products/product-fashion-1.jpg')}}"> </a>
                                            <div class="sale-label sale-top-right">Sale</div>
                                            <div class="mask-shop-white"></div>
                                            <div class="new-label new-top-left">new</div>
                                            <a class="quickview-btn" href="quick-view.html"><span>Quick View</span></a> <a href="wishlist.html">
                                                <div class="mask-left-shop"><i class="fa fa-heart"></i></div>
                                            </a> <a href="compare.html">
                                                <div class="mask-right-shop"><i class="fa fa-signal"></i></div>
                                            </a> </div>
                                    </div>
                                    <div class="item-info">
                                        <div class="info-inner">
                                            <div class="item-title"> <a title="Product tilte is here" href="product-detail.html">Product tilte is here </a> </div>
                                            <div class="item-content">
                                                <div class="rating"> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                                                <div class="item-price">
                                                    <div class="price-box">
                                                        <p class="special-price"> <span class="price-label">Special Price</span><span class="price"> $156.00 </span></p>
                                                        <p class="old-price"> <span class="price-label">Regular Price:</span><span class="price"> $167.00 </span></p>
                                                    </div>
                                                </div>
                                                <div class="actions">
                                                    <div class="add_cart">
                                                        <button class="button btn-cart" type="button"><span><i class="fa fa-shopping-cart"></i> Add to Cart</span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="item-inner">
                                    <div class="item-img">
                                        <div class="item-img-info"><a class="product-image" title="Product tilte is here" href="product-detail.html"> <img alt="Product tilte is here" src="{{asset('public/jotno_shop/assets/images/products/product-fashion-1.jpg')}}"> </a>
                                            <div class="mask-shop-white"></div>
                                            <div class="new-label new-top-left">new</div>
                                            <a class="quickview-btn" href="quick-view.html"><span>Quick View</span></a> <a href="wishlist.html">
                                                <div class="mask-left-shop"><i class="fa fa-heart"></i></div>
                                            </a> <a href="compare.html">
                                                <div class="mask-right-shop"><i class="fa fa-signal"></i></div>
                                            </a> </div>
                                    </div>
                                    <div class="item-info">
                                        <div class="info-inner">
                                            <div class="item-title"> <a title="Product tilte is here" href="product-detail.html">Product tilte is here </a> </div>
                                            <div class="item-content">
                                                <div class="rating"> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                                                <div class="item-price">
                                                    <div class="price-box"> <span class="regular-price"> <span class="price">$125.00</span></span></div>
                                                </div>
                                                <div class="actions">
                                                    <div class="add_cart">
                                                        <button class="button btn-cart" type="button"><span><i class="fa fa-shopping-cart"></i> Add to Cart</span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Top Seller Slider -->
        </div>
    </div>
</div>--}}
<!-- End Body Content -->
@endsection
