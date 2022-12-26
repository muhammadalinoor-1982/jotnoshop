@extends('jotno.jotno_admin.admin_layout.custom.master')
@section('content')
    <form method="post" action="{{(@$editData)?route('category.update',$editData->id):route('category.store')}}" enctype="multipart/form-data">
        @csrf
        @include('jotno.jotno_admin.admin_layout.forms._Form_category')
        <div class="col-12 mt-10"><button class="button button-primary button-outline">{{(@$editData)?"Update":"Submit"}}</button></div>
    </form>
@endsection
