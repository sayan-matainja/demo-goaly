@extends('admin.layout.admin_template')


@section('admin_content')

{{--add prediction--}}

<div class="container pd-x-0">
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                    <li class="breadcrumb-item">
                        <h5>Create Game Schedule</h5>
                    </li>
                </ol>
            </nav>
        </div>
    </div>
@if(Session::has('flash_message_success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('flash_message_success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
           <script>
        window.onload = function() {
            window.location.reload(true);
        }
    </script>

        @endif

        @if(Session::has('flash_message_error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ Session::get('flash_message_error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
           <script>
        window.onload = function() {
            window.location.reload(true);
        }
    </script>
        @endif
    <!--ADD NEW FORM START-->
    <form name="pred_add" id="pred_add" method="post" enctype="multipart/form-data" action="{{ url('admin/gameSchedule/store') }}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="row row-xs">

            <!-----------------------------------------PREDICTION NAME / GROUP NAME-------------------------------------------->

            <div class="col-lg-5">
                 <div class="col-lg-12">
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">GAME:<span class="tx-danger">*</span></label>
                        <div class="col-sm-8">
                            <select id="game_id" name="game_id" class="form-control" required>
                                <option value="">select type</option>                            
                                @foreach($allGames as $allGame)
                                <option value="{{$allGame->id}}">{{$allGame->name}}</option>
                                @endforeach
                            </select>
                            @error('game_id')
                            <div class="invalid-feedback mg-b-10">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <!---------------------------------------PREDICTION TYPE---------------------------------------------->

                <div class="col-lg-12">
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">GAME TYPE:<span class="tx-danger">*</span></label>
                        <div class="col-sm-8">
                            <select id="game_type" name="game_type" class="form-control" required>
                                <option value="0">select type</option>
                                <option value="weekly">weekly</option>
                                <option value="monthly">monthly </option>
                            </select>
                             @error('game_type')
                                <div class="invalid-feedback mg-b-10">{{ $message }}</div>
                             @enderror
                               </div>
                    </div>
                </div>
                <!-----------------------------------------PREDICTION START TIME-------------------------------------------->
                <div class="col-lg-12">
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">START TIME:<span class="tx-danger">*</span></label>
                        <div class="col-sm-8">
                            <input type="datetime-local" class="form-control" name="start_date" id="start_date" value="" required>
                            @error('start_date')
                            <div class="invalid-feedback mg-b-10">{{ $message }}</div>
                            @enderror
                            </div>
                    </div>
                </div>
                <!-----------------------------------------PREDICTION END TIME-------------------------------------------->
                <div class="col-lg-12">
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">END TIME:<span class="tx-danger">*</span></label>
                        <div class="col-sm-8">
                            <input type="datetime-local" class="form-control" name="end_date" id="end_date" value="" required>
                         @error('end_date')
                                <div class="invalid-feedback mg-b-10">{{ $message }}</div>
                         @enderror                        
                    </div>
                    </div>
                </div>
                <!-----------------------------------------PREDICTION END TIME-------------------------------------------->
                

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