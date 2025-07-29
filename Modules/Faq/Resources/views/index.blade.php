@extends('admin.layout.admin_template')

@section('admin_content')
<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Summernote Editor Example</title>
    <!-- include libraries(jQuery, bootstrap) -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>

    <div class="container">
        @if (Session::has('message'))

        <div class="alert alert-success mt-2">{{ Session::get('message') }}
        </div>

    @endif
        <div class="row">
            <div class="col-md-12">
                @if (isset($faqs))
                    @foreach ($faqs as $faq)
                        <div class="modal fade effect-scale" id="modalEditContact_{{$faq->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-body pd-20 pd-sm-30">
                                        <button type="button" class="close pos-absolute t-15 r-20" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <h5 class="tx-18 tx-sm-20 mg-b-20">Edit FAQ</h5>
                                        <form method=”POST” action="{{route('faq.edit')}}">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$faq->id}}">
                                            <div class="form-group">
                                                @if ($errors->has('faqtitle'))
                                                    <span class="invalid feedback"role="alert">
                                                        <div style="color: red;">{{ $errors->first('faqtitle') }}.</div>
                                                    </span>
                                                @endif
                                                <label for="faqtitle" class="col-xs-2"><strong>Question:</strong></label>
                                                <div class="col-xs-8">
                                                    <textarea class="form-control" rows="4" name="faqtitle" id="faqtitle">{{$faq->faq_question}}</textarea>
                                                </div>

                                                <div class="clearfix" style="margin-top: 30px;"></div>
                                            </div>
                                            @if ($errors->has('faqanswer'))
                                                <span class="invalid feedback"role="alert">
                                                    <div style="color: red;">{{ $errors->first('faqanswer') }}.</div>
                                                </span>
                                            @endif
                                            <label for="faqtitle" class="col-xs-2"><strong>Answer:</strong></label>
                                            <div class="col-xs-8">
                                                <textarea class="form-control" rows="4" name="faqanswer" id="summernote-{{$faq->id}}" type="text">{!! new \Illuminate\Support\HtmlString($faq->faq_answer) !!}
                                                </textarea>
                                            </div>


                                    <div class="modal-footer">

                                        <button type="submit" class="btn btn-primary mg-b-5 mg-sm-b-0">Save Changes</button>
                                        <button type="button" class="btn btn-secondary mg-sm-l-5" data-dismiss="modal">Cancel</button>
                                    </div>
                                </form>
                                    </div><!-- modal-footer -->
                                </div><!-- modal-content -->
                            </div><!-- modal-dialog -->
                        </div>
                    @endforeach
                @endif
                <div class="card-body">
                    <form method="POST" action="{{route('faq.submit')}}">
                        @csrf
                        <div class="form-group">
                            @if ($errors->has('faqtitle'))
                                <span class="invalid feedback"role="alert">
                                    <div style="color: red;">{{ $errors->first('faqtitle') }}.</div>
                                </span>
                            @endif
                            <label for="faqtitle" class="col-xs-2"><strong>Question:</strong></label>
                            <div class="col-xs-8">
                                <textarea class="form-control" rows="4" name="faqtitle" id="faqtitle"></textarea>
                            </div>

                            <div class="clearfix" style="margin-top: 30px;"></div>
                        </div>
                        @if ($errors->has('faqanswer'))
                            <span class="invalid feedback"role="alert">
                                <div style="color: red;">{{ $errors->first('faqanswer') }}.</div>
                            </span>
                        @endif
                        <label for="faqtitle" class="col-xs-2"><strong>Answer:</strong></label>
                        <div class="col-xs-8">
                            <textarea class="form-control" rows="4" name="faqanswer" id="summernote"></textarea>
                        </div>
                        <button type=”submit” class="btn btn-danger btn-block">Submit</button>
                    </form>

                </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Question</th>
                                <th class="text-center">Answer</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (isset($faqs))
                                @php $c=0; @endphp
                            @foreach ($faqs as $faq)
                            @php $c=$c+1; @endphp
                            <tr>
                                <td>{{$c}}</td>
                                <td>{{$faq->faq_question}}</td>
                                <td style="text-align:justify;">{!!$faq->faq_answer !!}</td>
                                <td style="padding-left:0; padding-right:0;">
                                <button id="sample_editable_1_new" class="btn btn-outline-success" data-toggle="modal" data-target="#modalEditContact_{{$faq->id}}"> <span class="glyphicon glyphicon-pencil material-icons" >mode_edit</span>
                                </button>
                                <!-- <button class="btn btn-primary btn-xs btn_edit btn-faq" data-title="Edit" data-target="#modalEditContact" name="btn1_edit" edit_faq_id="20" style="margin-top:20px; margin-bottom:20px;"></button> -->
                                <a href="{{route('faq.delete',[$faq->id])}}">
                                <button  class="btn btn-danger btn-xs btn1_delete btn-faq" data-title="Delete" data-toggle="modal" data-target="#delete" delete_faq_id="20"><span class="glyphicon glyphicon-trash material-icons">delete_outline</span></button></a></td>
                            </tr>
                            @endforeach
                            @endif

                        </tbody>
                    </table>
            </div>

        </div>
    </div>
</body>
<!-- summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

<script type="text/javascript">
   $(document).ready(function() {
      @if (isset($faqs))
          @foreach ($faqs as $faq)
              $('#summernote-{{$faq->id}}').summernote({
                  height: 200,
                  fontSizes: [ '8', '9', '10', '11', '12', '14', '18', '24', '36'],
                  styleTags: ['p', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'div', 'pre', 'code'],
                  fontNames: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New', 'Merriweather'],
                  toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['color', ['color']],
                    ['fontsize', ['fontsize']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                    ['insert', ['link', 'picture', 'hr']],
                    ['view', ['fullscreen', 'codeview']]
                 ],

              });
          @endforeach
      @endif

      $('#summernote').summernote({
         fontSizes: [ '8', '9', '10', '11', '12', '14', '18', '24', '36'],
         height: 200,
         styleTags: ['p', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'div', 'pre', 'code'],
         fontNames: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New', 'Merriweather'],
         toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'italic', 'underline', 'clear']],
            ['color', ['color']],
            ['fontsize', ['fontsize']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
            ['insert', ['link', 'picture', 'hr']],
            ['view', ['fullscreen', 'codeview']]
         ],
      });

      // Other scripts
   });
</script>




</html>

@endsection
