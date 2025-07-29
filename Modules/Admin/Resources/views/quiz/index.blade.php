@extends('admin.layout.admin_template')

@section('admin_content')
<style>
  .quiz-img {
    width: 100px;
    height: 100px;
    object-fit: cover;
    border-radius: 50%;
    border: 3px solid #28a745; /* Optional: green border */
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
  }
</style>

<body>

  <form class="frm" action="{{ route('quiz.insert') }}"  method="post" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="other">

      <div class="input-box">
        <label>Question:<span class="tx-danger">*</span></label><br>
        <input type="text" class="input-text" id="question_id" name="question" value="" /><br>
        <div class="invalid-feedback mg-b-10">This is required</div>
        @error('question')                        
        <span class="errorMsg text-danger">{{ $message }}</span>  <!-- Error message in red -->
        @enderror
      </div>

      <div class="input-box">
        <label>Option A:<span class="tx-danger">*</span></label><br>
        <input type="text" class="input-text" id="question_id" name="option_a" value="" /><br>
        <div class="invalid-feedback mg-b-10">This is required</div>
        @error('option_a')                        
        <span class="errorMsg text-danger">{{ $message }}</span>  <!-- Error message in red -->
        @enderror
      </div> 

      <div class="input-box">
        <label>Option B:<span class="tx-danger">*</span></label><br>
        <input type="text" class="input-text" id="question_id" name="option_b" value="" /><br>
        <div class="invalid-feedback mg-b-10">This is required</div>
        @error('option_b')                        
        <span class="errorMsg text-danger">{{ $message }}</span>  <!-- Error message in red -->
        @enderror
      </div> 

      <div class="input-box">
        <label>Option C:</label><br>
        <input type="text" class="input-text" id="question_id" name="option_c" value="" /><br>
        @error('option_c')                        
        <span class="errorMsg text-danger">{{ $message }}</span>  <!-- Error message in red -->
        @enderror
      </div>

      <div class="input-box">
        <label>
          Correct Option:<span class="tx-danger">*</span>   
          <div class="tooltip-container">
            <i class="fas fa-info-circle"></i>
            <div class="hide">Enter a valid option: A, B, or C.</div>
          </div>                       
        </label><br>
        <input type="text" class="input-text-2" name="correct_option" value="" /><br>

        <div class="invalid-feedback mg-b-10">This is required</div>
        @error('correct_option')                        
        <span class="errorMsg text-danger">Enter Valid option A,B,C.</span>  <!-- Error message in red -->
        @enderror
      </div>

      <div class="form-group">
        <label for="image" class="d-flex align-items-center">
          <span>Question Image: 

          </label>

          <input type="file" name="image" id="image" class="form-control-file {{ $errors->has('image') ? 'is-invalid' : '' }}" value="{{ old('image') }}">

          @if($errors->has('image'))
          <span class="text-danger">{{ $errors->first('image') }}</span>
          @endif
        </div>


        <div class="sub-btn text-center">
          <input type="submit" class="btn" name="submit" value="Add">
        </div>

      </form>

      <table class="mt-5" id="question_table">
        <thead>
          <tr>
            <th>Question Image</th>
            <th>Question</th>
            <th>Option A</th>
            <th>Option B</th>
            <th>Option C</th>
            <th>Correct Option</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>

          @if(isset($values))
          @foreach($values as $value)
          <tr id="example">
                        <td>
                @if($value['image'])
                    <img src="{{ asset('images/quizImage/' . $value['image']) }}"
                         class="img-thumbnail"
                         style="width: 80px; height: 80px; object-fit: cover; border-radius: 10px;">
                @else
                    <span class="text-muted">No Image</span>
                @endif
            </td>
            <td> {{$value['question']}}</td>
            <td> {{$value['option_a']}}</td>
            <td> {{$value['option_b']}}</td>
            <td> {{$value['option_c']}}</td>
            <td> {{$value['correct_option']}}</td>
            <td>
              <a href="{{url('/admin/Quizquestion/edit/'.$value['id'])}}" class="tx-success"><i data-feather="edit-2"></i></a>
              <a href="{{url('/admin/Quizquestion/destroy/'.$value['id'])}}" class="tx-danger" data_id="{{$value['id']}}"><i data-feather="trash"></i></a>
            </td>
            @endforeach
            @endif

          </tbody>
          <tfoot>
            <tr>
              <th>Question</th>
              <th>Option A</th>
              <th>Option B</th>
              <th>Option C</th>
              <th>Correct Option</th>
              <th>Action</th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>


  </div>
</div>
</div>
<script >
  $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();  // Activate Bootstrap tooltips
  });
</script>


</body>
@endsection