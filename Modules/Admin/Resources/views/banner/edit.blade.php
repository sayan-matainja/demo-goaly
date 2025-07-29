@extends('admin.layout.admin_template')

@section('admin_content')


<div class="container pd-x-0">
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                    <li class="breadcrumb-item">
                        <h5>ADD BANNEER</h5>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <!--ADD NEW FORM START-->
    <form method="post" enctype="multipart/form-data" action="{{route('banner.save')}}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        @if(isset($data))

        <input type="hidden" name="Idd" value="{{ isset($data['id'])? ($data['id']):'' }}">
        <div class="row row-xs">

            <!---------------------------------------Description ---------------------------------------------->
            <div class="col-lg-12">
                <div class="form-group row">
                    <label for="prizename" class="col-sm-4 col-form-label">Description</label>
                    <div class="col-sm-8 px-3">
                        <textarea class="form-control" rows="1" name="description" id="description">@php echo $data['banner_description'] @endphp</textarea>
                        <div class="invalid-feedback mg-b-10">This is required</div>
                    </div>
                </div>
            </div>
            <!-----------------------------------------Prediction Match:-------------------------------------------->

            <!------------------------------------ TYPE: ----------------------------------------->

            <div class="col-lg-12">
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">TYPE<span class="tx-danger">*</span></label>
                    <div class="col-sm-8">
                        <select id="sel_type" name="type" class="form-control" required>
                            <option value="0">select type</option>
                            <option value="category" @php echo ($data['banner_type'] == "category") ? "selected" : "" @endphp>Homepage</option>
                            <option value="reward"  @php echo ($data['banner_type'] == "reward") ? "selected" : "" @endphp>Reward</option>
                        </select>
                        <div class="invalid-feedback mg-b-10">This is required</div>
                    </div>
                </div>
            </div>

             <!----------Banner Url------------>


             <div class="col-lg-12 catlst" id="banner_row">
                <div class="form-group row">
                    <div class="col-xs-12 text-left">
                        <label for="bannercat" class="title_text">Banner Url:</label>
                    </div>
                    <div class="col-xs-12 title-error1-div">
                        <input type="text" name="bannercat" value="{{$data['banner_url']}}" class="form-control" id="bannercat">
                        <span id="title-error1" class="help-error" style="text-align:center;"></span>
                    </div>
                </div>
            </div>

            <!----------rewardlist------------>

            <div class="row rwdlst"  id="bannerreward_row" style="margin-top:20px; display:none;">
                <div class="form-group">
                    <div class="col-xs-12 text-left">
                        <label for="bannerreward" class="title_text">Reward:</label>
                    </div>
                    <div class="col-xs-12 title-error1-div">
                        <select class="form-control" id="bannerreward" name="bannerreward">    
                        <option value=""></option>
                        
                        </select>
                        <span id="title-error1" class="help-error" style="text-align:center;"></span>
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
                                <div class="file-upload">
                                <label for="imageUpload"></label>
                                <!-- <input type="file" class="form-control" value="{{$data->thumbnail}}"  name="image"> -->
                                    <input type="file"  class="form-control" value="hello" name="image">
                                    <img style="height:80px; width:100px; border-radius:50%;" src="{{asset('/images/bannerImage/'.$data['banner_image'])}}">
                                    <div class="avatar-preview">
                                    <div id="imagePreview" style="background-image: url(http://i.pravatar.cc/500?img=7);">
                                    </div>
                                </div>
                            </div>


                            <div class="avatar-preview">
                                <div id="imagePreview" style="background-image: url(http://i.pravatar.cc/500?img=7);">
                                </div>
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
        @endif
    </form>
</div>
</div>

<script>
    $(document).ready(function(){
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
                    $('#imagePreview').hide();
                    $('#imagePreview').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#imageUpload").change(function() {
            readURL(this);
        });
    });
</script>


@endsection