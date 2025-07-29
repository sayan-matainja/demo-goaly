

@include('partials.header')
</head>

<body>
    <div class="">
        @include('partials.topmenubar_portal')
        <div class="clearfix"></div>
        @include('partials.sidebar_portal_new')
        <div class="page-content container-fluid">
        	<div class="bwrapper">
        		<div class="container-fluid">
	        			<div class="text-center">
	        				<h4 class="mt-2 mb-2"><strong>{{ trans('lang.Choose Subscribe')}}</strong></h4>
	        			</div>
	        			<div class="alert text-center" style="background-color: rgb(229, 229, 229);">{{ trans('lang.Subscribe to compete')}}
	        			</div>
        				<div class="mb-2">
        					<input type="hidden" name="msisdn" value="{{$msisdn??''}}">
        					<label class="btn radio-subscribe btn-default d-block text-left"><input class="" type="radio" name="options" id="option1" value="daily"> {{ trans('lang.Daily Subscription')}}<span class="float-right"><strong>109ks</strong>/day</span>
        					</label>
        				</div>
        				<div class="mb-2">
        					<label class="btn radio-subscribe btn-default d-block text-left"><input class="" type="radio" name="options" id="option2" value="weekly"> {{ trans('lang.Weekly Subscription')}}<span class="float-right"><strong>649ks</strong>/week</span>
        					</label>
        				</div>
        					<button onclick="subscribe()"type="button" class="btn bg-green p-2 w-100 my-2 text-white shadow" style="font-size: 12pt;"><strong>{{ trans('lang.Subscribe')}}</strong>
        					</button>
        				</div>
        			</div>
        	</div>
    </div>
@include('partials.footernew')
<script type="">
    function subscribe() {
        const msisdn = $('input[name="msisdn"]').val();
        const type = $('input[name="options"]:checked').val();
 		if(type=='daily'){
            
	        // window.location.href="http://149.129.252.221:8028/app/api/mytel/wap.php?type=reg&service=goalydaily&msisdn="+msisdn;
	       }else{
	        // window.location.href="http://149.129.252.221:8028/app/api/mytel/wap.php?type=reg&service=goalyweekly&msisdn="+msisdn;
       }
    }



</script>
    

</body>

</html>