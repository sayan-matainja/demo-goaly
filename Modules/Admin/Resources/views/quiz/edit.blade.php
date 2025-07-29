@extends('admin.layout.admin_template')

@section('admin_content')

<body>
  @if(isset($data))
  <form class="frm" action="{{route('quiz.save')}}" method="post" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="qid" value="{{$data['id'] }}">
    <div class="other">

      <div class="input-box">
        <label>Question:<span class="tx-danger">*</span></label><br>
        <input type="text" class="input-text" id="question_id" name="question" value="{{$data['question']}}" /><br>
        <div class="invalid-feedback mg-b-10">This is required</div>
        @error('question')                        
        <span class="errorMsg text-danger">{{ $message }}</span>  <!-- Error message in red -->
        @enderror
      </div>

      <div class="input-box">
        <label>Option A:<span class="tx-danger">*</span></label><br>
        <input type="text" class="input-text" id="question_id" name="option_a" value="{{$data['option_a']}}" /><br>
        <div class="invalid-feedback mg-b-10">This is required</div>
        @error('option_a')                        
        <span class="errorMsg text-danger">{{ $message }}</span>  <!-- Error message in red -->
        @enderror
      </div> 

      <div class="input-box">
        <label>Option B:<span class="tx-danger">*</span></label><br>
        <input type="text" class="input-text" id="question_id" name="option_b" value="{{$data['option_b']}}" /><br>
        <div class="invalid-feedback mg-b-10">This is required</div>
        @error('option_b')                        
        <span class="errorMsg text-danger">{{ $message }}</span>  <!-- Error message in red -->
        @enderror
      </div> 

      <div class="input-box">
        <label>Option C:</label><br>
        <input type="text" class="input-text" id="question_id" name="option_c" value="{{$data['option_c']}}" /><br>
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
        <input type="text" class="input-text-2" name="correct_option" value="{{$data['correct_option']}}" /><br>

        <div class="invalid-feedback mg-b-10">This is required</div>
        @error('correct_option')                        
        <span class="errorMsg text-danger">Enter Valid option A,B,C.</span>  <!-- Error message in red -->
        @enderror
      </div>

      <div class="form-group">
        <label for="image" class="d-flex align-items-center">
          <span>Question Image: 

          </label>

          <input type="file" name="image" id="image" class="form-control-file {{ $errors->has('image') ? 'is-invalid' : '' }}" value="{{$data['image']}}">
          
          @if($errors->has('image'))
          <span class="text-danger">{{ $errors->first('image') }}</span>
          @endif
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