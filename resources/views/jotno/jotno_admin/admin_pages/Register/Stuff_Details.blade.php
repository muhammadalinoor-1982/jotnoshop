@extends('jotno.jotno_admin.admin_layout.custom.master')
@section('content')

    <div class="row justify-content-between align-items-center mb-10">
        <!-- Page Headings Start -->
        <div class="row justify-content-between align-items-center mb-10">

            <!-- Page Heading Start -->
            <div class="col-12 col-lg-auto mb-20">
                <div class="page-heading">
                    <h3><a title="Back to Mail Menu" class="edit button button-box button-xs button-info" href="{{ route('Register.stuff.view')}}"><i class="zmdi zmdi-mail-reply-all"></i></a> &nbsp; Stuff Details Page</h3>
                </div>
            </div><!-- Page Heading End -->

        </div>
        <!-- Page Headings End -->
    </div>

    <div class="row mbn-50">
        <!--Timeline / Activities Start-->
        <div class="col-xlg-12 col-12 mb-50">
            <div class="box">

                <div class="box-head">
                    <h3 class="title">Details of {{$editData->name}}</h3>
                </div>

                <div class="box-body">

                    <div class="timeline-wrap row mbn-50">
                        <div class="col-12 mb-50">
                            <ul class="timeline-list">
                                <li>
                                    <span class="icon"><i class="zmdi zmdi-receipt"></i></span>
                                    <div class="details">
                                        <h5 class="title"><a href="{{ route('Register.stuff.view')}}">{{$editData->name}}</a></h5>
                                        <div class="gallery">
                                            <div class="row mbn-30">
                                                <div class="col-md-4 col-sm-6 col-12 mb-30"><a href="#"><img src="{{(@$editData->image)?url('public/jotno_admin/assets/images/user_images/'.$editData->image):url('public/jotno_admin/assets/images/user_images/noimage.jpg')}}" alt=""></a></div>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <span class="icon"><i class="zmdi zmdi-receipt"></i></span>
                                    <div class="details">
                                        <h5 class="title"><a href="{{ route('Register.stuff.view')}}">{{$editData->name}} Details</a></h5>
                                        <div class="content">
                                            @if($editData->status == 'active')
                                                <div class="alert alert-success" role="alert">
                                                    Status: <a class="alert-link" href="#"> Active</a>
                                                </div>
                                            @else
                                                <div class="alert alert-danger" role="alert">
                                                    Status: <a class="alert-link" href="#"> Inactive</a>
                                                </div>
                                            @endif
                                            <div class="alert alert-warning" role="alert">
                                                Role: <a class="alert-link" href="#"> {{ucfirst($editData->role)}}</a>
                                            </div>
                                            <div class="alert alert-primary" role="alert">
                                                ID: <a class="alert-link" href="#"> {{$editData->custom_id}}</a>
                                            </div>
                                            <div class="alert alert-primary" role="alert">
                                                Email: <a class="alert-link" href="#"> {{$editData->email}}</a>
                                            </div>
                                            <div class="alert alert-primary" role="alert">
                                                Mobile:  <a class="alert-link" href="#"> {{$editData->mobile}}</a>
                                            </div>
                                            <div class="alert alert-primary" role="alert">
                                                Nationality: <a class="alert-link" href="#"> {{$editData->nationality}}</a>
                                            </div>
                                            <div class="alert alert-primary" role="alert">
                                                Country: <a class="alert-link" href="#"> {{$editData->country}}</a>
                                            </div>
                                            <div class="alert alert-primary" role="alert">
                                                NID: <a class="alert-link" href="#"> {{$editData->nid}}</a>
                                            </div>
                                            <div class="alert alert-primary" role="alert">
                                                Gender: <a class="alert-link" href="#"> {{$editData->gender}}</a>
                                            </div>
                                            @if($editData->updater)
                                                <div class="alert alert-primary" role="alert">
                                                    Updater: <a class="alert-link" href="#"> {{$editData->updater}}</a>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </li>

                            </ul>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        <!--Timeline / Activities End-->
    </div>

@endsection



