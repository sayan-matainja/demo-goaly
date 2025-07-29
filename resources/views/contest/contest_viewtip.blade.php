
@include('partials.header')
  </head>

<body>
	<!--<div id="loader"><div id="spin"></div></div>-->

	<div class="">
    {{--<?php include('inc_topmenu.php'); ?>--}}
    @include('partials.topmenu')
		<div class="clearfix"></div>
		{{--<?php include('inc_leftmenu.php'); ?>--}}
        @include('partials.sidebar')
	  <div class="page-content mt-10">
			<!-- Menu Cat -->
			<div class="col-xs-12 main-cat">
				<ul class="nav nav-tabs">
					<li><a href="{{route('home')}}">Home</a></li>
					<li class="active"><a href="{{route('contest')}}">Contest</a></li>
					<li><a href="{{route('matches')}}">Live</a></li>
					<li><a href="{{route('news')}}">News</a></li>
				</ul>
			</div>
		  	<div class="clearfix"></div>
			<!-- Contest List -->
		    <div class="col-xs-12 lm ct">
		  		<h2 class="title2">Detail Tips</h2>
				<div class="hr"></div>
				<div class="part">
		   			<h5 class="mb-15">
						Lorem ipsum dolore sockets rgba
					</h5>
					<h5>
						Select A League:
					</h5>
					<div class="pt-input">
						<select id="predict-league" name="predict-league" class="pt-select">
							<option value="">Please Choose</option>
							<option value="">UEFA Champions League</option>
							<option value="">UEFA Europa League</option>
							<option value="">Serie A</option>
							<option value="">Premier League</option>
							<option value="">La Liga</option>
							<option value="">Ligue 1</option>
							<option value="">Bundesliga</option>
							<option value="">EUFA European Championship 2020</option>
							<option value="">FIFA World Cup 2022</option>
						</select>
					</div>
					<h5>
						Select A Match:
					</h5>
					<div class="pt-input">
						<select id="choose-match" name="choose-match" class="pt-select">
							<option value="">Turkey vs Moldova</option>
							<option value="">Portugal vs Serbia</option>
							<option value="">Island vs France</option>
							<option value="">Montenegro vs England</option>
							<option value="">Kosovo vs Bulgaria</option>
						</select>
					</div>
					<div class="pred">
						<div class="pred-box">
							<p class="title4">Predict Tip</p>
							<h2 class="score"> 3-0 </h2>
							<p class="country"> Turkey </p>
						</div>
					</div>
					<div class="col-xs-12">
						<h5 class="text-center">03/25/2019 - 18:00 </h5>
						<h5 class="text-center text-grey">
							Turkey Vs Moldova
						</h5>
						<h5 class="text-center text-grey">
							EUFA European Championship 2020
						</h5>
					</div>
					<div class="hr"></div>
					<div class="widget-content">
						<p class="title2">12h forecast</p>
						<table class="table table-condensed">
							<thead>
								<tr>
									<th class="text-center">Home</th>
									<th class="text-center">Draw</th>
									<th class="text-center">Away</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td class="text-center predscr">11.00</td>
									<td class="text-center predscr">4.50</td>
									<td class="text-center predscr">1.33</td>
								</tr>
							</tbody>
						</table>
						<p class="title2">48h forecast</p>
						<table class="table table-condensed">
							<thead>
								<tr>
									<th class="text-center">Home</th>
									<th class="text-center">Draw</th>
									<th class="text-center">Away</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td class="text-center predscr">9.30</td>
									<td class="text-center predscr">5.50</td>
									<td class="text-center predscr">2.33</td>
								</tr>
							</tbody>
						</table>
						<p class="title2">Prediction probability</p>
						<table class="table table-condensed">
							<tbody>
								<tr>
									<th class="text-center">BTTS No</th>
									<td class="text-center predscr">1.57</td>
								</tr>
								<tr>
									<th class="text-center">BTTS Yes</th>
									<td class="text-center predscr">2.25</td>
								</tr>
							</tbody>
						</table>
						<p class="title2">Team Strengh</p>
						<table class="table table-condensed">
							<tbody>
								<tr>
									<th class="text-center">Over 2.5 Goals</th>
									<td class="text-center predscr">1.85</td>
								</tr>
								<tr>
									<th class="text-center">Under 2.5 Goals</th>
									<td class="text-center predscr">1.95</td>
								</tr>
							</tbody>
						</table>
						<p class="title2">1X2</p>
						<table class="table table-condensed">
							<tbody>
								<tr>
									<th class="text-center">Over 2.5 Goals</th>
									<td class="text-center predscr">1.85</td>
								</tr>
								<tr>
									<th class="text-center">Under 2.5 Goals</th>
									<td class="text-center predscr">1.95</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<div class="hr"></div>
		  	</div>


	  </div>
	</div>
	{{--<?php include('inc_footer.php'); ?>--}}
	@include('partials.footer')

</body>
</html>
