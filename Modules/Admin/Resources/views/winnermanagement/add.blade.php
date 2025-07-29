@extends('admin.layout.admin_template')


@section('admin_content')

{{--add Winner Prize--}}

<div class="container pd-x-0">
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                    <li class="breadcrumb-item">
                        <h5>ADD PRIZE</h5>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <!--ADD NEW FORM START-->
    <form name="pred_add" id="pred_add" method="post" enctype="multipart/form-data" action="{{ route('sumbit') }}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <div class="row row-xs">

        <!-----------------------------------------Winner Prize NAME / GROUP NAME-------------------------------------------->

        <div class="col-lg-12">
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">TYPE<span class="tx-danger">*</span></label>
                <div class="col-sm-8">
                    <select id="sel_type" name="type" class="form-control">
                        <option value="">select type</option>
                        <option value="weekly" @if (old('type') == "weekly") {{ 'selected' }} @endif>weekly</option>
                        <option value="monthly" @if (old('type') == "monthly") {{ 'selected' }} @endif>monthly </option>
                    </select>
                    <span class="text-danger">{{ $errors->first('type') }}</span>
                   
                </div>
            </div>
        </div>
        <!-----------------------------------------Winner Prize NAME / GROUP NAME------------------------------------------>

        <!---------------------------------------Winner Prize TYPE---------------------------------------------->

        <div class="col-lg-12">
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">RANK<span class="tx-danger">*</span></label>
                <div class="col-sm-8">
                    <select id="sel_type" name="rank" class="form-control">
                        <option value="">select type</option>
                        <option value="1" @if (old('rank') == "1") {{ 'selected' }} @endif>1</option>
                        <option value="2" @if (old('rank') == "2") {{ 'selected' }} @endif>2</option>
                        <option value="3" @if (old('rank') == "3") {{ 'selected' }} @endif>3</option>
                        <option value="4" @if (old('rank') == "4") {{ 'selected' }} @endif>4</option>
                        <option value="5" @if (old('rank') == "5") {{ 'selected' }} @endif>5</option>
                    </select>
                    <span class="text-danger">{{ $errors->first('rank') }}</span>
                </div>
            </div>
        </div>
        <!-----------------------------------------Winner Prize TYPE-------------------------------------------->
        <!-----------------------------------------Winner Prize START TIME-------------------------------------------->
        <div class="col-lg-12">
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">START DATE<span class="tx-danger">*</span></label>
                <div class="col-sm-8">
                    <input type="datetime-local" class="form-control" name="start_date" id="Winner Prize_start" value="{{old('start_date')}}" >
                    <span class="text-danger">{{ $errors->first('start_date') }}</span>
                </div>
            </div>
        </div>
        <!-----------------------------------------Winner Prize START TIME------------------------------------------>
        <!-----------------------------------------Winner Prize END TIME-------------------------------------------->
        <div class="col-lg-12">
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">END DATE<span class="tx-danger">*</span></label>
                <div class="col-sm-8">
                    <input type="datetime-local" class="form-control" name="end_date" id="Winner Prize_end" value="{{old('end_date')}}" >
                    @error('end_date')
                    <span class="text-danger">{{ $errors->first('end_date') }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <!-----------------------------------------Winner Prize END TIME-------------------------------------------->

        <!------------------------------------------------LEAGUE-------------------------------------------------->
        <!---------------------------------------Prize name---------------------------------------------->
        <div class="col-lg-12">
            <div class="form-group row">
                <label for="prizename" class="col-sm-4 col-form-label">Prize Name</label>
                <div class="col-sm-8 px-3">
                    <input class="form-control" rows="1" value="{{old('prizename')}}" name="prizename" id="prizename">
                    <span class="text-danger">{{ $errors->first('prizename') }}</span>
                </div>
            </div>
        </div>
        <!-----------------------------------------Winner Prize size:-------------------------------------------->
        <div class="col-lg-12">
            <div class="form-group row">
                <label for="prizename" class="col-sm-4 col-form-label">Prize Size</label>
                <div class="col-sm-8 px-3">
                    <input class="form-control" rows="1" value="{{old('prize_size')}}" name="prize_size" id="prize_size">
                    <span class="text-danger">{{ $errors->first('prize_size') }}</span>
                </div>
            </div>
        </div>
        <!--------------------------------------PHOTO UPLOAD---------------------------------------------------->
        <div class="col-lg-12">
            <div class="form-group">
                    <div class="row">
                    <div class="col-sm-4">
                    <div class="image-error-div" style="margin-bottom:5px ; ">
                        <label>Upload prize image</label>
                        <div id="image-error" style="text-align:center;" class="help-error"></div>
                    </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="user_profile relative">

                            <!-- <div class="profile-icon "> <img src="/assets/image/images.png" title="Change Your Profile Image" class="img-responsive" alt="" id="image_upload_preview">
                                <div class="edit_profle"><i class="fa fa-pencil" title="To Change Image Click On Your Image" data-toggle="tooltip" data-placement="bottom"></i></div>
                            </div> -->
                            <div class="file-upload">
                                <label for="inputFile_image" class="file-upload__label"></label>
                                <input type="file" class="form-control"  name="image" value="{{old('image')}}">
                                <span class="text-danger">{{$errors->first('image') }}</span>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--------------------------------------PHOTO UPLOAD---------------------------------------------------->
        <div class="clearfix"></div>
        <div class="col-lg-12">
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-xs-8 px-3">
                <div class="text-right">
                    <button id="btn_subm" type="submit" class="btn btn-primary" name="btn_sub">SAVE</button>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        </div>

        </form>
    </div>
</div>


@endsection