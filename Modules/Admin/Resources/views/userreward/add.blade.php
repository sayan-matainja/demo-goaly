@extends('admin.layout.admin_template')


@section('admin_content')

{{--add prediction--}}

<div class="container pd-x-0">
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                    <li class="breadcrumb-item">
                        <h5>ADD REWARD</h5>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <!--ADD NEW FORM START-->
    <form name="pred_add" id="pred_add" method="post" enctype="multipart/form-data" action="{{route('store')}}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <div class="row row-xs">

    

        <!---------------------------------------TITTLE---------------------------------------------->
        <div class="col-lg-12">
            <div class="form-group row">
                <label for="prizename" class="col-sm-4 col-form-label">Tittle</label>
                <div class="col-sm-8 px-3">
                    <input class="form-control" rows="1" value="{{old('tittle')}}" name="tittle" id="tittle">
                    <span class="text-danger">{{ $errors->first('tittle') }}</span>
                </div>
            </div>
        </div>
        <!-----------------------------------------TITTLE-------------------------------------------->
           <!----------------------------------------DESCRIPTION---------------------------------------------->
           <div class="col-lg-12">
            <div class="form-group row">
                <label for="prizename" class="col-sm-4 col-form-label">Description</label>
                <div class="col-sm-8 px-3">
                    <input class="form-control" rows="1" value="{{old('description')}}" name="description" id="description">
                    <span class="text-danger">{{ $errors->first('description') }}</span> 
                </div>
            </div>
        </div>
        <!-----------------------------------------DESCRIPTION-------------------------------------------->

          <!----------------------------------------COIN---------------------------------------------->
          <div class="col-lg-12">
            <div class="form-group row">
                <label for="prizename" class="col-sm-4 col-form-label">Coin</label>
                <div class="col-sm-8 px-3">
                    <input class="form-control" rows="1" value="{{old('coin')}}" name="coin" id="coin">
                    <span class="text-danger">{{ $errors->first('coin') }}</span> 
                </div>
            </div>
        </div>
        <!-----------------------------------------COIN-------------------------------------------->

        <!--------------------------------------THUMBNAIL UPLOAD---------------------------------------------------->
        <div class="col-lg-12">
            <div class="form-group">
                    <div class="row">
                    <div class="col-sm-4">
                    <div class="image-error-div" style="margin-bottom:5px ; ">
                        <label>Upload thumbnail image</label>
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
                                <input type="file" class="form-control"  name="thumb_image" value="">
                                <span class="text-danger">{{$errors->first('image1') }}</span>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--------------------------------------THUMBNAIL UPLOAD---------------------------------------------------->

        <!--------------------------------------BANNER UPLOAD---------------------------------------------------->
        <div class="col-lg-12">
            <div class="form-group">
                    <div class="row">
                    <div class="col-sm-4">
                    <div class="image-error-div" style="margin-bottom:5px ; ">
                        <label>Upload banner image</label>
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
                                <input type="file" class="form-control"  name="image" value="">
                                <span class="text-danger">{{$errors->first('image') }}</span>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--------------------------------------BANNER UPLOAD---------------------------------------------------->
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