@extends('admin.layout.admin_template')


@section('admin_content')

{{--edit prediction--}}



<div class="container pd-x-0">
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                    <li class="breadcrumb-item">
                       <h5>Edit Prediction</h5>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <!--ADD NEW FORM START-->
    <form name="pred_update" id="pred_update" method="post" enctype="multipart/form-data" action="{{ route('updateprediction') }}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    
    @if(isset($predictionDetails))
    
    <input type="hidden" name="prediction_tableId" value="{{ isset($predictionDetails->id)? ($predictionDetails->id):'' }}">
        <div class="row row-xs">

            <!-----------------------------------------PREDICTION NAME / GROUP NAME-------------------------------------------->

            <div class="col-lg-5">
                <div class="col-lg-12">
                    <div class="form-group row">
                        <label for="group_name" class="col-sm-4 col-form-label">PREDICTION NAME<span class="tx-danger">*</span></label>
                        <div class="col-sm-8">
                            <input type="text" name="group_name" id="group_name" class="form-control" value="{{$predictionDetails->group_name}}" required>
                            <div class="invalid-feedback mg-b-10">This is required</div>
                        </div>
                    </div>
                </div>
                <!-----------------------------------------PREDICTION NAME / GROUP NAME------------------------------------------>

                <!---------------------------------------PREDICTION TYPE---------------------------------------------->

                <div class="col-lg-12">
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">PREDICTION TYPE<span class="tx-danger">*</span></label>
                        <div class="col-sm-8">
                            <select id="sel_type" name="prediction_type" class="form-control" required>
                                <option value="">select type</option>
                                <option value="weekly" @php echo ($predictionDetails->prediction_type == "weekly") ? "selected" : "" @endphp>weekly</option>
                                <option value="monthly" @php echo ($predictionDetails->prediction_type == "monthly") ? "selected" : "" @endphp>monthly </option>
                                <option value="quarterly" @php echo ($predictionDetails->prediction_type == "quarterly") ? "selected" : "" @endphp>quarterly</option>
                            </select>
                            <div class="invalid-feedback mg-b-10">This is required</div>
                        </div>
                    </div>
                </div>
                <!-----------------------------------------PREDICTION TYPE-------------------------------------------->
                <!-----------------------------------------PREDICTION START TIME-------------------------------------------->
                    <div class="col-lg-12">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">PREDICTION START TIME<span class="tx-danger">*</span></label>
                            <div class="col-sm-8">
                                @php
                                    $timezone = session('local_timezone', 'Asia/Jakarta');
                                    $convertedStartTime = \Carbon\Carbon::parse($predictionDetails->prediction_start_time)->setTimezone($timezone)->format("Y-m-d\TH:i");
                                @endphp
                                <input type="datetime-local" class="form-control" name="prediction_start" id="prediction_start" value="@php echo $convertedStartTime @endphp" required>
                                <div class="invalid-feedback mg-b-10">This is required</div>
                            </div>
                        </div>
                    </div>

                <!-----------------------------------------PREDICTION START TIME------------------------------------------>
                <!-----------------------------------------PREDICTION END TIME-------------------------------------------->
                
                    <div class="col-lg-12">
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">PREDICTION END TIME<span class="tx-danger">*</span></label>
                        <div class="col-sm-8">
                            @php
                                $convertedEndTime = \Carbon\Carbon::parse($predictionDetails->prediction_end_time)->setTimezone($timezone)->format("Y-m-d\TH:i");
                            @endphp
                            <input type="datetime-local" class="form-control" name="prediction_end" id="prediction_end" value="@php echo $convertedEndTime @endphp" required>
                            <div class="invalid-feedback mg-b-10">This is required</div>
                        </div>
                    </div>
                </div>
                <!-----------------------------------------PREDICTION END TIME-------------------------------------------->
                <!------------------------------------------------LEAGUE-------------------------------------------------->
                <div class="col-lg-12">
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label" for="prediction_type" class="title_text">LEAGUES<span class="tx-danger">*</span></label>
                        <div class="col-sm-8">
                            <select id="sel_league" name="leagues" class="form-control league">
                                <option value="">select league</option>
                                @foreach($league_details as $details)
                                <option value="{{$details->sportsmonks_id}}" @php echo ($details->sportsmonks_id == $predictionDetails->league_id)? "selected" : 0; @endphp >{{$details->competition_name}}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback mg-b-10">This is required</div>
                        </div>
                    </div>
                </div>
                <!------------------------------------------------LEAGUE-------------------------------------------------->
                <!---------------------------------------Prediction Match:---------------------------------------------->
                
                <div class="col-lg-12">
                    <div class="form-group row">
                        <label for="team_title" class="col-sm-4 col-form-label">PREDICTION MATCH<span class="tx-danger">*</span></label>
                        <div class="col-sm-8">
                            <select id="multiple" class="form-control select2"  multiple="multiple" name="match[]"  value="">
                            @if(isset($response))
                            @foreach($response as $res)

                           
                            @php $homeTeam=$res['homeTeam_name'];  @endphp
                           @php $awayTeam=$res['awayTeam_name'];  @endphp
                           <option value="">Select Match</option>
                            <option value="{{$res['fixture_id']}}"  @php echo 
                            ( $res['fixture_id'] == $predictionDetails->match_id)? "selected" : 0; @endphp
                            >{{$homeTeam .'VS'. $awayTeam}}</option>
                           
                            @endforeach
                            @endif
                            </select>
                            <div class="invalid-feedback mg-b-10">This is required</div>
                        </div>
                    </div>
                </div>
                <!-----------------------------------------Prediction Match:-------------------------------------------->

                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-xs-6">
                        <div class="text-right">
                            <button id="btn_subm" type="submit" class="btn btn-primary">UPDATE</button>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                
            @endif
    </form>
</div>
</div>

@endsection