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
    {{ trans('lang.terms') }}
</div>
<div class="pd-5">
    <div style="padding: 15px;">
        <h1 helvetica="" neue",="" helvetica,="" arial,="" sans-serif;"="" style="margin-top: 25px; margin-bottom: 15px; font-weight: 700; line-height: 1.4; color: rgb(0, 0, 0); font-size: 2.125rem; padding-bottom: 0px;">
            <span style="font-family: Arial;">
                {{ trans('lang.terms') }}
            </span>
        </h1>

        <h2 id="terms" style="color: rgb(0, 0, 0);"></h2>

        <h5 style="color: rgb(0, 0, 0); margin-top: 0px;"><span style="font-family: Arial;">
                <br>
            </span>
            <span style="font-family: Arial;">
                {{ trans('lang.read_carefully') }}

            </span>
        </h5>
        <h1 helvetica="" neue",="" helvetica,="" arial,="" sans-serif;"="" style="margin-top: 25px; margin-bottom: 15px; font-weight: 700; line-height: 1.4; color: rgb(0, 0, 0); font-size: 2.125rem; padding-bottom: 0px;">
            <span style="font-family: Arial;">
                {{ trans('lang.interpretation_definitions') }}
            </span>
        </h1>
        <h4 style="font-weight: 700; line-height: inherit; color: rgb(0, 0, 0); margin-right: 0px; margin-left: 0px; font-size: 1.65rem; padding-bottom: 0px;">
            <span style="font-family: Arial;">
                {{ trans('lang.interpretation') }}
            </span>
        </h4>
        <h2 style="color: rgb(0, 0, 0);"></h2>
        <h5 style="color: rgb(0, 0, 0); margin-top: 0px;">
            <span style="font-family: Arial;">
                {{ trans('lang.capitalized_words_meaning') }}
            </span></h5>

        <h2 helvetica="" neue",="" helvetica,="" arial,="" sans-serif;"="" style="font-weight: 700; line-height: inherit; color: rgb(0, 0, 0); margin-right: 0px; margin-left: 0px; font-size: 1.65rem; padding-bottom: 0px;">
            <span style="font-family: Arial;">
                {{ trans('lang.definitions') }}
            </span></h2>

        <h2 style="color: rgb(0, 0, 0);"></h2>

        <h5 style="color: rgb(0, 0, 0); margin-top: 0px;"><span style="font-family: Arial;">
                {{ trans('lang.purposes') }}:
            </span>
            <br>
        </h5>

        <h2 id="terms" style="color: rgb(0, 0, 0);">
            <ul style="font-size: 14px; margin-left: 43px">
                <li><span style="font-weight: 700;">
                        <span style="font-family: Arial;">
                            {{ trans('lang.affiliate') }}
                        </span>
                        <span style="font-family: Arial;">
                            &nbsp;
                        </span>
                    </span>
                    <span style="font-family: Arial;">
                        {{ trans('lang.control_entity') }}
                    </span>
                </li>
                <li>
                    <span style="font-weight: 700;">
                        <span style="font-family: Arial;">
                            {{ trans('lang.country') }}
                        </span>
                        <span style="font-family: Arial;">
                            &nbsp;
                        </span>
                    </span>
                    <span style="font-family: Arial;">
                        {{ trans('lang.refers_to') }}
                    </span>
                </li>
                <li>
                    <span style="font-weight: 700;">
                        <span style="font-family: Arial;">
                            {{ trans('lang.company') }}
                        </span>
                        <span style="font-family: Arial;">
                            &nbsp;
                        </span>
                    </span>
                    <span style="font-family: Arial;">
                        {{ trans('lang.company_info') }}
                    </span>
                    <br>
                </li>
                <li>
                    <span style="font-weight: 700;">
                        <span style="font-family: Arial;">
                            {{ trans('lang.device') }}
                        </span>
                        <span style="font-family: Arial;">
                            &nbsp;
                        </span>
                    </span>
                    <span style="font-family: Arial;">
                        {{ trans('lang.access_service_device') }}
                    </span>
                </li>
                <li><span style="font-weight: 700;">
                        <span style="font-family: Arial;">
                            {{ trans('lang.service') }}</span>
                        <span style="font-family: Arial;">
                            &nbsp;
                        </span>
                    </span>
