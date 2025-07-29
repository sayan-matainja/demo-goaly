@include('partials.header')

  </head>

<body>
	<!--<div id="loader"><div id="spin"></div></div>-->

	<div class="">
        @include('partials.topmenu')

		<div class="clearfix"></div>
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
			<!-- Contest Detail -->
			<div class="col-xs-12 lm ct">
		  		<h2 class="text-center">Ball Possession</h2>
				<div class="hr"></div>
				<h2 class="ct-title">Which one has higher ball possession between Juventus vs Ac Milan?</h2>
				<div>
		   			<img src="{{('assets/img/live3.jpg')}}" alt=""/>
				</div>
				<div class="hr"></div>
				<div class="col-xs-6 scrL">
					<img src="{{('assets/img/juventus_black.png')}}" alt=""/>
					<input type="text" class="ct-input-scr" id="percent1">%
					<span>&nbsp;</span>
				  	<br>
				  	<h4 class="tl">Juventus</h4>
				  	<p class="marcatori-partita">&nbsp; </p>
			  </div>
			  <div class="col-xs-6 scrR">
				  	<span>&nbsp;</span>
					<input type="text" class="ct-input-scr" id="percent1">%
				  	<img src="{{('assets/img/milan.png')}}" alt=""/>

				  	<br>
				  	<h4 class="tl">Milan</h4>
				  	<p class="marcatori-partita">&nbsp; </p>
			  </div>
			  <div class="clearfix"></div>
			  <div class="col-xs-4 pd-0">
					<a href="" class="btn btn-primary btn-ct black">Submit Answer</a>
			  </div>
			  <div class="col-xs-4">
					<div class="ct-mid">Question: 2/3</div>
			  </div>
			  <div class="col-xs-4 pd-0">
					<a href="{{route('contest_detail_result')}}" class="btn btn-primary btn-ct cyan">Next Question</a>
			  </div>
		  	</div>
		    <div class="clearfix"></div>


	  </div>
	</div>
	{{--<?php include('inc_footer.php'); ?>--}}
	@include('partials.footer')

	<script>
		/*getPrice = function() {
		  var numVal1 = Number(document.getElementById("percent1").value);

		  var totalValue = 100 - numVal1
		  document.getElementById("percent2").value = totalValue.toFixed(2);
		}*/
	</script>
</body>
</html>
