@include('partials.header')
</head>

<body>
    <div class="">
        @include('partials.topmenubar_portal')
        <div class="clearfix"></div>
        @include('partials.sidebar_portal_new')
        <div class="page-content mt-10">
            <!-- News -->
            <div class="col-xs-12 ct" style="margin-top:-8px">
                <div class="mb-10">
                    <div class="part ml15">
                        <div class="pt-title" id="faqTitle">
                            FAQ
                            
                        </div>
                        <!-- <img class="unite" src="{{('assets/img/slash.png')}}" alt=""> -->
                    </div>
                    <div class="pd-5">
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            @if (isset($faqs))
                            @php $c = 0; @endphp
                            @foreach ($faqs as $faq)
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="heading{{ $c }}">
                                    <h4 class="panel-title">
                                        <a role="button" data-toggle="collapse" data-parent="#accordion"
                                            href="#collapse{{ $c }}" aria-expanded="false"
                                            aria-controls="collapse{{ $c }}" >
                                            <!-- <i class="more-less glyphicon glyphicon-plus"></i> -->
                                            <span id="question">
                                            {{$faq->faq_question}}
                                            </span>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapse{{ $c }}" class="panel-collapse collapse" role="tabpanel"
                                    aria-labelledby="heading{{ $c }}">
                                    <div class="panel-body">
                                        <span id="answer">
                                        {!! new \Illuminate\Support\HtmlString($faq->faq_answer) !!}
                                    </span>
                                    </div>

                                </div>
                            </div>
                            @php $c++; @endphp
                            @endforeach
                            @endif
                        </div>
                    </div>
                    <!-- faq end -->
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    @include('partials.footernew')

    <script>
    function toggleIcon(e) {
        $(e.target)
            .prev('.panel-heading')
            .find(".more-less")
            .toggleClass('glyphicon-plus glyphicon-minus');
    }
    $('.panel-group').on('hidden.bs.collapse', toggleIcon);
    $('.panel-group').on('shown.bs.collapse', toggleIcon);
    </script>

</body>

</html>