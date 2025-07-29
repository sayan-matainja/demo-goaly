@include('partials.header_portal')

  </head>

<body>
	<!--<div id="loader"><div id="spin"></div></div>-->

	<div class="">
        @include('partials.topmenubar_portal')

		<div class="clearfix"></div>
            @include('partials.sidebar_portal_new')

	  <div class="page-content mt-10">
			<!-- News -->
			<div class="col-xs-12 ct">
				<div class="mb-10">
					<div class="part ml15">
						<div class="pt-title">Reward</div>
						<img class="unite" src="{{('assets/img/slash.png')}}" alt="">
					</div>
					<div class="columns slide-show2">
						<div class="column col-12 col-xs-12 pd-0">
							<div class="owl-carousel owl-theme">
								<div class="item">
									<a href="{{route('detail')}}">
										<img src="{{('assets/img/ltn3.jpg')}}">
									</a>
								</div>
								<div class="item">
									<a href="{{route('detail')}}">
										<img src="{{('assets/img/ltn2.jpg')}}">
									</a>
								</div>
								<div class="item">
									<a href="{{route('detail')}}">
										<img src="{{('assets/img/ltn1.jpg')}}">
									</a>
								</div>
							</div>
						</div>
					</div>

					<div class="">
						<div class="btn-pref btn-group btn-group-justified btn-group-lg" role="group" aria-label="...">
							<div class="btn-group" role="group">
								<button type="button" id="stars" class="btn bg-3" href="#tab1" data-toggle="tab">
									Reward
								</button>
							</div>
							<div class="btn-group" role="group">
								<button type="button" id="favorites" class="btn btn-default" href="#tab2" data-toggle="tab">
									My Reward
								</button>
							</div>
						</div>

						<div class="pd-5">
							  <div class="tab-content">
								<div class="tab-pane fade in active" id="tab1">
									<div class="columns">
										<div class="column col-12 col-xs-12 pd-0">
											<div class="columns">
												<div class="col-xs-7 pd-0">
													<p><strong>Redeem your reward</strong></p>
												</div>
												<div class="col-xs-5 pd-0">
													<a href="{{route('reward_all')}}" class="pull-right text-small">Lebih Lengkap</a>
												</div>
											</div>
											<div class="owl-carousel2 owl-theme slider-popular">
                                            @foreach ($rewards as $reward)
												<div class="item">
													<a href="{{route('reward_detail')}}">
														<img src="/uploads/reward/{{isset($reward['id'])?$reward['id']:''}}/{{isset($reward['reward_image'])?$reward['reward_image']:''}}">
													</a>
													<p class="title">{{isset($reward['title'])?$reward['title']:''}}</p>
													<p class="price">{{isset($reward['coin'])?$reward['coin']:''}}</p>
												</div>
                                            @endforeach
												<!-- <div class="item">
													<a href="{{route('reward_detail')}}">
														<img src="{{('assets/img/game-reward/2.jpg')}}">
													</a>
													<p class="title">Klikfilm (1 hari... </p>
													<p class="price">750 coin</p>
												</div>
												<div class="item">
													<a href="{{route('reward_detail')}}">
														<img src="{{('assets/img/game-reward/3.jpg')}}">
													</a>
													<p class="title">TriXogo Games... </p>
													<p class="price">1200 coin</p>
												</div> -->
											</div>
										</div>
									</div>
								</div>
								<div class="tab-pane fade in" id="tab2">
									<div class="section product-details1">

                                                    @foreach ($rewards as $reward)
													<div class="media media-list">
														<a href="javascript:void(0)">
																<img src="http://demo.gemezz.mobi/assets/upload/prize_icon/35f6ea9b603875284583ed5a5dfe9726.png" width="80" height="80">

														</a>
														<div class="midea_left_block">
														<a href="javascript:void:(0)"><h5 class="gamenm">Pulsa Rp.25.000</h5></a>
														<span class="">Points to redeem: <strong>200</strong></span>
														</div>
														<div class="midea_right_block"><span class="">11-09-2018</span></div>
													</div>

													<div class="media media-list">
														<a href="javascript:void(0)">
																<img src="http://demo.gemezz.mobi/assets/upload/prize_icon/5cb5d5ab9910a8a9dd593a02f26a2a34.png" width="80" height="80">

														</a>
														<div class="midea_left_block">
														<a href="javascript:void:(0)"><h5 class="gamenm">{{$reward['title']}}</h5></a>
														<span class="">Points to redeem: <strong>{{$reward['coin']}}</strong></span>
														</div>
														<div class="midea_right_block"><span class="">{{$reward['date_created']}}</span></div>
													</div>
                                                    @endforeach
													<!-- <div class="media media-list">
														<a href="javascript:void(0)">
																<img src="http://demo.gemezz.mobi/assets/upload/prize_icon/edbd271de9ec2cc764c61a8eeb5d2ef3.png" width="80" height="80">

														</a>
														<div class="midea_left_block">
														<a href="javascript:void:(0)"><h5 class="gamenm">Pulsa Rp.50.000</h5></a>
														<span class="">Points to redeem: <strong>350</strong></span>
														</div>
														<div class="midea_right_block"><span class="">11-09-2018</span></div>
													</div> -->

													<!-- <div class="media media-list">
														<a href="javascript:void(0)">
																<img src="http://demo.gemezz.mobi/assets/upload/prize_icon/789a4261796dcd2cc527d8bd35ec10a7.png" width="80" height="80">

														</a>
														<div class="midea_left_block">
														<a href="javascript:void:(0)"><h5 class="gamenm">KFC Rp.100.000 Voucher</h5></a>
														<span class="">Points to redeem: <strong>450</strong></span>
														</div>
														<div class="midea_right_block"><span class="">06-02-2019</span></div>
													</div> -->

							    	</div>
								</div>
							  </div>
						</div>

						</div>
				</div>

		  	</div>
	  </div>
	</div>
	@include('partials.footernew')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
	<script>
		$('.owl-carousel').owlCarousel({
				loop:true,
				margin:10,
				nav:false,
				items:1
			});

		$('.owl-carousel2').owlCarousel({
			loop:true,
			margin:10,
			nav:false,
			dots:false,
			items:3
		});
	</script>
	<script>
		$(document).ready(function() {
			$(".btn-pref .btn").click(function () {
				$(".btn-pref .btn").removeClass("bg-3").addClass("btn-default");
				// $(".tab").addClass("active"); // instead of this do the below
				$(this).removeClass("btn-default").addClass("bg-3");
			});
		});
	</script>
</body>
</html>
