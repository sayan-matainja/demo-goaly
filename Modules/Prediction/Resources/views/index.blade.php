@extends('admin.layout.admin_template')


@section('admin_content')
<style>
   
       
   .help-error{
  color:#e73d4a;
} 
.label-success {
    background-color: #5cb85c;
}
#btn_pred{
   margin-top: 5px !important;
}
.btn-circle {
    width: 23px;
    height: 23px;
    padding: 0px 0px;
    border-radius: 15px;
    text-align: center;
    font-size: 12px;
    line-height: 1.42857;
}

.btn-sm, .btn-group-sm > .btn, .ui-datepicker-buttonpane .btn-group-sm > button, .sp-container .btn-group-sm > button, .ui-datepicker-buttonpane button{
    font-size: 12px;
    padding: 2px 4px;
}
.file-upload {
    position: absolute;
    display: inline-block;
    top: 20px;
    width: 115px;
    height: 115px;
    margin: 20px auto;
    left: 0;
    right: 0;
    border-radius: 50%;
    overflow: hidden;
    opacity: 0;
}

.file-upload__label {
    display: block;
    padding: 0;
    color: #fff;
    background: #222;
    transition: background .3s;
    width: 100%;
    height: 100%;
}
.file-upload__label:hover {
  cursor: pointer;
}
.edit_profle {
    position: absolute;
    top: 33px;
    color: #fff;
    right: 84px;
    font-size: 21px;
}
.file-upload__input {
  position: absolute;
  left: 0;
  top: 0;
  right: 0;
  bottom: 0;
  font-size: 1;
  width: 0;
  height: 100%;
  opacity: 0;
}
.edit_form > form > .form-group > label {
    font-size: 17px;
    font-weight: normal;
    color: #003367;
    line-height: 35px;
}
.edit_form {
    margin: 20px;
}
.form-control.form_modify {
    border-radius: 0;
    box-shadow: none;
    border-color: #787878;
}
.profile-icon {
  width: 100%;
  height: auto;
  overflow: hidden;
  margin: 0 auto;
  text-align: center;
  min-height: 50px;
}
.profile_name > p {
  color: #fff;
  text-align: center;
  font-size: 16px;
}
#image_upload_preview1 {
    width: 100%;
    max-width:72px;
    height: auto;
    display:inline-block;
}
#image_upload_preview2 {
    width: 100%;
    max-width:72px;
    height: auto;
    display:inline-block;
}
#image_upload_previewBanner {
    width: 100%;
    max-width:72px;
    height: auto;
    display:inline-block;
}
#btn_subm {
    width: 26%;
    margin-left: 18px;
    margin-top: 25px;
    padding: 10px;
    border-radius: 3px !important;
    border: 0;
    margin-top: 22px;
}

.popup_heading_text{font-weight:600; float:left;}
.title_text{ text-align:right; margin-top:5px;}
.bootbox .modal-content {
    margin-left: 160px;
    width: 55%;
}
.modal, .modal-open {
    overflow-y: hidden!important;
}
.modal.left.quiz .modal-content {
    height: auto;
    overflow: hidden;
}
.set_pred {
  padding: 5px 12px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  -webkit-transition-duration: 0.4s;
  transition-duration: 0.4s;
  cursor: pointer;
  background-color: white; 
  color: #008CBA; 
  border: 2px solid #008CBA;
  border-radius: 10px;
}
.set_pred:hover {
  background-color: #008CBA;
  color: white;
}
.modal-body {
    max-height: calc(100vh - 210px);
    /* overflow-y: auto; */
}
.teamlogo{
      height: 30px;
      width: 30px;
}
.red{
  color: red;
}
.green{
  color: #0eb313;
}
.match-div-master{
  display: flex;
                      flex-direction: row;
                      align-items: center;
                      justify-content: center;
}
.match-div-sub{
display: flex;
                      flex-direction: column;
                      justify-content: center;
                      align-items: center;
                      text-align: center;
}
.input-box-full{

}
.input-box-small{
    width: 40%;
    height: 34px;
    padding: 6px 12px;
    background-color: #fff;
    border: 1px solid #c2cad8;
}
.input-box-extra-small{
    width: 10%;
    height: 34px;
    padding: 6px 12px;
    background-color: #fff;
    border: 1px solid #c2cad8;
}
.modal.effect-scale.show .modal-dialog {
    transform: scale(0.8);
}
</style>


