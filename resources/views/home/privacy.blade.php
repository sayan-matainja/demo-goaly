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

        <div class="part ml15">
        <div class="pt-title">
            {{ trans('lang.Privacy policy')}}
        </div>
        <div style="padding: 15px;">
        <center>

        <!-- check lang/en/lang file for the sentence respect to the keys ex:Privacy Notice-->

        <span style="font-weight: 700;">
            {{ trans('lang.Privacy Notice')}}
        
        </span>
   </center>
   <p style="text-align: start; margin-top: 6px; padding-left: 20px">
    {{ trans('lang.privacy_notice_desc')}}


</p>

    <ol type="1" style="text-align: start;">

    <li style ="margin-left:51px">
    {{ trans('lang.privacy_info_1')}}
    </li>
    <p></p>
    <li style ="margin-left:51px">
        {{ trans('lang.privacy_info_2')}}
    </li>
     <p></p>
     <li style ="margin-left:51px">
        {{ trans('lang.privacy_info_3')}}
    </li>
     <p></p>
     <li style ="margin-left:51px">
        {{ trans('lang.privacy_info_4')}}
    </li>
    </ol>
      
    <span style="font-weight: 700;">
        {{ trans('lang.Info_collection_use_sharing')}}
       </span>
    <p style="text-align: start; margin-left: 7px;">
        {{ trans('lang.Info_collection')}}
    </p>

    <p style="text-align: start; margin-left: 7px;">
        {{ trans('lang.use')}}
    </p>

    <p style="text-align: start; margin-left: 7px;">
        {{ trans('lang.sharing')}}
       </p>
    
     <p style="font-weight: 700; text-align: start; margin-left: 7px;">
        {{ trans('lang.Access_control_info')}}
    </p>
     <p style="text-align: start; margin-left: 7px;">
        {{ trans('lang.Access')}}
     </p>

     <ul style="text-align: start;">
       
     <li style ="margin-left:51px">
        {{ trans('lang.control_txt1')}}
       </li>
     <p></p>
     <li style ="margin-left:51px">
        {{ trans('lang.control_txt2')}}
        </li>
     <p><p>
     <li style ="margin-left:51px">
        {{ trans('lang.control_txt3')}}
       </li>
     <p></p>
     <li style ="margin-left:51px">
         {{ trans('lang.control_txt4')}}
       </li>
     </ul>

     <p style="font-weight: 700; text-align: start; margin-left: 7px;">
         {{ trans('lang.Security')}}
    </p>
     <p style="text-align: start; margin-left: 7px;">
        {{ trans('lang.Security_txt1')}}
     </p>
     <p style="text-align: start; margin-left: 7px;">
        {{ trans('lang.Security_txt2')}}
     </p>
     <p style="text-align: start; margin-left: 7px;">
        {{ trans('lang.Security_txt3')}}
     </p>
     <p style="text-align: start; margin-left: 7px; font-weight: 700">
        {{ trans('lang.privacy_Contact')}} &nbsp;
     <u>
        069 315 302
        </u>
     &nbsp;or&nbsp;
     <u>
        customer.service@linkit360.com</u>
     </p>
     </center>
</div>
</div>

     </div>

            

        </div>
    </div>
    @include('partials.footernew')

    <script>

        var translations ={
            'pleaseLogin': '{{ trans('lang.pleaseLogin') }}',
        'Login': '{{ trans('lang.Login') }}',
        'cancel': '{{ trans('lang.cancel') }}',
    };
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