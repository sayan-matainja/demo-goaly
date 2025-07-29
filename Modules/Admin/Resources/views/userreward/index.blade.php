@extends('admin.layout.admin_template')

@section('admin_content')

@php

@endphp

<div class="row" style="margin-bottom:20px; ">
    <div class="col-xs-12">
        <div class="form-group pull-right">
            <div class="col-xs-2">
            <a href="{{route('rewardadd')}}" id="sample_editable_1_new" class="btn btn-outline-success" data-toggle="modal1" data-target="#modalEditContact"> Add New
            </a>
                <!-- <button type="submit" class="btn btn-primary addbtnsub btn_show" id="btn_click" name="btn_save">Add New</button> -->
            </div>
        </div>
    </div>
</div>

<div class="box" style="border:1px solid #eee; padding:15px">

    <div class="box-header">
    </div>
    <div class="box-content">
        <!--<div class="table-responsive">-->
        <div>
            <table id="UsrTable" class="display" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <!--  <th>Serial No</th> -->
                        <!-- <th>Id</th> -->
                        <th>User_Id</th>
                        <th>User Name</th>
                        <th>User Email</th>
                        <th>Profile Picture</th>
                        <th>Reward_Id</th>
                        <th>Reward Title</th>
                        <th>Reward Image</th>
                        <th>Created On</th>
                        <th>Coin</th>
                        <th>Actions</th>
                        <!-- <th>Top</th> -->
                    </tr>
                </thead>
                <tbody>
                </tbody>
                @if(isset($all_details))
                @foreach($all_details as $all_detail)

                <tr id="example">
                    <td> {{$all_detail['user_id']}}</td>
                    <td> {{$all_detail['first_name']}}</td>
                    <td> {{$all_detail['email']}}</td>
                    <td> <img style="height:80px; width:100px; border-radius:50%;"  src= " {{asset('/images/'.$all_detail['img'])}}" ></td>
                    <td> {{$all_detail['reward_id']}}</td>
                    <td> {{$all_detail['title']}}</td>
                    <td> <img style="height:80px; width:100px; border-radius:50%;"  src= " {{asset('/images/reward/'.$all_detail['reward_image'])}}" ></td>
                    <td> {{$all_detail['date_created']}}</td>
                    <td> {{$all_detail['coins']}}</td>
                    <td>
                    @if($all_detail['is_active']==0)
                    '<div class="form-group"><select class="form-control" id="sel1" pred_id="'+full.id+'"><option value="0" selected>Pending</option><option value="1">Sent</option></select></div>
                    @else
                    <div class="form-group"><select class="form-control" id="sel1" pred_id="'+full.id+'"><option value="0">Pending</option><option value="1" selected>Sent</option></select></div>
                    @endif
                    </td>
                    @endforeach
            @endif

                </tr>
                <tfoot>
                    <tr>
                        <!-- <th>Serial No</th> -->
                        <!-- <th>Id</th> -->
                        <th>User_Id</th>
                        <th>User Name</th>
                        <th>User Email</th>
                        <th>Profile Picture</th>
                        <th>Reward_Id</th>
                        <th>Reward Title</th>
                        <th>Reward Image</th>
                        <th>Created On</th>
                        <th>Coin</th>
                        <th>Actions</th>
                        <!-- <th>Top</th> -->
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
</div>


<!-- END PAGE BAR -->
<!-- END PAGE HEADER-->

</div>
<!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->


<!-- END CONTAINER -->

