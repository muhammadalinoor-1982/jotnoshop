<div class="row">

    <!--Form Size Start-->
    <div class="col-12 mb-30">
        <div class="box">
            <div class="box-head">
                <h3 class="title">
                    @if(@$editData)
                        Update Category
                    @else
                        Add New Category
                    @endif
                </h3>
            </div>
            <div class="box-body">
                <div class="row mbn-20">
                    <!--Small Field-2-->
                    <div class="col-lg-4 col-12 mb-20">
                        <div class="row mbn-15">
                            <div class="col-12 mb-15"><span style="color: #a71d2a">*</span><input type="text" name="name" value="{{@$editData->name}}" class="form-control form-control-sm @error('name') is-invalid @enderror" placeholder="Category Name" ></div>
                            @error('name')
                            <div class=" text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <!--Small Field-->

                    <!--Single Select-->
                    <div class="col-lg-4 col-12 mb-30">
                        <h5 class="sub-title">Parent Category</h5>
                        <select class="form-control select2" name="parent">
                            <optgroup label="Please Select">
                                <option>Select Parent</option>
                                @foreach($categories as $category)
                                    <option value="{{($category->name)}}" {{(@$editData->parent == $category->id)?"selected":""}}>{{$category->name}}</option>
                                @endforeach
                            </optgroup>
                        </select>
                        @error('parent')
                        <div class=" text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <!--Single Select-->

                    <!--Single Select-->
                    {{--<div class="col-lg-4 col-12 mb-30">
                        <h5 class="sub-title">Single Select</h5>
                        <select class="form-control select2">
                            <optgroup label="Options One">
                                <option>One</option>
                                <option>Two</option>
                                <option>Three</option>
                            </optgroup>
                            <optgroup label="Options Two">
                                <option>Four</option>
                                <option>Five</option>
                                <option>Six</option>
                            </optgroup>
                            <optgroup label="Options Three">
                                <option>Seven</option>
                                <option>Eight</option>
                                <option>Nine</option>
                            </optgroup>
                        </select>
                    </div>--}}
                    <!--Single Select-->

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
                                <img src="{{(@$editData->image)?url('public/jotno_admin/assets/images/category/'.@$editData->image):url('public/jotno_admin/assets/images/category/noimage.jpg')}}"  alt="" class="product-image rounded-circle">
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


