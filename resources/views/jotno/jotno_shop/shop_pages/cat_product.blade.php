@extends('jotno.jotno_shop.shop_layout.main_frame.master')
@section('content')
<!-- Start Body Content -->
<br>
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
                                                    @foreach($products as $cat_product)
                                                    <li class="item col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                                        <div class="item-inner">
                                                            <div class="item-img">
                                                                <div class="item-img-info"><a class="product-image" title="Product tilte is here" href="product-detail.html"> <img alt="Product tilte is here" src="{{asset('public/jotno_admin/assets/images/product/'.$cat_product->image)}}"> </a>
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
                                                                    <div class="item-title"> <a title="Product tilte is here" href="product-detail.html">{{$cat_product->name}} </a> </div>
                                                                    <div class="item-content">
                                                                        <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                                                                        <div class="item-price">
                                                                            <div class="price-box"> <span class="regular-price"> <span class="price">&#2547; {{(!empty($cat_product->disc_price))?$cat_product->disc_price:$cat_product->price}}</span></span>
                                                                                @if(!empty($cat_product>'disc_price'))
                                                                                <p class="old-price"> <span class="price-label">Regular Price:</span> <span class="price"> &#2547; {{($cat_product->price)}} </span> </p>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                        <div class="actions">
                                                                            <div class="add_cart">
                                                                                <a href="{{route('jotno.product.details',$cat_product->slug)}}"><button class="button btn-cart" type="button"><span><i class="fa fa-shopping-cart"></i> Add to Cart</span></button></a>
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
                </div>
            </div>
        </div>
    </section>
@endsection
