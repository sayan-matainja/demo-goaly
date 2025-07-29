@include('partials.header')
</head>

<body>
	<div class="">
    @include('partials.topmenubar')
		<div class="clearfix"></div>
        @include('partials.sidebar')
	  <div class="page-content mt-10">
			<div class="main-cat">
				<div style="background:#4D0053;height: 100px"></div>
			</div>
		  	<div class="clearfix"></div>

  			<div class="part">
		  		<div class="pt-title">Login</div>
		  		<img class="unite" src="{{('assets/img/slash.png')}}" alt=""/>

				<div class="col-xs-12 mt-10">
					<div class="pt-form">
						<div class="pt-input">
							<label for="pt-user">Email Address</label>
							<input type="email" name="login" placeholder="Email Address">
						</div>

						<div class="pt-input">
							<label for="pt-user">Password</label>
							<input type="password" name="password" placeholder="Password">
						</div>
					</div>
				</div>
				<div class="col-xs-6">
					<a href="" class="forgot">Forgot login details?</a>
				</div>
				<div class="col-xs-6 text-right">
					<a href="">
						<button type="submit" class="btn-sign">
							Sign in
						</button>
					</a>
				</div>
				<div class="col-xs-12">
					<div class="or-log">
						<span>or login with</span>
					</div>
				</div>
				<div class="col-xs-12 mt-10">
					<a href="#" class="btn-social fab fa-facebook-f facebook">
						&nbsp; Facebook
					</a>
				</div>
				<div class="col-xs-12 mt-10">
					<a href="#" class="btn-social fab fa-twitter twitter">
						&nbsp; Twitter
					</a>
				</div>
				<div class="col-xs-12">
					<div class="bg-grey">
						<p class="text-center">Don't have a Goaly account?</p>
						<a href="{{route('register')}}">
							<button type="button" class="btn-reg">&nbsp; Register Now</button>
						</a>
					</div>
				</div>
				<div class="clearfix"></div>
		  	</div>
	  </div>
	</div>
	@include('partials.footer')
</body>
</html>
