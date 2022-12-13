<div class="row">

    <!--Form Size Start-->
    <div class="col-12 mb-30">
        <div class="box">
            <div class="box-head">
                <h3 class="title">
                    @if(@$editData)
                        Update User
                    @else
                        Add New User
                    @endif
                </h3>
            </div>
            <div class="box-body">
                <div class="row mbn-20">
                    <!--Small Field-2-->
                    <div class="col-lg-4 col-12 mb-20">
                        <div class="row mbn-15">
                            <div class="col-12 mb-15"><span style="color: #a71d2a">*</span><input type="text" name="name" value="{{@$editData->name}}" class="form-control form-control-sm @error('name') is-invalid @enderror" placeholder="User Name" ></div>
                            @error('name')
                            <div class=" text-danger">{{ $message }}</div>
                            @enderror
                            <div class="col-12 mb-15"><span style="color: #a71d2a">*</span><input type="email" name="email" value="{{@$editData->email}}" class="form-control form-control-sm @error('email') is-invalid @enderror" placeholder="Email"></div>
                            @error('email')
                            <div class=" text-danger">{{ $message }}</div>
                            @enderror
                            <div class="col-12 mb-15"><span style="color: #a71d2a">*</span><input type="text" name="mobile" value="{{@$editData->mobile}}" class="form-control form-control-sm @error('mobile') is-invalid @enderror" placeholder="Mobile"></div>
                            @error('mobile')
                            <div class=" text-danger">{{ $message }}</div>
                            @enderror
                            <div class="col-12 mb-15"><input type="text" name="nationality" value="{{@$editData->nationality}}" class="form-control form-control-sm @error('nationality') is-invalid @enderror" placeholder="Nationality"></div>
                            @error('nationality')
                            <div class=" text-danger">{{ $message }}</div>
                            @enderror<div class="col-12 mb-15"><input type="text" name="country" value="{{@$editData->country}}" class="form-control form-control-sm @error('country') is-invalid @enderror" placeholder="Country"></div>
                            @error('country')
                            <div class=" text-danger">{{ $message }}</div>
                            @enderror<div class="col-12 mb-15"><input type="text" name="nid" value="{{@$editData->nid}}" class="form-control form-control-sm @error('nid') is-invalid @enderror" placeholder="NID"></div>
                            @error('nid')
                            <div class=" text-danger">{{ $message }}</div>
                            @enderror
                            @if(@$editData)
                            @else
                                <div class="col-12 mb-15"><span style="color: #a71d2a">*</span><input id="password" type="password" name="password"  class="form-control form-control-sm @error('password') is-invalid @enderror" placeholder="Password"></div>
                                @error('password')
                                <div class=" text-danger">{{ $message }}</div>
                                @enderror
                                <div class="col-12 mb-15"><span style="color: #a71d2a">*</span><input id="password_confirm" type="password" name="password_confirmation" class="form-control form-control-sm" placeholder="Retype Password"></div>
                            @endif
                        </div>
                    </div>
                    <!--Small Field-->

                    <!--Small Field-6-->
                    <div class="col-lg-4 col-12 mb-20">
                        <div class="row mbn-15">
                            @php
                                if(old("gender")){
                                    $gender = old('gender');
                                }elseif (isset($editData)){
                                    $gender = $editData->gender;
                                }else{
                                    $gender = null;
                                }
                            @endphp
                            <h class="mb-15">gender</h>
                            <div class="form-control form-control-sm @error('gender') is-invalid @enderror">
                                <label class="adomx-radio"><input type="radio" @if($gender=='male') checked @endif name="gender" value="male" id="male"> <i class="icon"></i> Male</label><br>
                                <label class="adomx-radio"><input type="radio" @if($gender=='female') checked @endif name="gender" value="female" id="female"> <i class="icon"></i> Female</label><br>
                                <label class="adomx-radio"><input type="radio" @if($gender=='others') checked @endif name="gender" value="others" id="others"> <i class="icon"></i> Others</label><br>
                            </div>
                            @error('gender')
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

                    <!--Small Field-6-->
                    <div class="col-lg-4 col-12 mb-20">
                        <div class="row mbn-15">
                            @php
                                if(old("role")){
                                    $role = old('role');
                                }elseif (isset($editData)){
                                    $role = $editData->role;
                                }else{
                                    $role = null;
                                }
                            @endphp
                            <h class="mb-15">User Role</h>
                            <div class="form-control form-control-sm @error('role') is-invalid @enderror">
                                <label class="adomx-radio"><input type="radio" @if($role=='super_admin') checked @endif name="role" value="super_admin" id="super_admin"> <i class="icon"></i> Super Admin</label><br>
                                <label class="adomx-radio"><input type="radio" @if($role=='admin') checked @endif name="role" value="admin" id="admin"> <i class="icon"></i> Admin</label><br>
                                <label class="adomx-radio"><input type="radio" @if($role=='manager') checked @endif name="role" value="manager" id="manager"> <i class="icon"></i> Manager</label><br>
                                <label class="adomx-radio"><input type="radio" @if($role=='supervisor') checked @endif name="role" value="supervisor" id="supervisor"> <i class="icon"></i> Supervisor</label><br>
                                <label class="adomx-radio"><input type="radio" @if($role=='operator') checked @endif name="role" value="operator" id="operator"> <i class="icon"></i> Operator</label><br>
                                <label class="adomx-radio"><input type="radio" @if($role=='dealer') checked @endif name="role" value="dealer" id="dealer"> <i class="icon"></i> Dealer</label><br>
                                <label class="adomx-radio"><input type="radio" @if($role=='wholesaler') checked @endif name="role" value="wholesaler" id="wholesaler"> <i class="icon"></i> Wholesaler</label><br>
                                <label class="adomx-radio"><input type="radio" @if($role=='retailer') checked @endif name="role" value="retailer" id="retailer"> <i class="icon"></i> Retailer</label><br>
                                <label class="adomx-radio"><input type="radio" @if($role=='customer') checked @endif name="role" value="customer" id="customer"> <i class="icon"></i> Customer</label><br>
                            </div>
                            @error('role')
                            <div class=" text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <!--Small Field-->


                    <!--Image Upload-->
                    <div class="col-lg-12 col-12 mb-20">
                        <div class="row mbn-15">
                            <div class="col-12 mb-15">
                                <img src="{{(@$editData->image)?url('public/jotno_admin/assets/images/user_images/'.@$editData->image):url('public/jotno_admin/assets/images/user_images/noimage.jpg')}}"  alt="" class="product-image rounded-circle">
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


