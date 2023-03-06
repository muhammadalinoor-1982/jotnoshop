@extends('jotno.jotno_admin.admin_layout.custom.master')
@section('content')
    <!-- Content Body Start -->
    <!-- Page Headings Start -->
    <div class="row justify-content-between align-items-center mb-10">

        <!-- Page Heading Start -->
        <div class="col-12 col-lg-auto mb-20">
            <div class="page-heading">
                <h3><a title="Back to Approved Order" class="edit button button-box button-xs button-info" href="{{ route('approved.order')}}"><i class="zmdi zmdi-mail-reply-all"></i></a></h3>
            </div>
        </div><!-- Page Heading End -->

    </div><!-- Page Headings End -->

        <div class="row mbn-30">
            <!--Order Details Head Start-->
            <div class="col-12 mb-30">
                <div class="row mbn-15">
                    <div class="col-12 col-md-4 mb-15">
                        <h4 class="text-primary fw-600 m-0">Order ID: {{$order->custom_id}}</h4>
                    </div>
                    @if($order->status == 'pending')
                    <div class="text-left text-md-center col-12 col-md-4 mb-15"><span>Status: <span class="badge badge-round badge-success">Pending</span></span></div>
                    @else
                    <div class="text-left text-md-center col-12 col-md-4 mb-15"><span>Status: <span class="badge badge-round badge-success">Approved</span></span></div>
                    @endif
                </div>
            </div>
            <!--Order Details Head End-->

            <!--Order Details Customer Information Start-->
            <div class="col-12 mb-30">
                <div class="order-details-customer-info row mbn-20">

                    <!--Billing Info Start-->
                    <div class="col-lg-6 col-md-6 col-12 mb-20">
                        <h4 class="mb-25">Billing Info</h4>
                        <ul>
                            <li> <span>Name</span> <span>{{$order['shipping']['name']}}</span> </li>
                            <li> <span>Address</span> <span>{{$order['shipping']['address']}}</span> </li>
                            <li> <span>Email</span> <span>{{$order['shipping']['email']}}</span> </li>
                            <li> <span>Phone</span> <span>{{$order['shipping']['phone']}}</span> </li>
                        </ul>
                    </div>
                    <!--Billing Info End-->

                    <!--Shipping Info Start-->
                    <div class="col-lg-6 col-md-6 col-12 mb-20">
                        <h4 class="mb-25">Order & Delivery</h4>
                        <ul>
                            <li> <span>Order ID</span> <span>{{$order->custom_id}}</span> </li>
                            <li> <span>Order Proceed</span> <span>{{$order->created_at->diffForHumans()}}</span> </li>
                            <li> <span>Order Date</span> <span>{{$order->created_at}}</span> </li>
                            <li> <span>Delivery Type</span>
                                <span>{{$order['payment']['payment_method']}}
                                    @if($order['payment']['payment_method'] == 'Bkash')
                                        (Transaction ID: {{$order['payment']['transaction_id']}})
                                    @endif
                                </span> </li>
                            <li> <span>Delivery Charge</span> <span>&#2547; {{$order['payment']['shipping_type']}}</span> </li>
                            <li> <span>Total</span> <span>&#2547; {{$order->order_total}}</span> </li>
                            @php
                                $finalCost = $order['payment']['shipping_type']+$order->order_total;
                            @endphp
                            <li> <span class="h5 fw-600">Grand Total</span> <span class="h5 fw-600 text-success">&#2547; {{$finalCost}}</span> </li>
                        </ul>
                    </div>
                    <!--Shipping Info End-->

                    {{--<!--Purchase Info Start-->
                    <div class="col-lg-4 col-md-6 col-12 mb-20">
                        <h4 class="mb-25">Purchase Info</h4>
                        <ul>
                            <li> <span>Items</span> <span>03</span> </li>
                            <li> <span>Price</span> <span>$5400.00</span> </li>
                            <li> <span>Shipping</span> <span>$50.00</span> </li>
                            <li> <span>Discount</span> <span>$40.00</span> </li>
                            <li> <span>Total</span> <span>$5410.00</span> </li>
                            <li> <span class="h5 fw-600">Type</span> <span class="h5 fw-600 text-success">Paid</span> </li>
                        </ul>
                    </div>
                    <!--Purchase Info End-->--}}

                </div>
            </div>
            <!--Order Details Customer Information Start-->

            <!--Order Details List Start-->
            <div class="col-12 mb-30">
                <div class="table-responsive">
                    <table class="table table-bordered table-vertical-middle table table-dark table-striped">
                        <thead>
                        <tr>
                            <th style="width: 10%">Name</th>
                            <th style="width: 10%">Photo</th>
                            <th style="width: 10%">Weight</th>
                            <th style="width: 10%">Quentity</th>
                            <th style="width: 10%">Price</th>
                            <th style="width: 10%">Sub Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($order['orderDetails'] as $details)
                        <tr>
                            <td>{{$details['product']['name']}}</td>
                            <td><img src="{{url('public/jotno_admin/assets/images/product/'.$details['product']['image'])}}" alt="" class="product-image rounded-circle" style="width: 10%"></td>
                            <td>{{$details['weight']['name']}}</td>
                            <td>{{$details->quantity}}</td>
                            <td>&#2547; {{(!empty($details['product']['disc_price']))?$details['product']['disc_price']:$details['product']['price']}}</td>
                            @php
                                $subTotal = ((!empty($details['product']['disc_price']))?$details['product']['disc_price']:$details['product']['price']) * $details->quantity;
                            @endphp
                            <td>&#2547; {{$subTotal}}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!--Order Details List End-->

        </div>
@endsection



