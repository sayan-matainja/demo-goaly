@include('partials.header_portal')
</head>

<body  >
	<div class="">
        @include('partials.topmenubar_portal')
		<div class="clearfix"></div>
            @include('partials.sidebar_portal_new')

	  <div class="page-content mt-10">

  			<div class="part" style="position: relative;">
  				<div class="part-title" >
  					<div class="pt-title" id="title">{{ trans('lang.Your Account') }}</div>
  					<a href="{{route('edit-profile')}}" class="btn btn-purple chk" id="editBtn">
				<i class="fa fa-user" aria-hidden="true"></i>&nbsp;{{ trans('lang.Edit') }} </a>

  				</div>
		  		
		  	
		  		
				<div class="col-xs-12 mt-15 pd-0">
					<div class="col-xs-12 mt-10" style= "position: relative";>
						<div class="row">
							<div class="col-xs-6 ">
								<div class="avatar-upload">
									
									<div class="avatar-preview" id="photoProfile" style="width: 182px; height: 182px;">
			
										<img src="{{ isset($user_details['img']) && File::exists(public_path('uploads/' . $user_details['img'])) ? asset('uploads/' . $user_details['img']) : asset('assets/img/acc-sample.png') }}" alt="" style="width: 100%; height: 100%; object-fit: cover;border-radius: 100%;">
									</div>
								</div>
							</div>
							<div class="col-xs-6">
								<div class="r-coin" style="top: 0; padding: 0px 0 5px;"  >
									<i class="fas fa-coins fasco" id="pointIcn"></i>
									&nbsp;
									<span id="point" style="font-size: 30px;">{{$user_details['coins']}}</span>
									<p id="pointTxt">{{ trans('lang.Your Points') }}</p>
								</div>
								<div class="chk-reward" id>
									
									<a href="{{route('profile_contest_history')}}" class="btn btn-default cts mt-5"  id="contestHistoryBtn">
										<i class="fas fa-futbol"></i>&nbsp; {{ trans('lang.Contest History') }}
									</a>
								</div>
							</div>
						</div>
					</div>

					
					<div class="clearfix"></div>
					<div class="col-xs-6">
						<div class="pt-input">
							<label for="pt-user" id="firstNameTitle">{{ trans('lang.First Name') }}</label>
							<div class="" id="firstNameTxt">
								<h4 class="mt-10 bg-f5">{{$user_details['first_name']}}</h4>
							</div>
						</div>
					</div>
					<div class="col-xs-6">
						<div class="pt-input">
							<label for="pt-user" id="lastNameTitle">{{ trans('lang.Last Name') }}</label>
							<div class="" id="lastNameTxt">
								<h4 class="mt-10 bg-f5">{{$user_details['last_name']}}</h4>
							</div>
						</div>
					</div>
					<div class="col-xs-12 mt-10">
						<div class="pt-input">
							<label for="pt-user" id="emailTitle">{{ trans('lang.Email Address') }}</label>
							<div class="" id="emailTxt">
								<h4 class="mt-10 bg-f5">{{$user_details['email']}}</h4>
							</div>
						</div>
					</div>
					<div class="col-xs-12 mt-10">
						<div class="pt-input" id="countryTitle">
							<label for="pt-user">{{ trans('lang.Country Residence') }}</label>
							<div class="" id="countryTxt">
								<h4 class="mt-10 bg-f5">{{$user_details['country']}}</h4>
							</div>
						</div>
					</div>
					<div class="col-xs-12 mt-10">
						<div class="pt-input">
							<label for="pt-user" id="phoneNumberTitle">{{ trans('lang.Phone Number') }}</label>
							<div class="" id="phoneNumberTxt">
								<h4 class="mt-10 bg-f5">{{$user_details['msisdn']}}</h4>
							</div>
						</div>
					</div>
				</div>
				<div class="liner"></div>

				<div class="clearfix"></div>
		  	</div>
	  </div>
	</div>
	    @if(Session::has('success'))
    <script type="text/javascript">
        Swal.fire({
            title: "Success!",
            text: "{{ Session::get('success') }}",
            icon: "success",
            confirmButtonText: "Ok"
        }).then(() => {
                location.reload();// To prevent swal reappear
            });
    </script>
@endif

@if(Session::has('error'))
    <script type="text/javascript">
        Swal.fire({
            title: "Error!",
            text: "{{ Session::get('error') }}",
            icon: "error",
            confirmButtonText: "Ok"
        }).then(() => {
                location.reload();
            });
    </script>
@endif
	@include('partials.footernew')
    @stack('location')
</body>
</html>
