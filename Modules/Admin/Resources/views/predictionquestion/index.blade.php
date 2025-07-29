@extends('admin.layout.admin_template')

@section('admin_content')

<body>
<form class="frm" action="{{ route('insert') }}"  method="post" enctype="multipart/form-data">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="other">

                  <div class="input-box">
                    <label>Question:</label><br>
                    <input type="text" class="input-text" id="question_id" name="question" value="" /><br>
                    <span style="color:red">
                    </span>
                  </div>
                  <div class="input-box">
                    <label>Heading:</label><br>
                    <input type="text" class="input-text-1" id="heading_id" name="heading" value="" /><br>
                    <span style="color:red">
                    </span>
                  </div>
                  <div class="input-box">
                    <label>Type of question</label>
                    <div>
                      <input type="radio" name="type" value="1"><label style="margin-right: 5px; font-weight: 100;">Prediction</label>
                      <input type="radio" name="type" value="2" checked="checked"><label style="margin-right: 5px; font-weight: 100;">Quiz (2 options)</label>
                      <input type="radio" name="type" value="3"><label style="margin-right: 5px; font-weight: 100;">Quiz (3 options)</label>
                    </div>
                    <span style="color:red">
                    </span>
                  </div>
                  <div class="input-box">
                    <label>Point</label><br>
                    <input type="number" class="input-text-2" name="point" value="" /><br>
                    <span style="color:red">

                    </span>
                  </div>
                </div>
                <div class="sub-btn text-center">
                  <input type="submit" class="btn" name="submit" value="Add">
  
                </div>
              </form>

              <table class="mt-5" id="question_table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Question</th>
                <th>Heading</th>
                <th>Points</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>

            @if(isset($values))
            @foreach($values as $value)

            <tr id="example">
                <td> {{$value['question_type']}}</td>
                <td> {{$value['question']}}</td>
                <td> {{$value['heading']}}</td>
                <td> {{$value['point']}}</td>
                <td>
                    <a href="{{url('/admin/predictionquestion/edit/'.$value['id'])}}" class="tx-success"><i data-feather="edit-2"></i></a>
                    <a href="{{url('/admin/predictionquestion/destroy/'.$value['id'])}}" class="tx-danger" data_id="{{$value['id']}}"><i data-feather="trash"></i></a>
                </td>
                @endforeach
                @endif

            </tbody>
            <tfoot>
              <tr>
                <th>ID</th>
                <th>Question</th>
                <th>Heading</th>
                <th>Points</th>
                <th>Action</th>
              </tr>
            </tfoot>
          </table>
            </div>
          </div>
         

        </div>
      </div>
    </div>

    
</body>
@endsection