{{-- add prediction--}}
<form name="pred_add" id="pred_add" method="post" enctype="multipart/form-data" novalidate="novalidate" action="http://cms.goaly.mobi/admin/Predictionmatch/add_prediction">
{{-- <div class="modal-dialog popup" role="document" id="pop">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title popup_heading_text" id="exampleModalLabel" >CREATE PREDICTION</h5>
            <div style="margin-top:6px;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="addclass()">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        </div>
        <div class="modal-body">
            <div id="dvLoading" style="display: none;"></div>
            <!------------------------------------- ADD PREDICTION------------------------------------------------>

            <!--START OF ADD MODAL-->
            <!--ADD NEW FORM START-->
           
                <!-----------------------------------------PREDICTION NAME / GROUP NAME-------------------------------------------->

                <div class="row" style="margin-top:20px;">
                    <div class="form-group">
                        <div class="col-xs-12 text-left">
                            <label for="group_name" class="title_text">PREDICTION NAME / GROUP NAME</label>
                        </div>
                        <div class="col-xs-12 title-error-div">
                            <input type="text" name="group_name" id="group_name" class="form-control" value="">
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
                            <select id="sel_type" name="prediction_type" class="form-control valid" aria-required="true" aria-invalid="false">
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
                            <input type="datetime-local" step="1" name="prediction_start" id="prediction_start" class="input-box-small valid" value="" aria-required="true" aria-invalid="false">
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
                            <input type="datetime-local" step="1" name="prediction_end" id="prediction_end" class="input-box-small valid" value="" aria-required="true" aria-invalid="false">
                            <span id="title-error" class="help-error" style="text-align:center;"></span>
                        </div>
                    </div>
                </div>
                <!-----------------------------------------PREDICTION END TIME-------------------------------------------->



                <!---------------------------------------Prediction Match:---------------------------------------------->
                <div class="row" style="margin-top:20px;">
                    <div class="form-group">
                        <div class="col-xs-12 text-left">
                            <label for="team_title" class="title_text">PREDICTION MATCH</label>
                        </div>
                        <div class="col-xs-12 title-error-div">
                            <select id="multiple" class="form-control select2-multiple select2-hidden-accessible" multiple="" name="match[]" tabindex="-1" aria-hidden="true">
                                <option value="18156865">FC Bayern München vs Borussia Dortmund on 2022-04-23 16:30:00</option>

                                <option value="18455252">Netherlands vs Poland on 2022-06-11 00:00:00</option>
                                <option value="18455253">Wales vs Belgium on 2022-06-11 00:00:00</option>
                                <option value="18455254">Netherlands vs Wales on 2022-06-14 00:00:00</option>
                                <option value="18455255">Poland vs Belgium on 2022-06-14 00:00:00</option>
                                <option value="18518815">Liverpool vs Chelsea on 2022-05-14 00:00:00</option>
                            </select><span class="select2 select2-container select2-container--bootstrap select2-container--below" dir="ltr"><span class="selection"><span class="select2-selection select2-selection--multiple" role="combobox" aria-autocomplete="list" aria-haspopup="true" aria-expanded="false" tabindex="0">
                                        <ul class="select2-selection__rendered">
                                            <li class="select2-selection__choice" title="RB Leipzig vs FC Union Berlin on 2022-04-23 13:30:00"><span class="select2-selection__choice__remove" role="presentation">×</span>RB Leipzig vs FC Union Berlin on 2022-04-23 13:30:00</li>
                                            <li class="select2-search select2-search--inline"><input class="select2-search__field" type="search" tabindex="-1" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" role="textbox" placeholder="" style="width: 0.75em;"></li>
                                        </ul>
                                    </span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
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
            <!--ADD NEW FORM END-->
        </div>
    </div>
</div> --}}

