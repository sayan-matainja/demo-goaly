@include('partials.header_portal')
</head>
<style>
    .account-text{
        font-size: 18px;
       font-weight: bold;
       text-align: center;
    }
    .edit-profile_img{
     width: 192px;
    height: 192px;
    position: relative;
    border-radius: 100%;
    border: 2px solid #F8F8F8;
    box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);

    }
    .profile-input{
     background: white;
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid gray;
    border-radius: 4px;
    box-sizing: border-box;
    }
.submit-btn{
    background: #72227C;
    color: white;
    margin-top: 21px;
    width: 93%;
    margin-left: 11px;
    border: none;
    height: 48px;
    font-size: 16px;
    font-weight: 500;
    margin-bottom: 13px;
}




 </style>

<body>
<div class="">
        @include('partials.topmenubar_portal')
		<div class="clearfix"></div>
            @include('partials.sidebar_portal_new')

	  <div class="page-content mt-10">

  			<div class="" style="display: flex;justify-content: center;">
                <div style="margin-top:30px; width:100%">
                <div class="account-text" id="title">{{trans('lang.EDIT MY ACCOUNT')}}</div>
                
                <form action="{{ route('update-profile') }}" method="post" enctype="multipart/form-data" style="position: :relative" novalidate>
                    @csrf 
                
                 <div class="image-container">
                    <div class="avatar-upload">
                        <div class="avatar-edit">
                            <input class="input--file" name="img" type='file' id="cameraIcn" accept=".png, .jpg, .jpeg" />
                            <label for="cameraIcn"></label>
                        </div>
                        <div class="edit-profile_img">
                         <img id="photoProfile" src="{{isset($user_details['img']) && File::exists(public_path('uploads/' . $user_details['img'])) ? asset('uploads/' . $user_details['img']) : asset('assets/img/acc-sample.png') }}" alt="" style=" height: 100%; border-radius: 100%;width: 100%;">                        </div>
                    </div>
                </div>

                  <div style="margin-top: 36px" >
                    <!-- First Name Input -->
                <label for="first_name" class="col-sm-4 col-form-label" id="firstNameTitle">{{trans('lang.First Name')}}<span class="tx-danger"></span></label>
                <div class="col-sm-8">
                    <input type="text" name="first_name" id="firstNameInput" class="profile-input" value="{{ old('first_name', $user_details['first_name']) }}" required>
                    @error('first_name')
                        <span class="tooltiptext">
                            <img src="{{ asset('assets/img/orange-error-icon-0.png') }}" alt="" style="width: 22px">
                      <span class="errorMsg">{{ $message}}</span>  
                    </span>
                    @enderror
                </div>

                <!-- Last Name Input -->
                <label for="last_name" class="col-sm-4 col-form-label" id="lastNameTitle">{{trans('lang.Last Name')}}<span class="tx-danger"></span></label>
                <div class="col-sm-8">
                    <input type="text" name="last_name" id="lastNameInput" class="profile-input" value="{{ old('last_name', $user_details['last_name']) }}" required>
                    @error('last_name')
                    <span class="tooltiptext">
                        <img src="{{ asset('assets/img/orange-error-icon-0.png') }}" alt="" style="width: 22px">
                  <span class="errorMsg">{{ $message}}</span>  
                </span>
                    @enderror
                </div>

                <!-- Email Input -->
                <label for="email" class="col-sm-4 col-form-label" id="emailTitle">{{trans('lang.Email Address')}}<span class="tx-danger"></span></label>
                <div class="col-sm-8">
                    <input type="email" name="email" id="emailInput" class="profile-input" value="{{ old('email', $user_details['email']) }}" required>
                    @error('email')
                    <span class="tooltiptext">
                        <img src="{{ asset('assets/img/orange-error-icon-0.png') }}" alt="" style="width: 22px">
                  <span class="errorMsg">{{ $message}}</span>  
                </span>
                    @enderror
                </div>

           <label for="country" class="col-sm-4 col-form-label" id="countryTitle">{{trans('lang.Country Residence')}}<span class="tx-danger"></span></label>
          <div class="col-sm-8">
        <select name="country" id="countryDropdown" class="profile-input" required>
             <option value="" >select country</option >
            @foreach($countries as $country)
                <option value="{{ $country->country_name }}" {{ $country_id == $country->country_code ? 'selected' : '' }}>
                    {{ $country->country_name }}
                </option>
            @endforeach
        </select>
        @error('country')
        <span class="tooltiptext">
            <img src="{{ asset('assets/img/orange-error-icon-0.png') }}" alt="" style="width: 22px">
       <span class="errorMsg" >{{ $message}}</span>  
     </span>
  @enderror
        </div>

       <label for="msisdn" class="col-sm-4 col-form-label" id="phoneNumberTitle">{{trans('lang.Phone Number')}}<span class="tx-danger"></span></label>
        <div class="col-sm-8">
        <input type="tel" readonly style="background-color: #D3D3D3;" name="msisdn" id="phoneNumberTxt" class="profile-input" value="{{ $user_details['msisdn'] }}" required>
        @error('msisdn')
        <span class="tooltiptext">
            <img src="{{ asset('assets/img/orange-error-icon-0.png') }}" alt="" style="width: 22px">
      <span class="errorMsg">{{ $message}}</span>  
      </span>
     @enderror
        </div>


        <button type="submit" class="submit-btn" id="updateProfileBtn" >{{trans('lang.Update profile')}}</button>

                  </div>
                </form>

                </div>
             </div>
                  

            </div>
            
  				
		  		
		  	
		  		
				
					
<!-- 	<div class="col-xs-6 mt-10">
						<div class="avatar-upload">
							<div class="avatar-edit">
							<input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
							</div>
							<div class="avatar-preview">
								<div id="imagePreview" style="background-image: url('assets/img/acc-sample.png');">
								</div>
							</div>
						</div>
					</div> -->			
				



			
				<div class="col-xs-12 pd-0">
				</div>
				<div class="clearfix"></div>
		  	
	  </div>
	
     <script type="text/javascript">
function previewImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                // Set the preview image source to the selected image
                $('.edit-profile_img img').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    // Trigger the previewImage function when the file input changes
    $('input[name="img"]').on('change', function() {
        previewImage(this);
    });

    </script>

	@include('partials.footernew')
    @stack('location')
</body>
</html>
