<div class="row">

    <!--Form Size Start-->
    <div class="col-12 mb-30">
        <div class="box">
            <div class="box-head">
                <h3 class="title">
                    <a title="Back to Mail Menu" class="edit button button-box button-xs button-info" href="{{ route('contact.view')}}"><i class="zmdi zmdi-mail-reply-all"></i></a><br>
                    @if(@$editData)
                        Update Contact
                    @else
                        Add New Contact
                    @endif
                </h3>
            </div>
            <div class="box-body">
                <div class="row mbn-20">

                    <!--Summernote Start-->
                    <div class="col-8 mb-30">
                        <div class="box">
                            <div class="box-body">
                                <p>About</p>
                                <textarea name="about" class="summernote @error('about') is-invalid @enderror">{{@$editData->about}}</textarea>
                            </div>
                            @error('about')
                            <div class=" text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <!--Summernote End-->
                    <!--Small Field-2-->
                    <div class="col-lg-4 col-12 mb-20">
                        <div class="row mbn-15">
                            <div class="col-12 mb-15"><input type="text" name="location" value="{{@$editData->location}}" class="form-control form-control-sm @error('location') is-invalid @enderror" placeholder="Location/Address" ></div>
                            @error('location')
                            <div class=" text-danger">{{ $message }}</div>
                            @enderror
                        </div><br>
                        <div class="row mbn-15">
                            <div class="col-12 mb-15"><input type="text" name="phone" value="{{@$editData->phone}}" class="form-control form-control-sm @error('phone') is-invalid @enderror" placeholder="Phone" ></div>
                            @error('phone')
                            <div class=" text-danger">{{ $message }}</div>
                            @enderror
                        </div><br>
                        <div class="row mbn-15">
                            <div class="col-12 mb-15"><input type="text" name="alt_phone" value="{{@$editData->alt_phone}}" class="form-control form-control-sm @error('alt_phone') is-invalid @enderror" placeholder="Alternative Phone" ></div>
                            @error('alt_phone')
                            <div class=" text-danger">{{ $message }}</div>
                            @enderror
                        </div><br>
                        <div class="row mbn-15">
                            <div class="col-12 mb-15"><input type="text" name="email" value="{{@$editData->email}}" class="form-control form-control-sm @error('email') is-invalid @enderror" placeholder="Email" ></div>
                            @error('email')
                            <div class=" text-danger">{{ $message }}</div>
                            @enderror
                        </div><br>
                        <div class="row mbn-15">
                            <div class="col-12 mb-15"><input type="text" name="link_1" value="{{@$editData->link_1}}" class="form-control form-control-sm @error('link_1') is-invalid @enderror" placeholder="Facebook" ></div>
                            @error('link_1')
                            <div class=" text-danger">{{ $message }}</div>
                            @enderror
                        </div><br>
                        <div class="row mbn-15">
                            <div class="col-12 mb-15"><input type="text" name="link_2" value="{{@$editData->link_2}}" class="form-control form-control-sm @error('link_2') is-invalid @enderror" placeholder="Instagram" ></div>
                            @error('link_2')
                            <div class=" text-danger">{{ $message }}</div>
                            @enderror
                        </div><br>
                        <div class="row mbn-15">
                            <div class="col-12 mb-15"><input type="text" name="link_3" value="{{@$editData->link_3}}" class="form-control form-control-sm @error('link_3') is-invalid @enderror" placeholder="Twitter" ></div>
                            @error('link_3')
                            <div class=" text-danger">{{ $message }}</div>
                            @enderror
                        </div><br>
                        <div class="row mbn-15">
                            <div class="col-12 mb-15"><input type="text" name="link_4" value="{{@$editData->link_4}}" class="form-control form-control-sm @error('link_4') is-invalid @enderror" placeholder="LinkedIn" ></div>
                            @error('link_4')
                            <div class=" text-danger">{{ $message }}</div>
                            @enderror
                        </div><br>
                        <div class="row mbn-15">
                            <div class="col-12 mb-15"><input type="text" name="link_5" value="{{@$editData->link_5}}" class="form-control form-control-sm @error('link_5') is-invalid @enderror" placeholder="YouTube" ></div>
                            @error('link_5')
                            <div class=" text-danger">{{ $message }}</div>
                            @enderror
                        </div><br>
                    </div>
                    <!--Small Field-->
                </div>
            </div>
        </div>
    </div>
    <!--Form Size End-->
</div>