<!--Add Quizset Modal show  -->
<div class="modal left fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                
                <h5 class="modal-title popup_heading_text" id="exampleModalLabel">Add User Reward</h5>
                <div style="margin-top:6px;">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            <div class="modal-body" style="height:auto">
                <div id="dvLoading" style="display: none;"></div>
                <form name="reward_add" id="reward_add" action=" " method="post" enctype="multipart/form-data">
                    <div class="box">
                        <div class="row">
                            <div class="form-group">
                                <div class="col-xs-12">

                                    <!-- It is displayed when banner image have to be choosen... -->
                                    <div class="user_profile relative" id="category-banner-image-choose">
                                        <div class="upload-banner-class" onclick="document.getElementById('inputFile_image_banner').click();"></div>
                                        <div class="image-error-div" style="text-align:center;margin-bottom:5px ; ">
                                            <label>Upload Banner Image (Wide)</label>
                                            <div id="image-error" style="text-align:center;" class="help-error"></div>
                                        </div>
                                    </div>

                                    <!-- It is displayed, After banner image choosed as well as croped... -->
                                    <div class="user_profile relative" id="category-banner-image-show" style="display: none;">
                                        <div class="edit-category-banner-image">
                                            <img src="" class="img-responsive_new" alt="" id="image_upload_preview_banner" width=100% height="100%">
                                            <div class="edit-category-banner" onclick="document.getElementById('inputFile_image_banner').click();" title="Change Banner Image"></div>
                                        </div>
                                        <div class="image-error-div" style="text-align:center;margin-bottom:5px ; ">
                                            <label>Banner Image (Wide)</label>
                                            <div id="image-error" style="text-align:center;" class="help-error"></div>
                                        </div>
                                    </div>
                                    <!-- <div class="user_profile relative">
                    <div class="profile-icon_banner">
                      <img src="/assets/image/images.png" title="Change Your Profile Image" class="img-responsive_new" alt="" id="image_upload_preview_banner" width=100% height="100%">
                    </div>
                    <div class="file-upload">
                      <label for="inputFile_image_banner" class="file-upload__label"></label>
                      <input id="inputFile_image_banner" class="file-upload__input" type="file" name="imgInpbanner" >
                    </div>
                    <div class="image-error-div" style="text-align:center;margin-bottom:5px ; ">
                      <label>Upload Banner Image</label>
                      <div id="image-error" style="text-align:center;" class="help-error"></div>
                    </div>   
                  </div> -->
                                    <input id="inputFile_image_banner" class="file-upload__input" type="file" name="imgInpbanner" style="display: none;">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <div class="col-xs-12">

                                    <!-- It is displayed when banner image have to be choosen... -->
                                    <div class="user_profile relative" id="category-image-choose" style="padding: 15px;text-align: -webkit-center;">
                                        <div class="upload-banner-class" onclick="document.getElementById('inputFile_image').click();" style="width: 200px;height: 200px; background-size: 60px 60px;"></div>
                                        <div class="image-error-div" style="text-align:center;margin-bottom:5px ; ">
                                            <label>Upload Thumbnail Image (Square)</label>
                                            <div id="image-error" style="text-align:center;" class="help-error"></div>
                                        </div>
                                    </div>
                                    <!-- It is displayed, After banner image choosed as well as croped... -->
                                    <div class="user_profile relative" id="category-image-show" style="padding: 15px;text-align: -webkit-center; display: none;">
                                        <div class="edit-category-banner-image" style="width: 200px; height: 200px;">
                                            <img src="" class="img-responsive_new" alt="" id="image_upload_preview" width=100% height="100%">
                                            <div class="edit-category-banner" onclick="document.getElementById('inputFile_image').click();" title="Change Thumbnail Image" style="height:30px;width:30px;"></div>
                                        </div>
                                        <div class="image-error-div" style="text-align:center;margin-bottom:5px ; ">
                                            <label>Thumbnail Image (Square)</label>
                                            <div id="image-error" style="text-align:center;" class="help-error"></div>
                                        </div>
                                    </div>
                                    <!-- <div class="user_profile relative">
                    <div class="profile-icon">
                      <img src="/assets/image/images.png" title="Change Your Profile Image" class="img-responsive" alt="" id="image_upload_preview">
                    </div>
                    <div class="file-upload">
                      <label for="inputFile_image" class="file-upload__label"></label>
                      <input id="inputFile_image" class="file-upload__input" type="file" name="imgInp" >
                    </div>
                    <div class="image-error-div" style="text-align:center;margin-bottom:5px ; ">
                      <label>Upload Thumbnail Image</label>
                      <div id="image-error" style="text-align:center;" class="help-error"></div>
                    </div>
                  </div> -->
                                    <input id="inputFile_image" class="file-upload__input" type="file" name="imgInp" style="display: none;">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div class="row" style="margin-top:10px;">
                            <div class="form-group">
                                <div class="col-xs-12 text-left">
                                    <label for="rewardtitle" class="title_text">Title:</label>
                                </div>
                                <div class="col-xs-12 title-error-div">
                                    <input type="text" name="rewardtitle" class="form-control" id="rewardtitle">
                                    <span id="title-error" class="help-error" style="text-align:center;"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top:10px;">
                            <div class="form-group">
                                <div class="col-xs-12 text-left">
                                    <label for="rewarddesc" class="title_text">Description:</label>
                                </div>
                                <div class="col-xs-12 title-error-div">
                                    <textarea class="form-control" name="rewarddesc" id="rewarddesc" rows="10" style="resize: none;"></textarea>
                                    <span id="title-error" class="help-error" style="text-align:center;"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top:10px;">
                            <div class="form-group">
                                <div class="col-xs-12 text-left">
                                    <label for="rewardcoin" class="title_text">Coin:</label>
                                </div>
                                <div class="col-xs-12 title-error-div">
                                    <input type="text" name="rewardcoin" class="form-control" id="rewardcoin">
                                    <span id="title-error" class="help-error" style="text-align:center;"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=" ">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="text-right">
                                    <button id="btn_subm" type="submit" class="btn btn-primary" name="btn_sub">Panding</button>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection