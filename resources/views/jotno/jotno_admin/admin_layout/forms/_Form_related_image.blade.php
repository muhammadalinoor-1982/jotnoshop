<div class="row">

    <!--Form Size Start-->
    <div class="col-12 mb-30">
        <div class="box">
            <div class="box-head">
                <h3 class="title">
                    <a title="Back to Mail Menu" class="edit button button-box button-xs button-info" href="{{ route('product.view')}}"><i class="zmdi zmdi-mail-reply-all"></i></a><br>
                        Related Image Update
                </h3>
            </div>
            <div class="box-body">
                <div class="row mbn-20">

                    <!--Image Upload-->
                    <div class="col-lg-12 col-12 mb-20">
                        <div class="row mbn-15">
                            <div class="col-12 mb-15">
                                <h6 class="mb-15">Upload Image</h6>
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

                </div>
            </div>
        </div>
    </div>
    <!--Form Size End-->
</div>


