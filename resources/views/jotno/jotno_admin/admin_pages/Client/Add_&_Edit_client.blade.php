@extends('jotno.jotno_admin.admin_layout.custom.master')
@section('content')
    <form method="post" action="{{(@$editData)?route('client.update',$editData->id):route('client.store')}}" enctype="multipart/form-data">
        @csrf
        @include('jotno.jotno_admin.admin_layout.forms._Form_client')
        <div class="col-12 mt-10"><button class="button button-primary button-outline">{{(@$editData)?"Update":"Submit"}}</button></div>
    </form>
@endsection
