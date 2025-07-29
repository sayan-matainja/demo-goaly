@extends('admin.layout.admin_template')


@section('admin_content')

{{--add prediction--}}

<div class="col-xs-12 text-left">
    <label for="group_name" class="title_text">CREATE PREDICTION</label>
</div>

<!--ADD NEW FORM START-->
<form name="pred_add" id="pred_add"  method="post" enctype="multipart/form-data">



<!-----------------------------------------PREDICTION NAME / GROUP NAME-------------------------------------------->
      
        <div class="row" style="margin-top:20px;">
            <div class="form-group">
                <div class="col-xs-12 text-left">
                    <label for="group_name" class="title_text">PREDICTION NAME / GROUP NAME</label>
                </div>
                <div class="col-xs-12 title-error-div">
                    <input type="text" name="group_name" id="group_name"  class="form-control" value="">
                    <span id="title-error" class="help-error" style="text-align:center;"></span>
                </div>
            </div>
        </div>
        
<!-----------------------------------------PREDICTION NAME / GROUP NAME------------------------------------------>

<!---------------------------------------PREDICTION TYPE---------------------------------------------->
    <div class="row" style="margin-top:20px;">
        <div class="form-group">
            <div class="col-xs-12 text-left">
                <label for="prediction_type" class="title_text">PREDICTION TYPE</label>
            </div>
            <div class="col-xs-12 title-error-div">
                <select id="sel_type" name="prediction_type" class="form-control">
                    <option value="0">select type</option>
                    <option value="weekly">weekly</option>
                    <option value="monthly">monthly </option>
                    <option value="quarterly">quarterly</option>
                </select>
            </div>
        </div>
    </div>
<!-----------------------------------------PREDICTION TYPE-------------------------------------------->

<!-----------------------------------------PREDICTION START TIME-------------------------------------------->
      
        <div class="row" style="margin-top:20px;">
            <div class="form-group">
                <div class="col-xs-12 text-left">
                    <label for="game_start" class="title_text">PREDICTION START TIME</label>
                </div>
                <div class="col-xs-12 title-error-div">
                    <input type="datetime-local" step = "1" name="prediction_start" id="prediction_start" class="input-box-small" value="">
                    <span id="title-error" class="help-error" style="text-align:center;"></span>
                </div>
            </div>
        </div>
<!-----------------------------------------PREDICTION START TIME------------------------------------------>




<!-----------------------------------------PREDICTION END TIME-------------------------------------------->

    <div class="row" style="margin-top:20px;">
        <div class="form-group">
            <div class="col-xs-12 text-left">
                <label for="game_end" class="title_text">PREDICTION END TIME</label>
            </div>
            <div class="col-xs-12 title-error-div">
                <input type="datetime-local" step = "1" name="prediction_end" id="prediction_end" class="input-box-small" value="">
                <span id="title-error" class="help-error" style="text-align:center;"></span>
            </div>
        </div>
    </div>
<!-----------------------------------------PREDICTION END TIME-------------------------------------------->


<!------------------------------------------------LEAGUE-------------------------------------------------->
    <div class="row" style="margin-top:20px;">
        <div class="form-group">
            <div class="col-xs-12 text-left">
                <label for="prediction_type" class="title_text">LEAGUES</label>
            </div>
            <div class="col-xs-12 title-error-div">
                <select id="sel_league" name="leagues" class="form-control league">
                    <option value="0">select league</option>
                    @foreach($league_details as $details)
                    <option value="{{$details['sportsmonks_id']}}">{{$details['competition_name']}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
  <!------------------------------------------------LEAGUE-------------------------------------------------->
<!---------------------------------------Prediction Match:---------------------------------------------->
<div class="row" style="margin-top:20px;">
        <div class="form-group">
            <div class="col-xs-12 text-left">
                <label for="team_title" class="title_text">PREDICTION MATCH</label>
            </div>
            <div class="col-xs-12 title-error-div">
                <select  id="multiple" class="form-control select2-multiple" multiple name="match[]">
                    <option value="0">Loading...</option>
                </select>
            </div>
        </div>
    </div>
<!-----------------------------------------Prediction Match:-------------------------------------------->

    <div class="clearfix"></div>
    <div class="row">
        <div class="col-xs-6">
            <div class="text-right">
                <button id="btn_subm" type="submit" class="btn btn-primary" name="btn_sub">SAVE</button>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>

    </form>



@endsection