<span style="font-family: Arial;">
  {{ trans('lang.refers_to_website')}}
  </span>
</li>
<li><span style="font-family: Arial;">
<span style="font-weight: 700;">
  {{ trans('lang.terms')}}
  </span>
</span>
<span style="font-family: Arial;">
&nbsp;
</span>
<span style="font-family: Arial;">
   {{ trans('lang.terms_meaning')}}
 
</span>
<span style="font-family: Arial;">
&nbsp;
</span>
<a href="https://www.termsfeed.com/terms-conditions-generator/" target="_blank" style="transition: color 0.3s ease 0s;">
<span style="font-family: Arial;">
  {{ trans('lang.generator')}}
  </span>
</a>
<span style="font-family: Arial;">.</span>
</li>
<li>
  <span style="font-family: Arial;">
  <span style="font-weight: 700;">
    {{ trans('lang.third_party_social_media_service')}}
    </span>
</span>
<span style="font-family: Arial;">
&nbsp;
</span>
<span style="font-family: Arial;">
  {{ trans('lang.third_party_service_meaning')}}
</span>
</li>
<li>
  <span style="font-family: Arial;">
  <span style="font-weight: 700;">
    {{ trans('lang.website')}}
    </span>
</span>
<span style="font-family: Arial;">
&nbsp;
</span>
<span style="font-family: Arial;">
  {{ trans('lang.refers_to_goaly')}}
  </span>
<span style="font-family: Arial;">
&nbsp;
</span>
<span style="transition: color 0.3s ease 0s; font-family: Arial;">
<a href="http://goaly.smart.com.kh/" rel="external nofollow noopener" target="_blank" style="transition: color 0.3s ease 0s;">http://goaly.smart.com.kh/</a>
</span>
</li>
<li>
  <span style="font-weight: 700;">
  <span style="font-family: Arial;">
    {{ trans('lang.you')}}
    </span>
  <span style="font-family: Arial;">
  &nbsp;
</span>
</span>
<span style="font-family: Arial;">
  {{ trans('lang.user_definition')}}
</span>
</li>
</ul>
</h2>

<h1 helvetica="" neue",="" helvetica,="" arial,="" sans-serif;"="" style="margin-top: 25px; margin-bottom: 15px; font-weight: 700; line-height: 1.4; color: rgb(0, 0, 0); font-size: 2.125rem; padding-bottom: 0px;"><span style="font-family: Arial;">
  {{ trans('lang.acknowledgment')}}
 </span>
 </h1>

 <h2 style="color: rgb(0, 0, 0);"></h2>

 <h5 style="color: rgb(0, 0, 0); margin-top: 0px;">
 <span style="font-family: Arial;">
  {{ trans('lang.terms_governing_service')}}
</span>
<br>
<span style="font-family: Arial;">
  {{ trans('lang.access_conditions')}}
</span>
<br>
<span style="font-family: Arial;">
  {{ trans('lang.agree_conditions')}}
</span>
<br>
<span style="font-family: Arial;">
  {{ trans('lang.represent_over_18')}}
 
</span>
<br>
<span style="font-family: Arial;">
  {{ trans('lang.privacy_policy_conditions')}}
</span>
</h5>
<h1 helvetica="" neue",="" helvetica,="" arial,="" sans-serif;"="" style="margin-top: 25px; margin-bottom: 15px; font-weight: 700; line-height: 1.4; color: rgb(0, 0, 0); font-size: 2.125rem; padding-bottom: 0px;"><span style="font-family: Arial;">
  {{ trans('lang.links_other_websites')}}
</span>
</h1>
<h2 style="color: rgb(0, 0, 0);"></h2>
<h5 style="color: rgb(0, 0, 0); margin-top: 0px;">
<span style="font-family: Arial;">
  {{ trans('lang.service_links_third_party')}}
</span>
<br>
<span style="font-family: Arial;">
  {{ trans('lang.company_no_control')}}
  </span>
  <br>
  <span style="font-family: Arial;">
    {{ trans('lang.read_third_party_policies')}}
 </span>
 </h5>

 <h1 helvetica="" neue",="" helvetica,="" arial,="" sans-serif;"="" style="margin-top: 25px; margin-bottom: 15px; font-weight: 700; line-height: 1.4; color: rgb(0, 0, 0); font-size: 2.125rem; padding-bottom: 0px;">
 <span style="font-family: Arial;">
  {{ trans('lang.termination')}}
  </span>
