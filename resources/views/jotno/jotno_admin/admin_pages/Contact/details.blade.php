@extends('jotno.jotno_admin.admin_layout.custom.master')
@section('content')

    <div class="row justify-content-between align-items-center mb-10">
        <!-- Page Headings Start -->
        <div class="row justify-content-between align-items-center mb-10">

            <!-- Page Heading Start -->
            <div class="col-12 col-lg-auto mb-20">
                <div class="page-heading">
                    <h3><a title="Back to Mail Menu" class="edit button button-box button-xs button-info" href="{{ route('contact.view')}}"><i class="zmdi zmdi-mail-reply-all"></i></a> &nbsp; Contact Details Page</h3>
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
                    <h3 class="title">Contact Details</h3>
                </div>

                <div class="box-body">

                    <div class="timeline-wrap row mbn-50">
                        <div class="col-12 mb-50">
                            <ul class="timeline-list">

                                <li>
                                    <span class="icon"><i class="zmdi zmdi-receipt"></i></span>
                                    <div class="details">
                                        <div class="content">
                                            <div class="alert alert-primary" role="alert">
                                                Brand: <a class="alert-link" href="#"> {!! ucfirst($contact->about) !!}</a>
                                            </div>
                                            <div class="alert alert-primary" role="alert">
                                                Brand: <a class="alert-link" href="#"> {{$contact->location}}</a>
                                            </div>
                                            <div class="alert alert-primary" role="alert">
                                                Quantity: <a class="alert-link" href="#"> {{$contact->phone}}</a>
                                            </div>
                                            <div class="alert alert-primary" role="alert">
                                                Price:  <a class="alert-link" href="#"> {{$contact->alt_phone}}</a>
                                            </div>
                                            <div class="alert alert-primary" role="alert">
                                                Discount Price: <a class="alert-link" href="#"> {{$contact->email}}</a>
                                            </div>
                                            <div class="alert alert-primary" role="alert">
                                                Facebook: <a class="alert-link" href="#"> {{$contact->link_1}}</a>
                                            </div>
                                            <div class="alert alert-primary" role="alert">
                                                Instagram: <a class="alert-link" href="#"> {{$contact->link_2}}</a>
                                            </div>
                                            <div class="alert alert-primary" role="alert">
                                                Twitter: <a class="alert-link" href="#"> {{$contact->link_3}}</a>
                                            </div>
                                            <div class="alert alert-primary" role="alert">
                                                LinkedIn: <a class="alert-link" href="#"> {{$contact->link_4}}</a>
                                            </div>
                                            <div class="alert alert-primary" role="alert">
                                                YouTube: <a class="alert-link" href="#"> {{$contact->link_5}}</a>
                                            </div>
                                            <div class="alert alert-primary" role="alert">
                                                Creator: <a class="alert-link" href="#"> {{$contact->creator}}</a>
                                            </div>
                                            @if($contact->updater)
                                                <div class="alert alert-primary" role="alert">
                                                    Updater: <a class="alert-link" href="#"> {{$contact->updater}}</a>
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



