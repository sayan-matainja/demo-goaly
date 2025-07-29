@extends('admin.layout.admin_template')

@section('admin_content')

<body>
@if(isset($data))
<form class="frm" action="{{route('save')}}" method="post" enctype="multipart/form-data">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<input type="hidden" name="qid" value="{{$data['id'] }}">
                <div class="other">

                  <div class="input-box">
                    <label>Question:</label><br>
                    <input type="text" class="input-text" id="question_id" name="question" value="{{$data['question']}}" /><br>
                    <span style="color:red">

                    </span>
                  </div>
                  <div class="input-box">
                    <label>Heading:</label><br>
                    <input type="text" class="input-text-1" id="heading_id" name="heading" value="{{$data['heading']}}" /><br>
                    <span style="color:red">
                    </span>
                  </div>
                  <div class="input-box">
                    <label>Type of question</label>
                    <div>
                      <input type="radio" name="type" value="1"><label style="margin-right: 5px; font-weight: 100;">Prediction</label>
                      <input type="radio" name="type" value="2" ><label style="margin-right: 5px; font-weight: 100;">Quiz (2 options)</label>
                      <input type="radio" name="type" value="3" checked="checked"><label style="margin-right: 5px; font-weight: 100;">Quiz (3 options)</label>
                    </div>
                    <span style="color:red">
                    </span>
                  </div>
                  <div class="input-box">
                    <label>Point</label><br>
                    <input type="number" class="input-text-2" name="point" value="{{$data['point']}}" /><br>
                    <span style="color:red">

                    </span>
                  </div>
                </div>
                <div class="sub-btn text-center">
                  <!-- <input type="submit" class="btn" name="submit" value="Add"> -->
                  <button id="btn_subm"  type="submit" class="btn btn-primary" name="btn_sub">SAVE</button>
                </div>
              </form>

             
            </div>
          </div>
         

        </div>
      </div>
    </div>

 @endif   
</body>
@endsection