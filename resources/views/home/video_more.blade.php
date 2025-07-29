@include('partials.header')
<style>
	.swiper-pagination-bullet {
      width: 20px;
      height: 20px;
      text-align: center;
      line-height: 20px;
      font-size: 12px;
      color:#000;
      opacity: 1;
      background: rgba(0,0,0,0.2);
    }
    .swiper-pagination-bullet-active {
      color:#fff;
      background: #4D0053;
    }

</style>
  </head>

<body>
	<div class="">
	@include('partials.topmenubar')
		<div class="clearfix"></div>
        @include('partials.sidebar')
        <div class="page-content mt-10">
			<!-- Videos -->
			<div class="col-xs-12 ct">
		  	  <div class="title2 mt-10">
					Latest Videos
				</div>
				<div class="col-xs-6 pd-0">
					<a href="#Vid1" class="" data-toggle="modal">
						<img src="{{('assets/img/thumb/th1.jpg')}}" alt=""/>
						<span class="thumb-play">
							<img src="{{('assets/img/thumb/thumb-youtube-play-small.png')}}" alt=""/>
						</span>
						<figcaption>
							<span class="title">
								Ajax 2-3 Spurs | Moura Hattrick Puts Spurs In ...
							</span>
							<time class="published">20/5/2019</time>
						</figcaption>
					</a>
				</div>
				<div class="col-xs-6 pd-0">
					<a href="#Vid2" class="" data-toggle="modal">
						<img src="{{('assets/img/thumb/th2.jpg')}}" alt=""/>
						<span class="thumb-play">
							<img src="{{('assets/img/thumb/thumb-youtube-play-small.png')}}" alt=""/>
						</span>
						<figcaption>
							<span class="title">
								Paris Saint-Germain - Dijon FCO ( 4-0 )
							</span>
							<time class="published">19/5/2019</time>
						</figcaption>
					</a>
				</div>
				<div class="col-xs-6 pd-0">
					<a href="#Vid3" class="" data-toggle="modal">
						<img src="{{('assets/img/thumb/th3.jpg')}}" alt=""/>
						<span class="thumb-play">
							<img src="{{('assets/img/thumb/thumb-youtube-play-small.png')}}" alt=""/>
						</span>
						<figcaption>
							<span class="title">
								Manchester City Win the Emirates FA Cup!
							</span>
							<time class="published">18/5/2019</time>
						</figcaption>
					</a>
				</div>
				<div class="col-xs-6 pd-0">
					<a href="#Vid4" class="" data-toggle="modal">
						<img src="{{('assets/img/thumb/th4.jpg')}}" alt=""/>
						<span class="thumb-play">
							<img src="{{('assets/img/thumb/thumb-youtube-play-small.png')}}" alt=""/>
						</span>
						<figcaption>
							<span class="title">
								#GRAZIEBARZA | Juventus Allianz Stadium salutes ...
							</span>
							<time class="published">17/5/2019</time>
						</figcaption>
					</a>
				</div>

		</div>

		  	<div class="col-xs-12 ct">
		  	  <div class="title2 mt-10">
					Goal of the day
				</div>
				<div class="col-xs-6 pd-0">
					<a href="#Vid1" class="" data-toggle="modal">
						<img src="{{('assets/img/thumb/th1.jpg')}}" alt=""/>
						<span class="thumb-play">
							<img src="{{('assets/img/thumb/thumb-youtube-play-small.png')}}" alt=""/>
						</span>
						<figcaption>
							<span class="title">
								Ajax 2-3 Spurs | Moura Hattrick Puts Spurs In ...
							</span>
							<time class="published">20/5/2019</time>
						</figcaption>
					</a>
				</div>
				<div class="col-xs-6 pd-0">
					<a href="#Vid2" class="" data-toggle="modal">
						<img src="{{('assets/img/thumb/th2.jpg')}}" alt=""/>
						<span class="thumb-play">
							<img src="{{('assets/img/thumb/thumb-youtube-play-small.png')}}" alt=""/>
						</span>
						<figcaption>
							<span class="title">
								Paris Saint-Germain - Dijon FCO ( 4-0 )
							</span>
							<time class="published">19/5/2019</time>
						</figcaption>
					</a>
				</div>
				<div class="col-xs-6 pd-0">
					<a href="#Vid3" class="" data-toggle="modal">
						<img src="{{('assets/img/thumb/th3.jpg')}}" alt=""/>
						<span class="thumb-play">
							<img src="{{('assets/img/thumb/thumb-youtube-play-small.png')}}" alt=""/>
						</span>
						<figcaption>
							<span class="title">
								Manchester City Win the Emirates FA Cup!
							</span>
							<time class="published">18/5/2019</time>
						</figcaption>
					</a>
				</div>
				<div class="col-xs-6 pd-0">
					<a href="#Vid4" class="" data-toggle="modal">
						<img src="{{('assets/img/thumb/th4.jpg')}}" alt=""/>
						<span class="thumb-play">
							<img src="{{('assets/img/thumb/thumb-youtube-play-small.png')}}" alt=""/>
						</span>
						<figcaption>
							<span class="title">
								#GRAZIEBARZA | Juventus Allianz Stadium salutes ...
							</span>
							<time class="published">17/5/2019</time>
						</figcaption>
					</a>
				</div>

		</div>
		    <div class="clearfix"></div>
	  </div>
	</div>

	<!-- Modal Video -->
    <div id="Vid1" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content no-bdrad">
                <div class="modal-body pd-0">
					<div class="pd-10">
						<div class="video-container item pt-10">
							<div class="youtube-video" id='OttuX3_xWDU'></div>
						</div>
						<figcaption>
							<span class="title">
								Ajax 2-3 Spurs | Moura Hattrick Puts Spurs In Champions | Agg 3-3 SF Leg 2 | 9 Mei 2019 | Liga Champions
							</span>
							<time class="published">8/5/2019</time></figcaption>
					</div>

                </div>
				<div class="modal-footer txt-ctr">
					<button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>

				  </div>
            </div>
        </div>
    </div>
	<div id="Vid2" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content no-bdrad">
                <div class="modal-body pd-0">
					<div class="pd-10">
						<div class="video-container item pt-10">
							<div class="youtube-video" id='1m6j50B3nK8'></div>
						</div>
						<figcaption>
							<span class="title">
								Paris Saint-Germain - Dijon FCO ( 4-0 ) - Résumé - (PARIS - DFCO) / 2018-19
							</span>
							<time class="published">19/5/2019</time></figcaption>
					</div>

                </div>
				<div class="modal-footer txt-ctr">
					<button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>

				  </div>
            </div>
        </div>
    </div>
	<div id="Vid3" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content no-bdrad">
                <div class="modal-body pd-0">
					<div class="pd-10">
						<div class="video-container item pt-10">
							<div class="youtube-video" id='A78ohJeCjHk'></div>
						</div>
						<figcaption>
							<span class="title">
								Manchester City Win the Emirates FA Cup! | Manchester City 6-0 Watford | Emirates FA Cup 18/19
							</span>
							<time class="published">18/5/2019</time></figcaption>
					</div>

                </div>
				<div class="modal-footer txt-ctr">
					<button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>

				  </div>
            </div>
        </div>
    </div>
	<div id="Vid4" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content no-bdrad">
                <div class="modal-body pd-0">
					<div class="pd-10">
						<div class="video-container item pt-10">
							<div class="youtube-video" id='SGWsGn6JlII'></div>
						</div>
						<figcaption>
							<span class="title">
								#GRAZIEBARZA | Juventus Allianz Stadium salutes Andrea Barzagli!
							</span>
							<time class="published">17/5/2019</time></figcaption>
					</div>

                </div>
				<div class="modal-footer txt-ctr">
					<button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>

				  </div>
            </div>
        </div>
    </div>
	@include('partials.footer')
	<!-- Initialize Swiper -->
	<script>
		var swiper = new Swiper('.swiper-container', {
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
        renderBullet: function (index, className) {
          return '<span class="' + className + '">' + (index + 1) + '</span>';
        },
      },
    });
	</script>
</body>
</html>
