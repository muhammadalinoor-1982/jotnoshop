<div class="row">

    <!--Form Size Start-->
    <div class="col-12 mb-30">
        <div class="box">
            <div class="box-head">
                <h3 class="title">
                    <a title="Back to Mail Menu" class="edit button button-box button-xs button-info" href="{{ route('product.view')}}"><i class="zmdi zmdi-mail-reply-all"></i></a><br>
                    @if(@$editData)
                        Update Product
                    @else
                        Add New Product
                    @endif
                </h3>
            </div>
            <div class="box-body">
                <div class="row mbn-20">

                    <!--Small Field-2-->
                    <div class="col-lg-4 col-12 mb-20">
                        <div class="row mbn-15">
                            <div class="col-12 mb-15"><input type="text" name="name" value="{{@$editData->name}}" class="form-control form-control-sm @error('name') is-invalid @enderror" placeholder="*  Product Name" ></div>
                            @error('name')
                            <div class=" text-danger">{{ $message }}</div>
                            @enderror
                        </div><br>
                        <div class="row mbn-15">
                            <div class="col-12 mb-15"><input type="number" name="quantity" value="{{@$editData->quantity}}" class="form-control form-control-sm @error('quantity') is-invalid @enderror" placeholder="Quantity" ></div>
                            @error('quantity')
                            <div class=" text-danger">{{ $message }}</div>
                            @enderror
                        </div><br>
                        <div class="row mbn-15">
                            <div class="col-12 mb-15"><input type="number" name="price" value="{{@$editData->price}}" class="form-control form-control-sm @error('price') is-invalid @enderror" placeholder="*  Price" ></div>
                            @error('price')
                            <div class=" text-danger">{{ $message }}</div>
                            @enderror
                        </div><br>
                        <div class="row mbn-15">
                            <div class="col-12 mb-15"><input type="number" name="disc_price" value="{{@$editData->disc_price}}" class="form-control form-control-sm @error('disc_price') is-invalid @enderror" placeholder="Discount Price" ></div>
                            @error('disc_price')
                            <div class=" text-danger">{{ $message }}</div>
                            @enderror
                        </div><br>
                        <div class="row mbn-15">
                            <p>* Category</p>
                            <select class="form-control select2 @error('category_id') is-invalid @enderror" name="category_id">
                                <optgroup label="Please Select">
                                    <option value="">Select Category</option>
                                    @foreach($categories as $category)
                                        <option value="{{($category->name)}}" {{(@$editData->category_id == $category->name)?"selected":""}}>{{$category->name}}</option>
                                    @endforeach
                                </optgroup>
                            </select>
                            @error('category_id')
                            <div class=" text-danger">{{ $message }}</div>
                            @enderror
                        </div><br>
                        <div class="row mbn-15">
                            <p>* Brand</p>
                            <select class="form-control select2 @error('brand_id') is-invalid @enderror" name="brand_id">
                                <optgroup label="Please Select">
                                    <option value="">Select Brand</option>
                                    @foreach($brands as $brand)
                                        <option value="{{($brand->name)}}" {{(@$editData->brand_id == $brand->name)?"selected":""}}>{{$brand->name}}</option>
                                    @endforeach
                                </optgroup>
                            </select>
                            @error('brand_id')
                            <div class=" text-danger">{{ $message }}</div>
                            @enderror
                        </div><br>
                        <div class="row mbn-15">
                            <p>* Weight</p>
                            <select class="form-control select2 @error('weight_id') is-invalid @enderror" multiple name="weight_id[]">
                                <optgroup label="Please Select">
                                    @foreach($weights as $weight)
                                    <option value="{{$weight->id}}" {{(@in_array(['weight_id'=>$weight->id],$weight_array))?"selected":""}}>{{$weight->name}}</option>
                                    @endforeach
                                </optgroup>
                            </select>
                            @error('weight_id')
                            <div class=" text-danger">{{ $message }}</div>
                            @enderror
                        </div><br>
                        <div class="row mbn-15">
                            <p>Color</p>
                            <select class="form-control select2 @error('color_id') is-invalid @enderror" multiple name="color_id[]">
                                <optgroup label="Please Select">
                                    @foreach($colors as $color)
                                        <option value="{{$color->id}}" {{(@in_array(['color_id'=>$color->id],$color_array))?"selected":""}}>{{$color->name}}</option>
                                    @endforeach
                                </optgroup>
                            </select>
                            @error('color_id')
                            <div class=" text-danger">{{ $message }}</div>
                            @enderror
                        </div><br>
                        <div class="row mbn-15">
                            <p>Size</p>
                            <select class="form-control select2 @error('size_id') is-invalid @enderror" multiple name="size_id[]">
                                <optgroup label="Please Select">
                                    @foreach($sizes as $size)
                                        <option value="{{$size->id}}" {{(@in_array(['size_id'=>$size->id],$size_array))?"selected":""}}>{{$size->name}}</option>
                                    @endforeach
                                </optgroup>
                            </select>
                            @error('size_id')
                            <div class=" text-danger">{{ $message }}</div>
                            @enderror
                        </div><br>
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

                    <!--Summernote Start-->
                    <div class="col-8 mb-30">
                        <div class="box">
                            <div class="box-body">
                                <p>Product Description</p>
                                <textarea name="description" class="summernote @error('description') is-invalid @enderror">{{@$editData->description}}</textarea>
                            </div>
                            @error('description')
                            <div class=" text-danger">{{ $message }}</div>
                            @enderror
                            <div class="box-body">
                                <p>Product Overview</p>
                                <textarea name="overview" class="summernote @error('overview') is-invalid @enderror">{{@$editData->overview}}</textarea>
                            </div>
                            @error('overview')
                            <div class=" text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <!--Summernote End-->

                    <!--Image Upload-->
                    <div class="col-lg-12 col-12 mb-20">
                        <div class="row mbn-15">
                            <div class="col-12 mb-15">
                                <img src="{{(@$editData->image)?url('public/jotno_admin/assets/images/product/'.@$editData->image):url('public/jotno_admin/assets/images/product/noimage.jpg')}}"  alt="" class="product-image rounded-circle">
                                <h6 class="mb-15">Image Upload</h6>
                                <input class="dropify @error('image') is-invalid @enderror" id="image" name="image" type="file">
                            </div>
                            @error('image')
                            <div class=" text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <p style="color: #828282">Preferable image dimension should be 500pix X 500pix.</p>
                    </div>
                    <!--Small Field-->
                    @if(@$editData)

                    @else
                    <!--Image Upload-->
                    <div class="col-lg-12 col-12 mb-20">
                        <div class="row mbn-15">
                            <div class="col-12 mb-15">
                                <h6 class="mb-15">Related Image Upload</h6>
                                <input id="file-input" type="file" name="related_image[]" multiple class="form-control form-control-sm @error('related_image') is-invalid @enderror">
                                <div class="form-group">
                                    <div id="preview"></div>
                                </div>
                            </div>
                            @error('related_image')
                            <div class=" text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <p style="color: #828282">Preferable image dimension should be 500pix X 500pix.</p>
                    </div>
                    <!--Small Field-->
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!--Form Size End-->
</div>


