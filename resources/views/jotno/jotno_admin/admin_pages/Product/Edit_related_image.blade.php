@extends('jotno.jotno_admin.admin_layout.custom.master')
@section('content')
    <form method="post" action="{{route('product.related_img.update',$editData->id)}}" enctype="multipart/form-data">
        @csrf
        @include('jotno.jotno_admin.admin_layout.forms._Form_related_image')
        <div class="col-12 mt-10"><button class="button button-primary button-outline">Update</button></div>
    </form>
@endsection