{{-- end prediction --}}
    <!-- modal -->

    <div class="modal fade effect-scale" id="modalEditContact" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" style=" height: 714px;overflow-y: auto;width: 138%;margin-top: -63px;">
        <div class="modal-content">
            <form method="POST" action="{{route('store')}}">
                @csrf
            <div class="modal-body">
                <button type="button" class="close pos-absolute t-15 r-20" data-dismiss="modal" aria-label="Close" style="text-indent: 0;">
                    <span>X</span>
                </button>
                <h5 class="">CREATE PREDICTION</h5>
                
            </div>
            <!-----------------------------------------PREDICTION NAME / GROUP NAME-------------------------------------------->
                <div class="form-group">
                    <div class="col-xs-12 text-left">
                        <label for="group_name" class="title_text">PREDICTION NAME / GROUP NAME</label>
                    </div>
                    <div class="col-xs-12 title-error-div">
                        <input type="text" name="group_name" id="group_name" class="form-control" value="">
                        <span id="title-error" class="help-error" style="text-align:center;"></span>
                    </div>
                </div>


            <!-----------------------------------------PREDICTION NAME / GROUP NAME------------------------------------------>

             <!---------------------------------------PREDICTION TYPE---------------------------------------------->
                <div class="form-group">
                    <div class="col-xs-12 text-left">
                        <label for="prediction_type" class="title_text">PREDICTION TYPE</label>
                    </div>
                    <div class="col-xs-12 title-error-div">
                        <select id="sel_type" name="prediction_type" class="form-control valid" aria-required="true" aria-invalid="false">
                            <option value="0">select type</option>
                            <option value="weekly">weekly</option>
                            <option value="monthly">monthly </option>
                            <option value="quarterly">quarterly</option>
                        </select>
                    </div>
                </div>
            <!-----------------------------------------PREDICTION TYPE-------------------------------------------->
            <!-----------------------------------------PREDICTION START TIME-------------------------------------------->
                <div class="form-group">
                    <div class="col-xs-12 text-left">
                        <label for="game_start" class="title_text">PREDICTION START TIME</label>
                    </div>
                    <div class="col-xs-12 title-error-div">
                        <input type="datetime-local" step="1" name="prediction_start" id="prediction_start" class="input-box-small valid" value="" aria-required="true" aria-invalid="false">
                        <span id="title-error" class="help-error" style="text-align:center;"></span>
                    </div>
                </div>
            <!-----------------------------------------PREDICTION START TIME------------------------------------------>

            <!-----------------------------------------PREDICTION END TIME-------------------------------------------->
                <div class="form-group">
                    <div class="col-xs-12 text-left">
                        <label for="game_end" class="title_text">PREDICTION END TIME</label>
                    </div>
                    <div class="col-xs-12 title-error-div">
                        <input type="datetime-local" step="1" name="prediction_end" id="prediction_end" class="input-box-small valid" value="" aria-required="true" aria-invalid="false">
                        <span id="title-error" class="help-error" style="text-align:center;"></span>
                    </div>
                </div>
            <!-----------------------------------------PREDICTION END TIME-------------------------------------------->

            <!------------------------------------------------LEAGUE-------------------------------------------------->
                <div class="form-group">
                    <div class="col-xs-12 text-left">
                        <label for="prediction_type" class="title_text">LEAGUES</label>
                    </div>
                    <div class="col-xs-12 title-error-div">
                        <select id="sel_league" name="leagues" class="form-control league valid" aria-invalid="false" value="8">
                            <option value="0">select league</option>
                            <option value="8">Premier League</option>
                        </select>
                    </div>
                </div>
            <!------------------------------------------------LEAGUE-------------------------------------------------->

            <!---------------------------------------Prediction Match:---------------------------------------------->
                <div class="form-group">
                    <div class="col-xs-12 text-left">
                        <label for="team_title" class="title_text">PREDICTION MATCH</label>
                    </div>
                    <div class="col-xs-12 title-error-div">
                        <select id="multiple" class="form-control select2-multiple" multiple="multiple" name="match[]" tabindex="-1" aria-hidden="true">
                        </select>
                    </div>
                </div>
            <!-----------------------------------------Prediction Match:-------------------------------------------->

            <div class="modal-footer">
            <div class="wd-100p d-flex flex-column flex-sm-row justify-content-end">

                <button type="submit" class="btn btn-primary mg-b-5 mg-sm-b-0">Save Changes</button>
                <button type="button" class="btn btn-secondary mg-sm-l-5" data-dismiss="modal">Cancel</button>
            </div>
            </div><!-- modal-footer -->
        </form>
        </div><!-- modal-content -->
        </div><!-- modal-dialog -->
    </div>
    <!-- modal -->

