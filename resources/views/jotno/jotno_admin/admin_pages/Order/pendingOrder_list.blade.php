@extends('jotno.jotno_admin.admin_layout.custom.master')
@section('content')
    <div class="row">
        <!--Export Data Table Start-->
        <div class="col-12 mb-30">
            <div class="box">
                <div class="box-head">
                    <h3 class="title">Pending Order List</h3>
                </div>
                <div class="box-body">
                    <table class="table table-bordered data-table data-table-export table table-dark table-striped">
                        <thead>
                        <tr>
                            <th>SL#</th>
                            <th>Order ID</th>
                            <th>Status</th>
                            <th>Payment Method</th>
                            <th>Delivery Cost</th>
                            <th>Sub Total</th>
                            <th>Total</th>
                            {{--<th>Order Proceed</th>--}}
                            <th>Order Date</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr class="{{$order->id}}">
                                <td>{{ $serial++ }}</td>
                                <td>{{$order->custom_id}}</td>
                                <td>
                                    @if($order->status == 'pending')
                                        <span class="badge badge-danger" title="Pending">Pending</span>
                                    @endif
                                </td>
                                <td>
                                    {{ucfirst($order['payment']['payment_method'])}}
                                    @if($order['payment']['payment_method'] == 'Bkash')
                                        (Transaction ID: {{$order['payment']['transaction_id']}})
                                    @endif
                                </td>
                                <td>&#2547; {{$order['payment']['shipping_type']}}</td>
                                <td>&#2547; {{$order->order_total}}</td>
                                @php
                                    $finalCost =$order['payment']['shipping_type']+$order->order_total;
                                @endphp
                                <td>&#2547; {{$finalCost}}</td>
                                {{--<td>{{$order->created_at->diffForHumans()}}</td>--}}
                                <td>{{$order->created_at}}</td>
                                <td class="d-flex justify-content-center">
                                    <div class="row">
                                        <a title="Approved" class="edit button button-box button-xs button-success" href="{{ route('order.edit',$order->id) }}"><i class="zmdi zmdi-check"></i ></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>SL#</th>
                            <th>Order ID</th>
                            <th>Status</th>
                            <th>Payment Method</th>
                            <th>Delivery Cost</th>
                            <th>Sub Total</th>
                            <th>Total</th>
                            {{--<th>Order Proceed</th>--}}
                            <th>Order Date</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        <!--Export Data Table End-->
    </div>
@endsection