</h1>

<h2 style="color: rgb(0, 0, 0);"></h2>

<h5 style="color: rgb(0, 0, 0); margin-top: 0px;">
<span style="font-family: Arial;">
  {{ trans('lang.terminate_suspend_access')}}
</span>
<br>
<span style="font-family: Arial;">
  {{ trans('lang.termination_consequence')}}
</span></h5>

<h1 helvetica="" neue",="" helvetica,="" arial,="" sans-serif;"="" style="margin-top: 25px; margin-bottom: 15px; font-weight: 700; line-height: 1.4; color: rgb(0, 0, 0); font-size: 2.125rem; padding-bottom: 0px;">
<span style="font-family: Arial;">
  {{ trans('lang.limitation_of_liability')}}
  </span>
</h1>

<h2 style="color: rgb(0, 0, 0);">
  
</h2>

<h5 style="color: rgb(0, 0, 0); margin-top: 0px;">
<span style="font-family: Arial;">
  {{ trans('lang.service_provided_as_is')}}

  </span>
  <br>
  <span style="font-family: Arial;">
    {{ trans('lang.additional_disclaimers')}}

  
  
  </span>
  <br><span style="font-family: Arial;">
    {{ trans('lang.jurisdiction_limitations')}}
  </span>
   </h5>

   <h1 helvetica="" neue",="" helvetica,="" arial,="" sans-serif;"=""
    style="margin-top: 25px; margin-bottom: 15px; font-weight: 700; line-height: 1.4; 
  color: rgb(0, 0, 0); font-size: 2.125rem; padding-bottom: 0px;">
   <span style="font-family: Arial;">
    {{ trans('lang.governing_law')}}
    </span></h1>

   <h2 style="color: rgb(0, 0, 0);"></h2>

   <h5 style="color: rgb(0, 0, 0); margin-top: 0px;">
   <span style="font-family: Arial;">
    {{ trans('lang.country_laws_apply')}}
   
  </span>
   </h5>
   <h1 helvetica="" neue",="" helvetica,="" arial,="" sans-serif;"="" 
   style="margin-top: 25px; margin-bottom: 15px; font-weight: 700; line-height: 1.4; 
   color: rgb(0, 0, 0); font-size: 2.125rem; padding-bottom: 0px;">
   <span style="font-family: Arial;">
     {{ trans('lang.disputes_resolution')}}
   
</span>
</h1>
<h2 style="color: rgb(0, 0, 0);"></h2>
<h5 style="color: rgb(0, 0, 0); margin-top: 0px;">
<span style="font-family: Arial;">
  {{ trans('lang.resolve_dispute_informally')}}

</span>
</h5>

<h1 helvetica="" neue",="" helvetica,="" arial,="" sans-serif;"="" 
style="margin-top: 25px; margin-bottom: 15px; font-weight: 700; line-height: 1.4;
 color: rgb(0, 0, 0); font-size: 2.125rem; padding-bottom: 0px;">
<span style="font-family: Arial;">
  {{ trans('lang.eu_users')}}
  </span>
</h1>
<h2 style="color: rgb(0, 0, 0);"></h2>
<h5 style="color: rgb(0, 0, 0); margin-top: 0px;">
<span style="font-family: Arial;">
  {{ trans('lang.eu_resident_law')}}
</span>
</h5>

<h1 helvetica="" neue",="" helvetica,="" arial,="" sans-serif;"="" 
style="margin-top: 25px; margin-bottom: 15px; font-weight: 700; line-height: 1.4;
 color: rgb(0, 0, 0); font-size: 2.125rem; padding-bottom: 0px;">
 <span style="font-family: Arial;">
  {{ trans('lang.us_legal_compliance')}}
  
</span>
</h1>
<h2 style="color: rgb(0, 0, 0);"></h2>
<h5 style="color: rgb(0, 0, 0); margin-top: 0px;">
    <span style="font-family: Arial;">
        {{ trans('lang.us_government_compliance') }}
    </span>
</h5>

