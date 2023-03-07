<div class="row">

    <!--Form Size Start-->
    <div class="col-12 mb-30">
        <div class="box">
            <div class="box-head">
                <h3 class="title">
                    @if(@$editData)
                        Approved Order
                    @else
                        Add New Order
                    @endif
                </h3>
            </div>
            <div class="box-body">
                <div class="row mbn-20">
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
                            <h class="mb-15">Order Status</h>
                            <div class="form-control form-control-sm @error('status') is-invalid @enderror">
                                <label class="adomx-radio"><input type="radio" @if($status=='pending') checked @endif name="status" value="pending" id="pending"> <i class="icon"></i> Pending</label><br>
                                <label class="adomx-radio"><input type="radio" @if($status=='approved') checked @endif name="status" value="approved" id="approved"> <i class="icon"></i> Approved</label><br>
                            </div>
                            @error('status')
                            <div class=" text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <!--Small Field-->
                </div>
            </div>
        </div>
    </div>
    <!--Form Size End-->
</div>


