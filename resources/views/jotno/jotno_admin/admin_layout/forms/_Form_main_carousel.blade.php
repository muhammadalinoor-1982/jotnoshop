<div class="row">

    <!--Form Size Start-->
    <div class="col-12 mb-30">
        <div class="box">
            <div class="box-head">
                <h3 class="title">
                    @if(@$editData)
                        Update Carousel
                    @else
                        Add New Carousel
                    @endif
                </h3>
            </div>
            <div class="box-body">
                <div class="row mbn-20">
                    <!--Small Field-2-->
                    <div class="col-lg-4 col-12 mb-20">
                        <div class="row mbn-15">
                            <div class="col-12 mb-15"><span style="color: #a71d2a">*</span><input type="text" name="name" value="{{@$editData->name}}" class="form-control form-control-sm @error('name') is-invalid @enderror" placeholder="Brand Name" ></div>
                            @error('name')
                            <div class=" text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <!--Small Field-->

                    <!--Small Field-2-->
                    <div class="col-lg-4 col-12 mb-20">
                        <div class="row mbn-15">
                            <div class="col-12 mb-15"><input type="text" name="tag" value="{{@$editData->tag}}" class="form-control form-control-sm @error('tag') is-invalid @enderror" placeholder="Insert Tag" ></div>
                            @error('tag')
                            <div class=" text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <!--Small Field-->

                    <!--Small Field-2-->
                    <div class="col-lg-4 col-12 mb-20">
                        <div class="row mbn-15">
                            <div class="col-12 mb-15"><input type="text" name="heading" value="{{@$editData->heading}}" class="form-control form-control-sm @error('heading') is-invalid @enderror" placeholder="Insert Head" ></div>
                            @error('heading')
                            <div class=" text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <!--Small Field-->

                    <!--Small Field-2-->
                    <div class="col-lg-4 col-12 mb-20">
                        <div class="row mbn-15">
                            <div class="col-12 mb-15"><input type="text" name="link" value="{{@$editData->link}}" class="form-control form-control-sm @error('link') is-invalid @enderror" placeholder="Insert Link" ></div>
                            @error('link')
                            <div class=" text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <!--Small Field-->

                    <!--Summernote Start-->
                    <div class="col-8 mb-30">
                        <div class="box">
                            <div class="box-body">
                                <p>Description</p>
                                <textarea name="description" class="summernote @error('description') is-invalid @enderror">{{@$editData->description}}</textarea>
                            </div>
                            @error('description')
                            <div class=" text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <!--Summernote End-->
                    <!--Small Field-6-->
                    <div class="col-lg-4 col-12 mb-20">
                        <div class="row mbn-15">
                            @php
                                if(old("event")){
                                    $event = old('event');
                                }elseif (isset($editData)){
                                    $event = $editData->event;
                                }else{
                                    $event = null;
                                }
                            @endphp
                            <h class="mb-15">User Event</h>
                            <div class="form-control form-control-sm @error('event') is-invalid @enderror"><span style="color: #a71d2a">*</span>
                                <label class="adomx-radio"><input type="radio" @if($event=='special') checked @endif name="event" value="special" id="special"> <i class="icon"></i> Special</label><br>
                                <label class="adomx-radio"><input type="radio" @if($event=='social') checked @endif name="event" value="social" id="social"> <i class="icon"></i> Social</label><br>
                                <label class="adomx-radio"><input type="radio" @if($event=='cultural') checked @endif name="event" value="cultural" id="cultural"> <i class="icon"></i> Cultural</label><br>
                                <label class="adomx-radio"><input type="radio" @if($event=='occasional') checked @endif name="event" value="occasional" id="occasional"> <i class="icon"></i> Occasional</label><br>
                                <label class="adomx-radio"><input type="radio" @if($event=='festival') checked @endif name="event" value="festival" id="festival"> <i class="icon"></i> festival</label><br>
                            </div>
                            @error('event')
                            <div class=" text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <!--Small Field-->
                    <!--Small Field-6-->
                    <div class="col-lg-4 col-12 mb-20">
                        <div class="row mbn-15">
                            @php
                                if(old("status")){
                                    $status = old('status');
                                }elseif (isset($editData)){
                                    $status = $editData->status;
                                }else{
                                    $status = null;
                                }
                            @endphp
                            <h class="mb-15">User Status</h>
                            <div class="form-control form-control-sm @error('status') is-invalid @enderror"><span style="color: #a71d2a">*</span>
                                <label class="adomx-radio"><input type="radio" @if($status=='active') checked @endif name="status" value="active" id="active"> <i class="icon"></i> Active</label><br>
                                <label class="adomx-radio"><input type="radio" @if($status=='inactive') checked @endif name="status" value="inactive" id="inactive"> <i class="icon"></i> Inactive</label><br>
                            </div>
                            @error('status')
                            <div class=" text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <!--Small Field-->
                    <!--Image Upload-->
                    <div class="col-lg-12 col-12 mb-20">
                        <div class="row mbn-15">
                            <div class="col-12 mb-15">
                                <img src="{{(@$editData->image)?url('public/jotno_admin/assets/images/mainCarousel/'.@$editData->image):url('public/jotno_admin/assets/images/mainCarousel/noimage.jpg')}}"  alt="" class="product-image rounded-circle">
                                <h6 class="mb-15">Image Upload</h6>
                                <input class="dropify @error('image') is-invalid @enderror" name="image" type="file">
                            </div>
                            @error('image')
                            <div class=" text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <p style="color: #828282">Preferable image dimension should be 500pix X 500pix.</p>
                    </div>
                    <!--Small Field-->

                </div>
            </div>
        </div>
    </div>
    <!--Form Size End-->
</div>


