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
                    <a href="{{route('brand.create')}}" class="btn btn-sm btn-primary">Add New</a>
                    <table class="table table-bordered data-table data-table-export table table-dark table-striped">
                        <thead>
                        <tr>
                            <th>SL#</th>
                            <th>Order ID</th>
                            <th>Status</th>
                            <th>Payment Method</th>
                            <th>Delivery Charge</th>
                            <th>Sub Total</th>
                            <th>Total</th>
                            <th>Order Proceed</th>
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
                                        <span class="badge badge-success" title="Pending">Pending</span>
                                    @else
                                        <span class="badge badge-danger" title="Approved">Approved</span>
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
                                <td>{{$order->created_at->diffForHumans()}}</td>
                                <td>{{$order->created_at}}</td>
                                <td class="d-flex justify-content-center">
                                    <div class="row">
                                        <a title="Edit" class="edit button button-box button-xs button-primary" href="{{ route('order.details',$order->id) }}"><i class="zmdi zmdi-more"></i></a>
                                        {{--@if(empty($count_brand))
                                            <form  action="{{ route('brand.delete',$brand->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button title="Delete" class="delete button button-box button-xs button-danger" onclick="return confirm('Are you confirm to delete this Category')"><i class="zmdi zmdi-delete"></i></button>
                                            </form>
                                        @endif--}}
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
                            <th>Delivery Charge</th>
                            <th>Sub Total</th>
                            <th>Total</th>
                            <th>Order Proceed</th>
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


