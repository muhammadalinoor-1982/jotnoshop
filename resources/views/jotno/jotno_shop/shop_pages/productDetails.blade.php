@extends('jotno.jotno_shop.shop_layout.main_frame.master')
@section('content')
<!-- Start Body Content -->
<!-- Main Container -->
<section class="main-container col1-layout">
    <div class="container">
        <div class="row">
            <div class="product-view">
                <div class="product-essential">
                    <form action="{{route('insert.cart')}}" method="post" id="product_addtocart_form" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$productDetails->id}}">
                        <div class="product-img-box col-lg-4 col-sm-5 col-xs-12"><br>
                            <div class="product-image">
                                <div class="product-full">
                                    <div class="new-label new-top-left"> New </div>
                                    <img id="product-zoom" src="{{asset('public/jotno_admin/assets/images/product/'.$productDetails->image)}}" data-zoom-image="{{asset('public/jotno_admin/assets/images/product/'.$productDetails->image)}}" alt="product-image"/> </div>
                                <div class="more-views">
                                    <div class="slider-items-products">
                                        <div id="jtv-more-views-img" class="product-flexslider hidden-buttons product-img-thumb">
                                            <div class="slider-items slider-width-col4 block-content">
                                                @foreach($relatedImage as $img)
                                                <div class="more-views-items"> <a href="#" data-image="{{asset('public/jotno_admin/assets/images/productRelated/'.$img->related_image)}}" data-zoom-image="{{asset('public/jotno_admin/assets/images/productRelated/'.$img->related_image)}}"> <img id="product-zoom"  src="{{asset('public/jotno_admin/assets/images/productRelated/'.$img->related_image)}}" alt="product-image"/> </a></div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end: more-images -->
                        </div>
                        <div class="product-shop col-lg-8 col-sm-7 col-xs-12">
                            <div class="product-name">
                                <h1>{{$productDetails->name}}</h1>
                            </div>
                            {{--<div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>--}}
                            <div class="price-block">
                                <div class="price-box">
                                    <p class="special-price"> <span class="price-label">Special Price</span><span class="price"> &#2547; {{(!empty($productDetails->disc_price))?$productDetails->disc_price:$productDetails->price}} </span></p>
                                    @if(!empty($productDetails->disc_price))
                                    <p class="old-price"> <span class="price-label">Regular Price:</span><span class="price"> &#2547; {{($productDetails->price)}} </span></p>
                                    @endif
                                    <p class="availability in-stock">
                                        @if($productDetails->quantity > 0)
                                            <span>In Stock</span>
                                        @else
                                            <span style="background-color: red">out of Stock</span>
                                        @endif
                                    </p>
                                </div>
                            </div>
                            <div class="short-description">

                                    {{--<div class="input-box">
                                        <label>Size</label>
                                        <select class="selectpicker select-custom" name="size_id">
                                            <option value="">Select Size</option>
                                            @foreach($productSize as $size)
                                            <option value="{{$size->size_id}}">{{$size['size']['name']}}</option>
                                            @endforeach
                                        </select>
                                    <strong style="color: red">{{($errors->has('size_id'))?($errors->first('size_id')):''}}</strong>
                                    </div>--}}

                                    {{--<div class="input-box">
                                        <label>Color</label>
                                        <select class="selectpicker select-custom" name="color_id">
                                            <option value="">Select Color</option>
                                            @foreach($productColor as $color)
                                                <option value="{{$color->color_id}}">{{$color['color']['name']}}</option>
                                            @endforeach
                                        </select>
                                    <strong style="color: red">{{($errors->has('color_id'))?($errors->first('color_id')):''}}</strong>
                                    </div>--}}

                                    <div class="input-box">
                                        <label>Weight</label>
                                        <select class="selectpicker select-custom" name="weight_id">
                                            {{--<option value="">Select Weight</option>--}}
                                            @foreach($productWeight as $weight)
                                                <option value="{{$weight->weight_id}}">{{$weight['weight']['name']}}</option>
                                            @endforeach
                                        </select>
                                        <strong style="color: red">{{($errors->has('weight_id'))?($errors->first('weight_id')):''}}</strong>
                                    </div>
                                <br>
                                <h2>Description</h2>
                                <p>{!! $productDetails->description !!}</p>
                            </div>
                            <div class="add-to-box">
                                <div class="add-to-cart">
                                    <div class="pull-left">
                                        <div class="custom pull-left">
                                            <label>Quantity:</label>
                                            <button onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 0 ) result.value--;return false;" class="reduced items-count" type="button"><i class="fa fa-minus">&nbsp;</i></button>
                                            <input type="text" class="input-text qty" title="Qty" value="1" maxlength="12" id="qty" name="qty">
                                            <button onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty )) result.value++;return false;" class="increase items-count" type="button"><i class="fa fa-plus">&nbsp;</i></button>
                                        </div>
                                    </div>
                                    <button onClick="productAddToCartForm.submit(this)" class="button btn-cart" title="Add to Cart" type="submit"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="product-collateral col-lg-12 col-sm-12 col-xs-12">
                <ul id="product-detail-tab" class="nav nav-tabs product-tabs">
                    <li class="active"> <a href="#product_tabs_description" data-toggle="tab"> Overview </a></li>
                    <li><a href="#product_tabs_custom" data-toggle="tab">Description</a></li>
                    {{--<li><a href="#reviews_tabs" data-toggle="tab">Reviews</a></li>
                    <li><a href="#product_tabs_tags" data-toggle="tab">Tags</a></li>--}}
                </ul>
                <div id="productTabContent" class="tab-content">
                    <div class="tab-pane fade in active" id="product_tabs_description">
                        <div class="std">
                            <p>{!! $productDetails->overview !!}</p>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="product_tabs_custom">
                        <div class="product-tabs-content-inner clearfix">
                            <p>{!! $productDetails->description !!}</p>
                        </div>
                    </div>
                    {{--<div class="tab-pane fade" id="reviews_tabs">
                        <div class="box-collateral box-reviews" id="customer-reviews">
                            <div class="box-reviews1">
                                <div class="form-add">
                                    <form id="review-form" method="post" action="http://www.jtvcommerce.com/review/product/post/id/176/">
                                        <h3>Write Your Own Review</h3>
                                        <fieldset>
                                            <h4>How do you rate this product? <em class="required">*</em></h4>
                                            <span id="input-message-box"></span>
                                            <table id="product-review-table" class="data-table">
                                                <thead>
                                                <tr class="first last">
                                                    <th>&nbsp;</th>
                                                    <th><span class="nobr">1 *</span></th>
                                                    <th><span class="nobr">2 *</span></th>
                                                    <th><span class="nobr">3 *</span></th>
                                                    <th><span class="nobr">4 *</span></th>
                                                    <th><span class="nobr">5 *</span></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr class="first odd">
                                                    <th>Price</th>
                                                    <td class="value"><input type="radio" class="radio" value="11" id="Price_1" name="ratings[3]"></td>
                                                    <td class="value"><input type="radio" class="radio" value="12" id="Price_2" name="ratings[3]"></td>
                                                    <td class="value"><input type="radio" class="radio" value="13" id="Price_3" name="ratings[3]"></td>
                                                    <td class="value"><input type="radio" class="radio" value="14" id="Price_4" name="ratings[3]"></td>
                                                    <td class="value last"><input type="radio" class="radio" value="15" id="Price_5" name="ratings[3]"></td>
                                                </tr>
                                                <tr class="even">
                                                    <th>Value</th>
                                                    <td class="value"><input type="radio" class="radio" value="6" id="Value_1" name="ratings[2]"></td>
                                                    <td class="value"><input type="radio" class="radio" value="7" id="Value_2" name="ratings[2]"></td>
                                                    <td class="value"><input type="radio" class="radio" value="8" id="Value_3" name="ratings[2]"></td>
                                                    <td class="value"><input type="radio" class="radio" value="9" id="Value_4" name="ratings[2]"></td>
                                                    <td class="value last"><input type="radio" class="radio" value="10" id="Value_5" name="ratings[2]"></td>
                                                </tr>
                                                <tr class="last odd">
                                                    <th>Quality</th>
                                                    <td class="value"><input type="radio" class="radio" value="1" id="Quality_1" name="ratings[1]"></td>
                                                    <td class="value"><input type="radio" class="radio" value="2" id="Quality_2" name="ratings[1]"></td>
                                                    <td class="value"><input type="radio" class="radio" value="3" id="Quality_3" name="ratings[1]"></td>
                                                    <td class="value"><input type="radio" class="radio" value="4" id="Quality_4" name="ratings[1]"></td>
                                                    <td class="value last"><input type="radio" class="radio" value="5" id="Quality_5" name="ratings[1]"></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            <input type="hidden" value="" class="validate-rating" name="validate_rating">
                                            <div class="review1">
                                                <ul class="form-list">
                                                    <li>
                                                        <label class="required" for="nickname_field">Nickname<em>*</em></label>
                                                        <div class="input-box">
                                                            <input type="text" class="input-text" id="nickname_field" name="nickname">
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <label class="required" for="summary_field">Summary<em>*</em></label>
                                                        <div class="input-box">
                                                            <input type="text" class="input-text" id="summary_field" name="title">
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="review2">
                                                <ul>
                                                    <li>
                                                        <label class="required " for="review_field">Review<em>*</em></label>
                                                        <div class="input-box">
                                                            <textarea rows="3" cols="5" id="review_field" name="detail"></textarea>
                                                        </div>
                                                    </li>
                                                </ul>
                                                <div class="buttons-set">
                                                    <button class="button submit" title="Submit Review" type="submit"><span>Submit Review</span></button>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                            <div class="box-reviews2">
                                <h3>Customer Reviews</h3>
                                <div class="box visible">
                                    <ul>
                                        <li>
                                            <table class="ratings-table">
                                                <tbody>
                                                <tr>
                                                    <th>Value</th>
                                                    <td><div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div></td>
                                                </tr>
                                                <tr>
                                                    <th>Quality</th>
                                                    <td><div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div></td>
                                                </tr>
                                                <tr>
                                                    <th>Price</th>
                                                    <td><div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            <div class="review">
                                                <h6><a href="#">Lorem ipsum dolor sit amet</a></h6>
                                                <small>Review by <span>Sophia </span>on 15/01/2018 </small>
                                                <div class="review-txt">Pellentesque aliquet, sem eget laoreet ultrices, ipsum metus feugiat sem, quis fermentum turpis eros eget velit. Donec ac tempus ante.</div>
                                            </div>
                                        </li>
                                        <li class="even">
                                            <table class="ratings-table">
                                                <tbody>
                                                <tr>
                                                    <th>Value</th>
                                                    <td><div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div></td>
                                                </tr>
                                                <tr>
                                                    <th>Quality</th>
                                                    <td><div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div></td>
                                                </tr>
                                                <tr>
                                                    <th>Price</th>
                                                    <td><div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            <div class="review">
                                                <h6><a href="#">Lorem ipsum dolor sit amet</a></h6>
                                                <small>Review by <span>William</span>on 05/02/2018 </small>
                                                <div class="review-txt">Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla. Donec a neque libero.</div>
                                            </div>
                                        </li>
                                        <li>
                                            <table class="ratings-table">
                                                <tbody>
                                                <tr>
                                                    <th>Value</th>
                                                    <td><div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div></td>
                                                </tr>
                                                <tr>
                                                    <th>Quality</th>
                                                    <td><div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div></td>
                                                </tr>
                                                <tr>
                                                    <th>Price</th>
                                                    <td><div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            <div class="review">
                                                <h6><a href="#">Lorem ipsum dolor sit amet</a></h6>
                                                <small>Review by <span> Mason</span>on 10/02/2018 </small>
                                                <div class="review-txt last">Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper.</div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="actions"> <a class="button view-all" id="revies-button" href="#"><span><span>View all</span></span></a> </div>
                            </div>
                        </div>
                    </div>--}}
                    {{--<div class="tab-pane fade" id="product_tabs_tags">
                        <div class="box-collateral box-tags">
                            <div class="tags">
                                <form id="addTagForm" action="#" method="get">
                                    <div class="form-add-tags">
                                        <label for="productTagName">Add Tags:</label>
                                        <div class="input-box">
                                            <input class="input-text" name="productTagName" id="productTagName" type="text">
                                            <button type="button" title="Add Tags" class=" button btn-add" onClick="submitTagForm()"> <span>Add Tags</span></button>
                                        </div>
                                        <!--input-box-->
                                    </div>
                                </form>
                            </div>
                            <!--tags-->
                            <p class="note">Use spaces to separate tags. Use single quotes (') for phrases.</p>
                        </div>
                    </div>--}}

                </div>
            </div>
        </div>
    </div>
</section>
<!-- Main Container End -->

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
