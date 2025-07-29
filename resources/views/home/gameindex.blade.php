@include('partials.header_portal')
</head>

<body>
    <div class="">
        @include('partials.topmenubar_portal')
        <div class="clearfix"></div>
        @include('partials.sidebar_portal_new')
        <div class="page-content mt-10">

        <div class="col-xs-12 ct" style="margin-top:-8px">

        <div class="mb-10">
@php
print_r($response);
@endphp
        <div class="part ml15">
        <div class="pt-title">
           Game Index
        </div>

</div>

     </div>

            

        </div>
    </div>
    @include('partials.footernew')


</body>

</html>