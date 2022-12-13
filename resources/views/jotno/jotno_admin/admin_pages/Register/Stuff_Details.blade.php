@extends('jotno.jotno_admin.admin_layout.custom.master')
@section('content')
    <div class="row mbn-30">
        <!--Order Details Head Start-->
        <div class="col-12 mb-30">
            <a title="Back to Mail Menu" class="edit button button-box button-xs button-info" href="{{ route('Register.stuff.view')}}"><i class="zmdi zmdi-mail-reply-all"></i></a>
            <div class="row mbn-180">
                <div class="box-head">
                    <h3 class="title" style="position: relative; left: 500px; text-transform: uppercase;">Details of {{ $editData->name }}</h3>
                </div>
                <img src="{{(@$editData->image)?url('public/jotno_admin/assets/images/user_images/'.$editData->image):url('public/jotno_admin/assets/images/user_images/noimage.jpg')}}"  alt="" style="position: relative; right: -700px; vertical-align: middle; width: 300px; height: 300px; border-radius: 300%;">

            </div>
        </div>
        <!--Order Details Head End-->
        @if($editData->status == 'active')
            <span style="position: relative; right: -300px; top: -275px;" class="badge badge-round badge-success">Active</span><br>
        @else
            <span style="position: relative; right: -300px; top: -275px;" class="badge badge-round badge-danger">Inactive</span><br>
        @endif
    <!--Order Details Customer Information Start-->
        <div style="position: relative; top: -300px;" class="col-12 mb-30">
            <div class="order-details-customer-info row mbn-20">
                <!--Billing Info Start-->
                <div style="color: #0bb7ff" class="col-lg-4 col-md-6 col-12 mb-20">
                    <h4>{{ $editData->name }}</h4>
                    <span>User Type : </span> <span style="color: yellow"><strong>{{ ucfirst($editData->role) }}</strong> </span><br>
                    <span>ID : </span> <span>{{ $editData->custom_id }}</span><br>
                    <span>Email : </span> <span>{{ $editData->email }}</span><br>
                    <span>Mobile : </span> <span>{{ $editData->mobile }}</span><br>
                    <span>Nationality : </span> <span>{{ $editData->nationality }}</span><br>
                    <span>Country : </span> <span>{{ $editData->country }}</span><br>
                    <span>NID : </span> <span>{{ $editData->nid }}</span><br>
                    <span>Gender : </span> <span>{{ $editData->gender }}</span><br>
                    <span>Updater : </span> <span>{{(@$editData->updater)?$editData->updater:"" }}</span>
                </div>
                <!--Billing Info End-->
            </div>
        </div>
        <!--Order Details Customer Information Start-->

        {{--<!--Order Details List Start-->
        <div class="col-12 mb-30">
            <div class="table-responsive">
                <table class="table table-bordered table-vertical-middle">
                    <thead>
                    <tr>
                        <th>Product ID</th>
                        <th>Quantity</th>
                        <th>Regular Prise</th>
                        <th>Special Prise</th>
                        <th>Discount Prise</th>
                        <th>Bulk Prise</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>--}}{{--{{ $editData->id }}--}}{{--</td>
                        <td>--}}{{--{{ $editData->quantity }}--}}{{--</td>
                        <td>--}}{{--{{ $editData->regular_prise }}--}}{{--</td>
                        <td>--}}{{--{{ $editData->special_prise }}--}}{{--</td>
                        <td>--}}{{--{{ $editData->discount_prise }}--}}{{--</td>
                        <td>--}}{{--{{ $editData->bulk_prise }}--}}{{--</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!--Order Details List End-->--}}

    </div>
    <h4 style="color: #0bb7ff; position: relative; right: -980px; top: -300px;">{{ $editData->name }}</h4>
@endsection
