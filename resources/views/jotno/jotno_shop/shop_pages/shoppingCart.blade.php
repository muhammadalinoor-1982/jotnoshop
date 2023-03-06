@extends('jotno.jotno_shop.shop_layout.main_frame.master')
@section('content')
    <br><br>
    <!-- Start Body Content -->
  {{--  <div class="content-tab-product-category">--}}
        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade in active" id="cart">
                <!-- cart are start-->
                <div class="cart-page-area">
                    {{--<form method="post" action="{{route('update.cart')}}">--}}
                        <div class="table-responsive">
                            <table class="shop-cart-table">
                                <thead>
                                <tr>
                                    <th style="width: 5%" class="product-thumbnail ">Image</th>
                                    <th style="width: 5%" class="product-name ">Name</th>
                                    {{--<th style="width: 5%" class="product-name ">Size</th>
                                    <th style="width: 5%" class="product-name ">Color</th>--}}
                                    <th style="width: 5%" class="product-name ">Weight</th>
                                    <th style="width: 5%" class="product-price ">Unit Price</th>
                                    <th style="width: 5%" class="product-price ">Quantity</th>
                                    <th style="width: 5%" class="product-subtotal ">Total</th>
                                    <th style="width: 5%" class="product-remove">Remove</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                    $contents = Cart::content();
                                    $total=0;
                                @endphp
                                @foreach($contents as $content)
                                <tr class="cart_item">
                                    <td class="item-img"><a href="#"><img src="{{asset('public/jotno_admin/assets/images/product/'.$content->options->image)}}" alt="Product tilte is here " style="width: 30%"> </a></td>
                                    <td class="item-title"><a href="#">{{$content->name}} </a></td>
                                    {{--<td class="item-title"><a href="#">{{$content->options->size_name}} </a></td>
                                    <td class="item-title"><a href="#">{{$content->options->color_name}} </a></td>--}}
                                    <td class="item-title"><a href="#">{{$content->options->weight_name}} </a></td>
                                    <td class="item-price">&#2547; {{$content->price}}  </td>
                                    <td class="item-price">
                                        <form method="post" action="{{route('update.cart')}}">
                                            @csrf
                                        <input style="text-align: center" type="number" class="input-text qty" title="Qty" value="{{$content->qty}}" maxlength="12" id="qty" name="qty">
                                        <input type="hidden" value="{{$content->rowId}}" name="rowId">
                                        <button class="button btn-update" title="Update Cart" value="update_qty" name="update_cart_action" type="submit"><span>Update Quantity</span></button>
                                        </form>
                                    </td>
                                    {{--<td class="item-qty">
                                        <div class="cart-quantity">
                                            <div class="product-qty">
                                                <div class="cart-quantity">
                                                        <div class="cart-plus-minus">
                                                            <div class="custom pull-left">
                                                                <button onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 0 ) result.value--;return false;" class="reduced items-count" type="button"><i class="fa fa-minus">&nbsp;</i></button>
                                                                <input style="text-align: center" type="text" class="input-text qty" title="Qty" value="{{$content->qty}}" maxlength="12" id="qty" name="qty">
                                                                <input type="hidden" value="{{$content->rowId}}" name="rowId">
                                                                <button onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty )) result.value++;return false;" class="increase items-count" type="button"><i class="fa fa-plus">&nbsp;</i></button>
                                                            </div>
                                                        </div>
                                                        <div class="pull-left">
                                                        --}}{{--<div class="dec qtybutton">-</div>
                                                        <input value="2" name="qtybutton" class="cart-plus-minus-box" type="text">
                                                        <div class="inc qtybutton">+</div>--}}{{--
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>--}}
                                    <td class="total-price"><strong>&#2547; {{$content->subtotal}}</strong></td>
                                    <td class="remove-item"><a href="{{route('delete.cart', $content->rowId)}}"><i class="fa fa-trash-o"></i></a></td>
                                </tr>
                                    @php
                                        $total += $content->subtotal;
                                    @endphp
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="cart-bottom-area">
                            <div class="row">
                                <div class="col-md-8 col-sm-7 col-xs-12">
                                    <div class="update-coupne-area">
                                        <div class="update-continue-btn text-right">
                                            <a href="{{route('jotno.customer')}}"><button style="position: relative; left: -15%" class="button btn-continue" title="Continue Shopping" type="button"><span>Continue Shopping</span></button></a>
                                            {{--@if(@Auth::user()->id != NULL)
                                            <a href="{{route('checkOut')}}"><button class="button btn-continue" title="Continue Shopping" type="button"><span>Check Out</span></button></a>
                                            @else
                                            <a href="{{route('login')}}"><button class="button btn-continue" title="Continue Shopping" type="button"><span>Check Out</span></button></a>
                                            @endif--}}
                                            {{--<button class="button btn-empty" title="Clear Cart" value="empty_cart" name="update_cart_action" type="submit"><span>Clear Cart</span></button>--}}
                                            {{--<button class="button btn-update" title="Update Cart" value="update_qty" name="update_cart_action" type="submit"><span>Update Cart</span></button>--}}
                                        </div>
                                        {{--<div class="coupn-area">
                                            <div class="discount">
                                                <h3>Discount Codes</h3>
                                                <label for="coupon_code">Enter your coupon code if you have one.</label>
                                                <input type="hidden" value="0" id="remove-coupone" name="remove">
                                                <input type="text" value="" name="coupon_code" id="coupon_code" class="input-text fullwidth">
                                                <button value="Apply Coupon" onclick="discountForm.submit(false)" class="button coupon " title="Apply Coupon" type="button"><span>Apply Coupon</span></button>
                                            </div>
                                        </div>--}}
                                        <div style="position: relative; left: 300px; background-color: #e3dede" class="cart-total-area">
                                            <div class="catagory-title cat-tit-5 text-right">
                                                <h3>Cart Totals</h3>
                                            </div>
                                            <div class="sub-shipping">
                                                <p>Subtotal <span>&#2547; {{$total}}</span></p>
                                                {{--<p>Shipping <span>$75.00</span></p>--}}
                                            </div>
                                            {{--<div class="shipping-method text-right">
                                                <div class="shipp">
                                                    <input type="radio" name="ship" id="pay-toggle1">
                                                    <label for="pay-toggle1">Flat Rate</label>
                                                </div>
                                                <div class="shipp">
                                                    <input type="radio" name="ship" id="pay-toggle3">
                                                    <label for="pay-toggle3">Direct Bank Transfer</label>
                                                </div>
                                                <p><a href="#">Calculate Shipping</a></p>
                                            </div>--}}
                                            <div class="process-cart-total">
                                                <p>Grand Total <span>&#2547; {{$total}}</span></p>
                                            </div>
                                            <div class="process-checkout-btn text-right">
                                                @if(@Auth::user()->id != NULL && Session::get('shipping_id') == NULL)
                                                <a href="{{route('checkOut')}}"><button class="button btn-proceed-checkout" title="Proceed to Checkout" type="button"><span>Proceed to Checkout</span></button></a>
                                                @elseif(@Auth::user()->id != NULL && Session::get('shipping_id') != NULL)
                                                <a href="{{route('jotno.shop.payment')}}"><button class="button btn-proceed-checkout" title="Proceed to Checkout" type="button"><span>Proceed to Checkout</span></button></a>
                                                @else
                                                <a href="{{route('login')}}"><button class="button btn-proceed-checkout" title="Proceed to Checkout" type="button"><span>Proceed to Checkout</span></button></a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    {{--</form>--}}
                </div>
                <!-- cart are end-->
            </div>
            <div>
            </div>
        </div>
   {{-- </div>--}}

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

