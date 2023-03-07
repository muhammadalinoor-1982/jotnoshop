@extends('jotno.jotno_admin.admin_layout.custom.master')
@section('content')
    <form method="post" action="{{(@$editData)?route('order.update',$editData->id):route('order.store')}}" enctype="multipart/form-data">
        @csrf
        @include('jotno.jotno_admin.admin_layout.forms._Form_order')
        <div class="col-12 mt-10"><button class="button button-primary button-outline">{{(@$editData)?"Approved":"Submit"}}</button></div>
    </form>
@endsection
