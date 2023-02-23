@extends('jotno.jotno_shop.shop_layout.main_frame.master')
@section('content')
    <br><br><br><br>
    <div role="tabpanel" class="tab-pane  fade in" id="complete-order">
        <div class="row">
            <div style="position: relative; left: 270px" class="col-xs-8">
                <div class="checkout-payment-area">
                    <div class="checkout-total">
                        <h3>Your order</h3>
                            <div class="table-responsive">
                                <table class="checkout-area table">
                                    <thead>
                                    <tr class="cart_item check-heading">
                                        <td class="ctg-type"> Image</td>
                                        <td class="ctg-type"> Name</td>
                                        <td class="ctg-type"> Quantity</td>
                                        <td class="cgt-des"> Unit Price</td>
                                        <td class="cgt-des"> Sub Total</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $contents = Cart::content();
                                        $total=0;
                                    @endphp
                                    @foreach($contents as $content)
                                    <tr class="cart_item check-item prd-name">
                                        <td class="ctg-type"><img style="width: 30px" src="{{asset('public/jotno_admin/assets/images/product/'.$content->options->image)}}" alt="Product tilte is here "></td>
                                        <td class="ctg-type"> {{$content->name}}</td>
                                        <td class="ctg-type"> {{$content->qty}}</td>
                                        <td class="ctg-type">&#2547; {{$content->price}}</td>
                                        <td class="cgt-des">&#2547; {{$content->subtotal}}</td>
                                    </tr>
                                    @php
                                        $total += $content->subtotal;
                                    @endphp
                                    @endforeach
                                    <tr class="cart_item">
                                        <td class="ctg-type crt-total"> Total</td>
                                        <td class="cgt-des prc-total"> &#2547; {{$total}} </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                    </div>
                    <div class="checkout-total">
                        <form action="{{route('jotnoshop.payment.store')}}" method="post">
                            @csrf
                            @foreach($contents as $content)
                                <input type="hidden" name="product_id" value="{{$content->id}}">
                            @endforeach
                            <div class="table-responsive">
                                <table class="checkout-area table">
                                    <tbody>
                                    <input type="hidden" name="order_total" value="{{$total}}">
                                    <tr class="cart_item">
                                        <td class="ctg-type">Shipping</td>
                                        <td class="cgt-des ship-opt @error('shipping_type') is-invalid @enderror"><div class="shipp">
                                                <input type="radio" id="pay-toggle" name="shipping_type" value="150">
                                                <label for="pay-toggle">Inner City: <span>&#2547; 150</span></label>
                                            </div>
                                            <div class="shipp">
                                                <input type="radio" id="pay-toggle2" name="shipping_type" value="200">
                                                <label for="pay-toggle2">Out of City: <span>&#2547; 200</span></label>
                                            </div>
                                            <div class="shipp">
                                                <input type="radio" id="pay-toggle2" name="shipping_type" value="300">
                                                <label for="pay-toggle2">Express: <span>&#2547; 300</span></label>
                                            </div>
                                        </td>
                                        @error('shipping_type')
                                        <div class=" text-danger">{{ $message }}</div>
                                        @enderror
                                    </tr>
                                    <tr class="cart_item">
                                        <td class="ctg-type">Payment Method</td>
                                        <td>
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="input-box">
                                                    <select  name="payment_method" id="payment_method" class="selectpicker select-custom @error('payment_method') is-invalid @enderror" data-live-search="true">
                                                        <option value="">Please Select Your Payment Method</option>
                                                        <option value="cash on delivery">Cash On Delivery</option>
                                                        <option value="Bkash">Bkash</option>
                                                    </select>
                                                    @error('payment_method')
                                                    <div class=" text-danger">{{ $message }}</div>
                                                    @enderror
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <div style="display: none;" class="show_field input-box">
                                                            <label>Bkash Number: <em> 111111111</em></label>
                                                            <input type="text" name="transaction_id" class="info" placeholder="Enter Your Transaction ID">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <button class="button btn-continue" title="Place order" type="submit"><span>Place order</span></button>
                        </form>
                    </div>
                </div>
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