<div class="container-fluid ">
    @if(Session::has('flash_message_success'))
    <p class="alert {{ Session::get('alert-class', 'alert-success') }}">
        {{ Session::get('flash_message_success') }}
    </p>
    @endif
    @if(Session::has('flash_message_error'))
    <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">
        {{ Session::get('flash_message_error') }}
    </p>
    @endif
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
        <div>
            <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                <li class="breadcrumb-item"><h5>Prediction Matches</h5></li>
            </ol>
            </nav>
        </div>
        <div>
            <a href="{{route('addprediction')}}" id="sample_editable_1_new" class="btn btn-outline-success" data-toggle="modal1" data-target="#modalEditContact"> Add New
                            </a>
        </div>
    </div>

    <table id="example2" class="table tx-center">
        <thead>
            <tr>
                <th>sl</th>
                <th>Match</th>
                <th>Group</th>
                <th>Type</th>
                <th>Start</th>
                <th>Venue</th>
                <th>Active</th>
                <th>Status</th>
                <th>Actions</th>
                <th>Set Answer</th>
            </tr>
        </thead>
        <tbody>
            @if(isset($allCompetitions))
            @foreach($allCompetitions as $Competitions)

                <tr id="example{{$Competitions['id']}}">
                    <td> {{$Competitions['id']}} </td>
                    <td style="width:13%">
                        <img src="{{$Competitions['home_team_logo']}}" alt="Category Image"  height="30"> 
                        VS
                        <img src="{{$Competitions['away_team_logo']}}" alt="Category Image"  height="30">
                    </td>
                    <td> {{$Competitions['group_name']}}</td>
                    <td> {{$Competitions['prediction_type']}}</td>
                    <td> {{$Competitions['match_start_time']}}</td>
                    <td> {{$Competitions['venue']}}</td>
                    <td  > 
                    @if($Competitions['is_active']==0)
                    <label class="statusLbl">
                        <div data-toggle="toggle" class="toggle btn btn-default off" style="width: 0px; height: 0px;" pred_id="$Competitions['id']" togg_status="0">
                            <div class="toggle-group">
                                <label class="btn btn-default active toggle-off">Off</label>
                                <span class="toggle-handle btn btn-default" pred_id ="$Competitions['id']" ></span>
                            </div>
                        </div>
                    </label>
                    @else
                    <label class="statusLbl">
                        <div data-toggle="toggle" class="toggle btn btn-sm btn-primary" style="width: 0px; height: 0px;" pred_id="$Competitions['id']" togg_status="1">
                            <div class="toggle-group">
                                <label class="btn btn-sm btn-primary toggle-on">On</label>
                                <span class="toggle-handle btn btn-default"></span>
                            </div>
                        </div>
                    </label>
                    @endif
                        </td>
                    <td>
                        @if($Competitions['is_active']==1)
                        <i class='fa fa-circle green' aria-hidden='true'></i>
                         @else
                         <i class='fa fa-circle red' aria-hidden='true'></i>(Reward Sent)
                        @endif  
                    </td>
                    <td>
                        <a href="{{url('/admin/prediction/edit/'.$Competitions['id'])}}" class="btn btn-info btn-sm " pred-id="{{$Competitions['id']}}>
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                        <a href="javascript:void(0);" class="btn btn-danger btn-sm" ><i class="fas fa-trash-alt prediction_delete" pred-id="{{$Competitions['id']}}"></i></a> 
                        </a>
                    </td>
                    <td><button id='set_pred' class='set_pred' pred_id="{$Competitions['id']}}">
                    <a href="" class="btnlink">Set</a>
                </button></td>
                </tr>
            @endforeach
            @endif
        </tbody>
    </table>
</div>
<script>
$(document).ready(function() {
    $('#matches_list').DataTable();
} );
$(".league").change(function()
{
   var leagueid=$(this).val();
//    console.log(leagueid);
   var baseurl= window.location.origin;
    $.ajax({
            type:'GET',
            url:baseurl+'/admin/Predictionmatch/'+leagueid,
            dataType:"json",
            data:{
                id:leagueid
            },
            success: function(data){
                console.log(data);
                var len = data.length;
                $("#multiple").empty();
                // $("#sel_match").append("<option value='0' readonly>Please select a match</option>");
                for( var i = 0; i<len; i++){
                    var id = data[i]['id'];
                    var date_time = data[i]['date_time'];
                    var homeTeam = JSON.parse(data[i]['homeTeam']);
                    var awayTeam = JSON.parse(data[i]['awayTeam']);
                    var name = homeTeam.name+" vs "+awayTeam.name+" on "+
                                date_time;
                    $("#multiple").append("<option value='"+id+"'>"+name+"</option>");
                  }
            }
    });
});

</script>
<!-- <script type="text/javascript"> -->

<!--  </script> -->

@endsection
