@extends('admin.layout.admin_template')

@section('admin_content')

<div class="container pd-x-0">
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                    <li class="breadcrumb-item">
                       <h5>EDIT GAME SCHEDULE</h5>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <!--ADD NEW FORM START-->
    <form method="post" enctype="multipart/form-data" action="{{url('/admin/gameSchedule/update')}}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        @if(isset($data))

        <input type="hidden" name="id" value="{{ isset($data['id'])? ($data['id']):'' }}">
        <div class="row row-xs">

            <!---------------------------------------EDIT GAME ---------------------------------------------->
            <div class="col-lg-12">
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">EDIT GAME:<span class="tx-danger">*</span></label>
                    <div class="col-sm-8">
                        <select id="game_id" name="game_id" class="form-control" required>
                            <option value="">select game</option>
                                @foreach($allGames as $details)
                                <option value="{{$details->id}}" @php echo ($details->id == $data['id_games'])? "selected" : 0; @endphp >{{$details->name}}</option>
                                @endforeach
                        </select>
                        <div class="invalid-feedback mg-b-10">This is required</div>
                    </div>
                </div>
            </div>


            <!------------------------------------ EDIT GAME TYPE: ----------------------------------------->

           <div class="col-lg-12">
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">EDIT GAME TYPE:<span class="tx-danger">*</span></label>
                    <div class="col-sm-8">
                        <select id="game_type" name="game_type" class="form-control" required>
                            <option value="0">select type</option>
                            <option value="weekly" @php echo ($data['competition_type'] == "weekly") ? "selected" : "" @endphp>weekly</option>
                            <option value="monthly"  @php echo ($data['competition_type'] == "monthly") ? "selected" : "" @endphp>monthly</option>
                        </select>
                        <div class="invalid-feedback mg-b-10">This is required</div>
                    </div>
                </div>
            </div>
            <!----------------------------------------- START TIME-------------------------------------------->
                    <div class="col-lg-12">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">EDIT START TIME:<span class="tx-danger">*</span></label>
                            <div class="col-sm-8">
                                @php
                                    $timezone = session('local_timezone', 'Asia/Jakarta');
                                    $convertedStartTime = \Carbon\Carbon::parse($data['start_time'])->setTimezone($timezone)->format("Y-m-d\TH:i");
                                @endphp
                                <input type="datetime-local" class="form-control" name="start_date" id="start_date" value="@php echo $convertedStartTime @endphp" required>
                                <div class="invalid-feedback mg-b-10">This is required</div>
                            </div>
                        </div>
                    </div>

                <!----------------------------------------- END TIME-------------------------------------------->
                
                    <div class="col-lg-12">
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">EDIT END TIME:<span class="tx-danger">*</span></label>
                        <div class="col-sm-8">
                            @php
                                $convertedEndTime = \Carbon\Carbon::parse($data['end_time'])->setTimezone($timezone)->format("Y-m-d\TH:i");
                            @endphp
                            <input type="datetime-local" class="form-control" name="end_date" id="end_date" value="@php echo $convertedEndTime @endphp" required>
                            <div class="invalid-feedback mg-b-10">This is required</div>
                        </div>
                    </div>
                </div>
                <!----------------------------------------- END TIME-------------------------------------------->



             
    
    <div class="clearfix"></div>
        <div class="col-lg-12">
            <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-xs-8 px-3">
                    <div class="text-right">
                        <button id="btn_subm" type="submit" class="btn btn-primary" name="btn_sub">UPDATE</button>
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