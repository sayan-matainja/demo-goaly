@extends('admin.layout.admin_template')


@section('admin_content')

{{--add prediction--}}




<div class="container pd-x-0">
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                    <li class="breadcrumb-item">
                        <h5>EDIT Newsmanagement</h5>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <!--ADD NEW FORM START-->
    <form name="pred_update" id="pred_update" method="post" enctype="multipart/form-data" action="{{ route('changes') }}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

  
    @if(isset($data))


    <input type="hidden" name="Idd" value="{{ isset($data->id)? ($data->id):'' }}">
    <div class="row row-xs">

        <div class="col-lg-12">
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">TYPE<span class="tx-danger">*</span></label>
                <div class="col-sm-8">
                    <select id="sel_type" name="place_for" class="form-control" required>
                        <option value="0">select type</option>
                        <option value="home" @php echo ($data->place_for == "home") ? "selected" : "" @endphp>home</option>
                        <option value="latest" @php echo ($data->place_for == "latest") ? "selected" : "" @endphp>latest</option>
                        <option value="hotest" @php echo ($data->place_for == "hotest") ? "selected" : "" @endphp>hotestt</option>
                        <option value="transfer" @php echo ($data->place_for == "transfer") ? "selected" : "" @endphp>transfer</option>
                    </select>
                    <div class="invalid-feedback mg-b-10">This is required</div>
                </div>
            </div>
        </div>
        

        <div class="col-lg-12">
            <div class="form-group row">
                <label for="prizename" class="col-sm-4 col-form-label">New Tittle</label>
                <div class="col-sm-8 px-3">
                    <textarea class="form-control" rows="1" name="newstitle"  id="newstitle">@php echo $data->title @endphp</textarea>
                    <div class="invalid-feedback mg-b-10">This is required</div>
                </div>
            </div>
        </div>

        <div class="col-lg-12">
            <div class="form-group row">
                <label for="prizename" class="col-sm-4 col-form-label">News Description</label>
                <div class="col-sm-8 px-3">
                    <textarea class="form-control" rows="1" name="newsdetails"  id="newsdetails">@php echo $data->content @endphp</textarea>
                    <div class="invalid-feedback mg-b-10">This is required</div>
                </div>
            </div>
        </div>
        
        <!--------------------------------------PHOTO UPLOAD---------------------------------------------------->
        <div class="col-lg-12">
            <div class="form-group">
                    <div class="row">
                    <div class="col-sm-4">
                    <div class="image-error-div" style="margin-bottom:5px;">
                        <label>Upload prize image</label>
                        <div id="image-error" style="text-align:center;" class="help-error"></div>
                    </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="user_profile relative">
                            <div class="file-upload">
                                <label for="inputFile_image" class="file-upload__label"></label>
                                <input type="file" class="form-control" value="{{$data->thumbnail}}"  name="image">
                                <img style="height:80px; width:100px; border-radius:50%;" src="{{asset('/images/prizeImage/'.$data['prize_image'])}}">
                                
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
                    <button id="btn_subm"  type="submit" class="btn btn-primary" name="btn_sub">SAVE</button>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        </div>
        @endif
        </form>
    </div>
</div>


@endsection