<h1 helvetica="" neue",="" helvetica,="" arial,="" sans-serif;"=""
    style="margin-top: 25px; margin-bottom: 15px; font-weight: 700; line-height: 1.4;
    color: rgb(0, 0, 0); font-size: 2.125rem; padding-bottom: 0px;">
    <span style="font-family: Arial;">
        {{ trans('lang.severability_and_waiver') }}
    </span>
</h1>
<h2 helvetica="" neue",="" helvetica,="" arial,="" sans-serif;"=""
    style="font-weight: 700; line-height: inherit; color: rgb(0, 0, 0);
    margin-right: 0px; margin-left: 0px; font-size: 1.65rem; padding-bottom: 0px;">
    <span style="font-family: Arial;">{{ trans('lang.severability') }}
    </span></h2>

<h2 style="color: rgb(0, 0, 0);"></h2>
<h5 style="color: rgb(0, 0, 0); margin-top: 0px;">
    <span style="font-family: Arial;">
        {{ trans('lang.unenforceable_provisions') }}
    </span>
</h5>
<h2 helvetica="" neue",="" helvetica,="" arial,="" sans-serif;"=""
    style="font-weight: 700; line-height: inherit; color: rgb(0, 0, 0);
    margin-right: 0px; margin-left: 0px; font-size: 1.65rem; padding-bottom: 0px;">
    <span style="font-family: Arial;">
        {{ trans('lang.waiver_of_breach') }}
    </span>
</h2>
<h2 style="color: rgb(0, 0, 0);"></h2>
<h5 style="color: rgb(0, 0, 0); margin-top: 0px;">
    <span style="font-family: Arial;">
        {{ trans('lang.waiver_of_breach_effect') }}
    </span>
</h5>

<h1 helvetica="" neue",="" helvetica,="" arial,="" sans-serif;"=""
    style="margin-top: 25px; margin-bottom: 15px; font-weight: 700; line-height: 1.4;
    color: rgb(0, 0, 0); font-size: 2.125rem; padding-bottom: 0px;">
    <span style="font-family: Arial;">
        {{ trans('lang.translation_interpretation') }}
    </span>
</h1>
<h2 style="color: rgb(0, 0, 0);"></h2>
<h5 style="color: rgb(0, 0, 0); margin-top: 0px;">
    <span style="font-family: Arial;">
        {{ trans('lang.english_text_prevalent') }}
    </span>
</h5>

<h1 helvetica="" neue",="" helvetica,="" arial,="" sans-serif;"=""
    style="margin-top: 25px; margin-bottom: 15px; font-weight: 700; line-height: 1.4;
    color: rgb(0, 0, 0); font-size: 2.125rem; padding-bottom: 0px;">
    <span style="font-family: Arial;">
        {{ trans('lang.changes_to_terms') }}
    </span>
</h1>

<h2 style="color: rgb(0, 0, 0);"></h2>

<h5 style="color: rgb(0, 0, 0); margin-top: 0px;">
    <span style="font-family: Arial;">
        {{ trans('lang.sole_discretion_modify_terms') }}
        <br>
    </span>
    <span style="font-family: Arial;">
        {{ trans('lang.accept_revised_terms') }}
    </span>
</h5>

<h1 helvetica="" neue",="" helvetica,="" arial,="" sans-serif;"=""
    style="margin-top: 25px; margin-bottom: 15px; font-weight: 700; line-height: 1.4;
     color: rgb(0, 0, 0); font-size: 2.125rem; padding-bottom: 0px;">
    <span style="font-family: Arial;">
        {{ trans('lang.contact_us') }}
    </span>
</h1>
<h5 style="color: rgb(0, 0, 0); margin-top: 0px;">
    <span style="font-family: Arial;">
        {{ trans('lang.questions_about_terms') }}
    </span>
</h5>
<h5 style="color: rgb(0, 0, 0);">
    <span style="font-family: Arial;">
        <span style="font-weight: 700;">
            {{ trans('lang.by_email') }}
        </span>:
    </span>
    <span style="font-family: Arial;">&nbsp;</span>
<span style="font-family: Arial;">customer.service@linkit360.com</span>
<br>
</h5>
<h5 style="color: rgb(0, 0, 0);">
    <span style="font-family: Arial;">
        <span style="font-weight: 700;">
            {{ trans('lang.by_phone_number') }}
        </span>:
    </span>
  </span>: 069 315 302</span>
</h5>
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