@extends('admin.layout.admin_template')


@section('admin_content')

{{--add prediction--}}

<div class="container pd-x-0">
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                    <li class="breadcrumb-item">
                        <h5>EDIT PRIZE</h5>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <!--ADD NEW FORM START-->
    <form name="pred_update" id="pred_update" method="post" enctype="multipart/form-data" action="{{ route('update') }}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    
    @if(isset($data))
    <input type="hidden" name="Idd" value="{{ isset($data->id)? ($data->id):'' }}">
    <div class="row row-xs">

        <!-----------------------------------------PREDICTION NAME / GROUP NAME-------------------------------------------->

        <div class="col-lg-12">
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">TYPE<span class="tx-danger">*</span></label>
                <div class="col-sm-8">
                    <select id="sel_type" name="type" class="form-control" required>
                        <option value="0">select type</option>
                        <option value="weekly" @php echo ($data->type == "weekly") ? "selected" : "" @endphp>weekly</option>
                        <option value="monthly" @php echo ($data->type == "monthly") ? "selected" : "" @endphp>monthly </option>
                    </select>
                    <div class="invalid-feedback mg-b-10">This is required</div>
                </div>
            </div>
        </div>
        <!-----------------------------------------PREDICTION NAME / GROUP NAME------------------------------------------>

        <!---------------------------------------PREDICTION TYPE---------------------------------------------->

        <div class="col-lg-12">
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">RANK<span class="tx-danger">*</span></label>
                <div class="col-sm-8">
                    <select id="sel_type" name="rank" class="form-control" required>
                        <option value="0">select type</option>
                        <option value="1" @php echo ($data->rank == 1) ? "selected" : "" @endphp>1</option>
                        <option value="2" @php echo ($data->rank == 2) ? "selected" : "" @endphp>2</option>
                        <option value="3" @php echo ($data->rank == 3) ? "selected" : "" @endphp>3</option>
                        <option value="4" @php echo ($data->rank == 4) ? "selected" : "" @endphp>4</option>
                        <option value="5" @php echo ($data->rank == 5) ? "selected" : "" @endphp>5</option>
                    </select>
                    <div class="invalid-feedback mg-b-10">This is required</div>
                </div>
            </div>
        </div>
        <!-----------------------------------------PREDICTION TYPE-------------------------------------------->
        <!-----------------------------------------PREDICTION START TIME-------------------------------------------->
        <div class="col-lg-12">
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">START DATE<span class="tx-danger">*</span></label>
                <div class="col-sm-8">
                @php $date = date("Y-m-d\TH:i:s", strtotime($data->start_date)); @endphp
                    <input type="datetime-local" class="form-control" name="start_date" id="prediction_start" value="@php echo $date @endphp" required>
                    <div class="invalid-feedback mg-b-10">This is required</div>
                </div>
            </div>
        </div>
        <!-----------------------------------------PREDICTION START TIME------------------------------------------>
        <!-----------------------------------------PREDICTION END TIME-------------------------------------------->
        <div class="col-lg-12">
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">END DATE<span class="tx-danger">*</span></label>
                <div class="col-sm-8">
                @php $datee = date("Y-m-d\TH:i:s", strtotime($data->end_date)); @endphp
                    <input type="datetime-local" class="form-control" name="end_date" id="prediction_end" value="@php echo $datee @endphp" required>
                    <div class="invalid-feedback mg-b-10">This is required</div>
                </div>
            </div>
        </div>
        <!-----------------------------------------PREDICTION END TIME-------------------------------------------->

        <!------------------------------------------------LEAGUE-------------------------------------------------->
        <!---------------------------------------Prize name---------------------------------------------->
        <div class="col-lg-12">
            <div class="form-group row">
                <label for="prizename" class="col-sm-4 col-form-label">Prize Name</label>
                <div class="col-sm-8 px-3">
                    <textarea class="form-control" rows="1" name="prizename"  id="prizename">@php echo $data->prize_name @endphp</textarea>
                    <div class="invalid-feedback mg-b-10">This is required</div>
                </div>
            </div>
        </div>
       <!-----------------------------------------Winner Prize size:-------------------------------------------->
        <div class="col-lg-12">
            <div class="form-group row">
                <label for="prizename" class="col-sm-4 col-form-label">Prize Size</label>
                <div class="col-sm-8 px-3">
                    <textarea class="form-control" rows="1" name="prize_size"  id="prize_size" required>@php echo $data->prize_size @endphp</textarea>
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
                                <input type="file" class="form-control" value="{{$data->prize_image}}"  name="image">
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