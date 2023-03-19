<div class="row">

    <!--Form Size Start-->
    <div class="col-12 mb-30">
        <div class="box">
            <div class="box-head">
                <h3 class="title">
                    @if(@$editData)
                        Update Client
                    @else
                        Add New Client
                    @endif
                </h3>
            </div>
            <div class="box-body">
                <div class="row mbn-20">
                    <!--Small Field-2-->
                    <div class="col-lg-4 col-12 mb-20">
                        <div class="row mbn-15">
                            <div class="col-12 mb-15"><span style="color: #a71d2a">*</span><input type="text" name="name" value="{{@$editData->name}}" class="form-control form-control-sm @error('name') is-invalid @enderror" placeholder="Client Name" ></div>
                            @error('name')
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
                                <img src="{{(@$editData->image)?url('public/jotno_admin/assets/images/client/'.@$editData->image):url('public/jotno_admin/assets/images/client/noimage.jpg')}}"  alt="" class="product-image rounded-circle">
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


