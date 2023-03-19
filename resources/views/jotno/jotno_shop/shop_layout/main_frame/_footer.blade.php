<footer style="background-color: #2b542c">
    @php
        $clients = App\client::all();
        $contacts = App\contact::first();
        $categories = App\product::select('category_id')->groupBy('category_id')->orderBy('id','desc')->get();
    @endphp
    <div style="background-color: #2b542c" class="footer-inner">
        {{--<div style="background-color: #1cb410" class="news-letter">
            <div class="container">
                <div class="heading text-center">
                    <h2 style="color: white">Just Subscribe Now!</h2>
                    <span style="color: white" >Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec faucibus maximus vehicula. Sed feugiat, tellus vel tristique posuere.</span> </div>
                <form>
                    <input type="email" placeholder="Enter your email address" required>
                    <button type="submit">Send me</button>
                </form>
            </div>
        </div>--}}
        <br>
        <div style="background-color: #2b542c" class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <h4>About</h4>
                    <div class="contacts-info">
                        <p>{!! $contacts->about !!}</p>
                        <div class="phone-footer"><i class="fa fa-location-arrow"></i>{{$contacts->location}}</div>
                        <div class="phone-footer"><i class="fa fa-phone"></i>{{$contacts->phone}}</div>
                        <div class="phone-footer"><i class="fa fa-phone"></i>{{$contacts->alt_phone}}</div>
                        <div class="email-footer"><i class="fa fa-envelope"></i> <a href="mailto:support@example.com">{{$contacts->email}}</a> </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-2 col-sm-6 col-xs-12">
                    <h4>Helpful Links</h4>
                    <ul class="links">
                        <li><a href="#">Products</a></li>
                        <li><a href="#">Find a Store</a></li>
                        <li><a href="#">Features</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="blog.html">Blog</a></li>
                        <li><a href="sitemap.html">Site Map</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-2 col-sm-6 col-xs-12">
                    <h4>Shop</h4>
                    <ul class="links">
                        @foreach($categories as $category)
                        <li><a href="{{route('jotno.cat_product',$category->category_id)}}">{{$category->category_id}}</a></li>
                        @endforeach
                        {{--<li><a href="faq.html">FAQs</a></li>
                        <li><a href="#">Shipping Methods</a></li>
                        <li><a href="contact.html">Contact</a></li>
                        <li><a href="#">Support</a></li>
                        <li><a href="#">Retailer</a></li>--}}
                    </ul>
                </div>
                <div class="col-xs-12 col-lg-3 col-md-4 col-sm-6">
                    <div class="social">
                        <h4>Follow Us</h4>
                        <ul>
                            <li><a href="{{$contacts->link_1}}" target="_blank"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="{{$contacts->link_2}}" target="_blank"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="{{$contacts->link_3}}" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="{{$contacts->link_4}}" target="_blank"><i class="fa fa-youtube"></i></a></li>
                            <li><a href="{{$contacts->link_5}}" target="_blank"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="background-color: #2b542c" class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-xs-12 coppyright text-center">© 2023 Jotnoshop, All rights reserved.</div>
            </div>
        </div>
    </div>
</footer>
