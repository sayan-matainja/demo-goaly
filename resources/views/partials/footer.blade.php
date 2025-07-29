<footer>
	<div class="top">
		<img src="{{asset('/assets/img/the-logo-leagues.png')}}" class="img-responsive" alt=""/>
	</div>
	<div class="bottom">
		<div class="text-center"><img src="{{asset('/assets/img/logo-goaly.png')}}" height="50px" alt=""/></div>
		<div class="text-footer">
			<a href="">Term of Conditions</a> <a href="">Privacy Policy</a> <a href="">Cookie Policy</a> <a href="">Work with Us</a> <a href="">Contact Us</a>
		</div>
		<div class="copyright">@2019. Goaly. All Right Reserved.</div>
	</div>
</footer>

<!-- Modal 1 -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title text-center">
	    	<img src="{{asset('/assets/img/logo-goaly.png')}}" height="60" alt=""/>
		  </h4>
      </div>
      <div class="modal-body">
		  	<h3 class="mt-0">To enjoy play the game, click yes</h3>
        	<p>
		  		This is subcription service for Goaly users who would like to enjoy our interactive prediction games where you can join and collect points to win our exclusive rewards of football merchendise and a chance to Win grand prize to watch Big match overseas.
		    </p>
      </div>
      <div class="modal-footer">
		  <div class="col-xs-6 plfix">
		  	<a href="">
				<button type="button" class="btn-reg"
						data-dismiss="modal" data-toggle="modal" data-target="#myConfirm">
					<strong>Yes Daily</strong>
				</button>
			</a>
		  </div>
		  <div class="col-xs-6 prfix">
		  	<a href="">
				<button type="button" class="btn-sign"
						data-dismiss="modal" data-toggle="modal" data-target="#myConfirm">
					<strong>Yes Weekly</strong>
				</button>
			</a>
		  </div>
      </div>
    </div>

  </div>
</div>

<!-- Modal 2 -->
<div id="myConfirm" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title text-center">
	    	<img src="{{asset('/assets/img/logo-goaly.png')}}" height="60" alt=""/>
		  </h4>
      </div>
      <div class="modal-body">
        	<p>
		  		You are about to subscribe the daily/weekly subscription plan with Free unlimited play games competition, there will be an auto renewal charge of 10c/day or 50c/week
		    </p>
		  	<p>
		  		Click on Yes to confirm or No to leave
		    </p>
      </div>
      <div class="modal-footer">
		  <div class="col-xs-6 plfix">
		  	<a href="">
				<button type="button" class="btn-no"
						data-dismiss="modal"><strong>No</strong>
				</button>
			</a>
		  </div>
		  <div class="col-xs-6 prfix">
		  	<a href="">
				<button type="button" class="btn-reg"
						data-dismiss="modal" data-toggle="modal" data-target="#mySuccess"><strong>Yes</strong>
				</button>
			</a>
		  </div>
      </div>
    </div>

  </div>
</div>

<!-- Modal 3 -->
<div id="mySuccess" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title text-center">
	    	<img src="{{asset('/assets/img/logo-goaly.png')}}" height="60" alt=""/>
		  </h4>
      </div>
      <div class="modal-body">
		  	<h3 class="mt-0">Subscribe Successful</h3>
        	<p>
		  		Your subscription is success. Now you can access to all our games in the portal
		    </p>
      </div>
      <div class="modal-footer">
		<a href="">
			<button type="button" class="btn-sign"
					data-dismiss="modal"><strong>Ok</strong>
			</button>
		</a>
      </div>
    </div>

  </div>
</div>
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script> -->

	<script src="{{asset('assets/js/jquery-2.1.1.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('assets/js/swiper.min.js')}}"></script>
	<script src="{{asset('assets/js/main.js')}}"></script>
	<script src="{{asset('assets/js/search.js')}}"></script>
    <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
	<script src="https://unpkg.com/ionicons@4.2.4/dist/ionicons.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- <script src="https://www.youtube.com/s/player/f93a7034/www-widgetapi.vflset/www-widgetapi.js"></script> -->
    @push('swiper')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
            var swiper;
            $(document).ready(function () {
                    var swiper = new Swiper('.swiper-container', {
                    pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                    renderBullet: function (index, className) {
                    return '<span class="' + className + '">' + (index + 1) + '</span>';
                    },
                },
                });
                });
	   </script>
    @endpush
    {{-- @push("homejs")
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
            $("#two-tab").ready(function() {
               $.ajax({
                    url : 'live',
                    type : "GET",
                    success: function(response){
                        var newHTML = [];
                        //console.log(response);
                        $.each(response, function(index, item) {
                            newHTML.push('<div class="lm mt-10 col-xs-12"><h5 class="text-center" style="color: black; font-weight: bold;">'+ item.date_time+'</h5><h5 class="text-center text-grey">Stadium:'+item.venue.name+'</h5><h5 class="text-center text-blue">'+item.status+'</h5><div class="row"><div class="scrL col-xs-6"><img src="'+item.homeTeam.logo_path+'"width="60px" height="60px" alt class="img-rounded"></a><span style="margin-left: 15px;">'+item.homeTeam.score+'</span><br><h4 class="tl">'+item.homeTeam.name+'</h4><a href="#"><p class="text-right text-small text-grey mr-10">'+item.goals[0].player_name+"("+item.goals[0].minute+")"+'<br></p></a></div><div class="scrR col-xs-6"><a href=""><span style="margin-right: 15px;">'+item.awayTeam.score+'</a></span><img src="'+item.awayTeam.logo_path+'"width="60px" height="60px" alt class="img-rounded"><br><h4 class="tl">'+item.awayTeam.name+'</h4></div></div></div>');
                        });
                        $("#twoo").html(newHTML.join("<br>"));

                    }
                });
            });
             $("#three-tab").ready(function() {
               $.ajax({
                    url : 'coming',
                    type : "GET",
                    success: function(response){
                        var newHTML = [];
                       //console.log(response);
                        $.each(response, function(index, item) {
                            newHTML.push('<div class="lm mt-10 col-xs-12"><h5 class="text-center" style="color: black; font-weight: bold;">'+ item.date_time+'</h5><h5 class="text-center text-grey">Stadium:'+item.venue.name+'</h5><h5 class="text-center text-blue">'+item.status+'</h5><div class="row"><div class="scrL col-xs-6"><img src="'+item.homeTeam.logo_path+'"width="60px" height="60px" alt class="img-rounded"></a><span style="margin-left: 15px;">-'+'</span><br><h4 class="tl">'+item.homeTeam.name+'</h4></div><div class="scrR col-xs-6"><a href=""><span style="margin-right: 15px;">-'+'</a></span><img src="'+item.awayTeam.logo_path+'"width="60px" height="60px" alt class="img-rounded"><br><h4 class="tl">'+item.awayTeam.name+'</h4></div></div></div>');
                        });
                        $("#threee").html(newHTML.join(""));

                    }
                });
            });
            $("#one-tab").ready(function() {
              $.ajax({
                    url : 'finish',
                    type : "GET",
                    success: function(response){
                        var newHTML = [];
                        //console.log(response);
                       $.each(response, function(index, item) {
                            newHTML.push('<div class="lm mt-10 col-xs-12"><h5 class="text-center" style="color: black; font-weight: bold;">'+ item.date_time+'</h5><h5 class="text-center text-grey">Stadium:'+item.venue.name+'</h5><h5 class="text-center text-blue">'+item.status+'</h5><div class="row"><div class="scrL col-xs-6"><img src="'+item.homeTeam.logo_path+'"width="60px" height="60px" alt class="img-rounded"></a><span style="margin-left: 15px;">'+item.homeTeam.score+'</span><br><h4 class="tl">'+item.homeTeam.name+'</h4><a href="#"><p class="text-right text-small text-grey mr-10">'+item.goals[0].player_name+"("+item.goals[0].minute+")"+'<br></p></a></div><div class="scrR col-xs-6"><a href=""><span style="margin-right: 15px;">'+item.awayTeam.score+'</a></span><img src="'+item.awayTeam.logo_path+'"width="60px" height="60px" alt class="img-rounded"><br><h4 class="tl">'+item.awayTeam.name+'</h4></div></div></div>');
                        });
                        $("#onee").html(newHTML.join("<br>"));

                    }
                });
            });
    </script>
    @endpush --}}

    {{-- @push("customjs")
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        var base_url = window.location.origin;
        $(document).ready(function() {
            var match_id = 15;
                //console.log(match_id);
                $.ajax({
                    url : base_url+'/getleagues',
                    type : "GET",
                    success: function(response){
                        //console.log(response); return false;
                        $.each(response,function(index,value){
                            if(index>=1){
                                return false;
                            };
                            $.ajax({
                                url:base_url+'/matchByLeague/'+value['competition_id']+'/1',
                                method:'GET',
                                success: function(responseMatches){
                                    //console.log(responseMatches); return false;
                                    var id="table-data-"+value['competition_id'];
                                    $.each(responseMatches,function(index,matches){
                                        $("#"+id).append('<tr><td class="text-small"><a href="matches/'+matches[6]+'"><br>'+matches[3]+'<br><a/></td><td><div class="col-xs-6 scrL"><a href="matches/'+matches[6]+'"><img src="'+matches[0]['logo_path']+'" alt=""><span>'+matches[0]['score']+'</span><h4 class="tl mt-10">'+matches[0]['name']+'</h4></a></div><div class="col-xs-6 scrR"><a href="matches/'+matches[6]+'"><span>'+matches[1]['score']+'</span><img src="'+matches[1]['logo_path']+'" alt=""><h4 class="tl mt-10">'+matches[1]['name']+'</h4></a></div></td></tr>');
                                    });

                                }
                            });
                        });

                    }
                });
        });
        function myFunction(id,day) {
                //  document.getElementById("demo1").innerHTML = id;
                //alert(id,day);
                if(day==1){
                var element = document.getElementById("previous-"+id);
                element.classList.add("activ");
                var elementToday = document.getElementById("today-"+id);
                elementToday.classList.remove("activ");
                var elementNext = document.getElementById("next-"+id);
                elementNext.classList.remove("activ");
                var elementlive = document.getElementById("live-"+id);
                elementlive.classList.remove("activ");
                }
                if(day==2){
                var element = document.getElementById("today-"+id);
                element.classList.add("activ");
                var element = document.getElementById("previous-"+id);
                element.classList.remove("activ");
                var elementNext = document.getElementById("next-"+id);
                elementNext.classList.remove("activ");
                var elementlive = document.getElementById("live-"+id);
                elementlive.classList.remove("activ");
                }
                if(day==3){
                var element = document.getElementById("next-"+id);
                element.classList.add("activ");
                var elementToday = document.getElementById("today-"+id);
                elementToday.classList.remove("activ");
                var element = document.getElementById("previous-"+id);
                element.classList.remove("activ");
                var elementlive = document.getElementById("live-"+id);
                elementlive.classList.remove("activ");
                }
                if(day==4){
                var elementlive = document.getElementById("live-"+id);
                elementlive.classList.add("activ");
                var element = document.getElementById("next-"+id);
                element.classList.remove("activ");
                var elementToday = document.getElementById("today-"+id);
                elementToday.classList.remove("activ");
                var element = document.getElementById("previous-"+id);
                element.classList.remove("activ");
                }
                var value =id;
                $.ajax({
                url:base_url+'/matchByLeague/'+value+'/'+day,
                method:'GET',
                success: function(responseMatches){
                    var newid="table-data-"+value;
                    var day1="day-"+value;
                    $("#"+newid).html('');
                    //$("#day").append('<td class="text-small">Sunday<br>'+day+'<br></td> ');
                    //$("#day").append('<a href="" class="datetime btn btn-default activ">Previous</a>');
                    $.each(responseMatches,function(index,matches){
                        $("#"+newid).append('<tr><td class="text-small"><a href="matches/'+matches[6]+'"><br>'+matches[3]+'<br></a></td><td><div class="col-xs-6 scrL"><a href="matches/'+matches[6]+'"><img src="'+matches[0]['logo_path']+'" alt=""><span>'+matches[0]['score']+'</span><h4 class="tl mt-10">'+matches[0]['name']+'</h4></a></div><div class="col-xs-6 scrR"><a href="matches/'+matches[6]+'"><span>'+matches[1]['score']+'</span><img src="'+matches[1]['logo_path']+'" alt=""><h4 class="tl mt-10">'+matches[1]['name']+'</h4></a></div></td></tr>');
                    });

                }
            });
        };
    </script>
    @endpush --}}
    {{-- @push('swiper')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
            var swiper;
            $(document).ready(function () {
                    var swiper = new Swiper('.swiper-container', {
                    pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                    renderBullet: function (index, className) {
                    return '<span class="' + className + '">' + (index + 1) + '</span>';
                    },
                },
                });
                });
	   </script>
    @endpush
    @push('Standingdata')

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
             var base_url = window.location.origin;
            $(document).ready(function() {
                var match_id = 15;
                    console.log(match_id);
                    $.ajax({
                        url : base_url+'/getleagues',
                        type : "GET",
                        success: function(response){
                            //console.log(response); return false;
                            $.each(response,function(index,value){
                              if(index>=1){
                                      return false;
                                };
                                $.ajax({
                                    url:base_url+'/matchByStanding/'+value['competition_id'],
                                    method:'GET',
                                    success: function(responseMatches){

                                    var id="table-data-matches-"+value['competition_id'];
                                        //console.log(responseMatches[0]); return false;
                                        $.each(responseMatches,function(index,matches){
                                            $("#"+id).append('<tr class="wpos"><td>'+matches['group_name']+'</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>');
                                            $.each(matches['data'],function(index,data){
                                                $("#"+id).append('<tr class="wpos"><td>'+data['position']+'</td><td><img src="'+data['team_logo']+'" height="22" alt="">&nbsp '+data['team_name']+'</td><td>'+data['games_played']+'</td><td>'+data['won']+'</td><td>'+data['draw']+'</td><td>'+data['lost']+'</td><td>'+data['goal_difference']+'</td><td>'+data['points']+'</td></tr>');
                                            //console.log(data['team_logo']); return false;
                                            });
                                        });

                                    }
                                });
                            });

                        }
                    });
            });
            function myFunction(id) {
                //  document.getElementById("demo1").innerHTML = id;
                var value =id;
                $.ajax({
                    url:base_url+'/matchByStanding/'+value,
                    method:'GET',
                    success: function(responseMatches){

                    var id="table-data-matches-"+value;
                        //console.log(responseMatches[0]); return false;
                        $.each(responseMatches,function(index,matches){
                            $("#"+id).append('<tr class="wpos"><td>'+matches['group_name']+'</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>');
                            $.each(matches['data'],function(index,data){
                                $("#"+id).append('<tr class="wpos"><td>'+data['position']+'</td><td><img src="'+data['team_logo']+'" height="22" alt="">&nbsp '+data['team_name']+'</td><td>'+data['games_played']+'</td><td>'+data['won']+'</td><td>'+data['draw']+'</td><td>'+data['lost']+'</td><td>'+data['goal_difference']+'</td><td>'+data['points']+'</td></tr>');
                            //console.log(data['team_logo']); return false;
                            });
                        });

                    }
                });
            };

        </script>
    @endpush --}}
    {{-- @push('location')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script>
		$(document).ready(function($) {
			$(".clickable-row").click(function() {
				window.location = $(this).data("href");
			});
		});
	</script>
    @endpush --}}
    {{-- @push('toggleIcon')
    <script>
        function toggleIcon(e) {
        $(e.target)
            .prev('.panel-heading')
            .find(".more-less")
            .toggleClass('glyphicon-plus glyphicon-minus');
    }
    $('.panel-group').on('hidden.bs.collapse', toggleIcon);
    $('.panel-group').on('shown.bs.collapse', toggleIcon);
    </script>
    @endpush --}}
{{-- <script>
    // $('.swiper-container').swiper({
    //     mode:'horizontal',
    //     useCSS3Transforms: false,
    //     loop: false
    // });
</script> --}}
<script type="text/javascript">
		//Start Youtube API
var tag = document.createElement('script');
tag.src = "https://www.youtube.com/iframe_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

var youtubeReady = false;

//Variable for the dynamically created youtube players
var players= new Array();
var isPlaying = false;
function onYouTubeIframeAPIReady(){
  //The id of the iframe and is the same as the videoId
  jQuery(".youtube-video").each(function(i, obj)  {
     players[obj.id] = new YT.Player(obj.id, {
			  videoId: obj.id,
			    playerVars: {
			    controls: 2,
		      rel:0,
		      autohide:1,
		      showinfo: 0 ,
		      modestbranding: 1,
		      wmode: "transparent",
		      html5: 1
       	},
        events: {
          'onStateChange': onPlayerStateChange
        }
       });
     });
     youtubeReady = true;
  }


function onPlayerStateChange(event) {
  var target_control =  jQuery(event.target.getIframe()).parent().parent().parent().find(".controls");

  var target_caption = jQuery(event.target.getIframe()).parent().find(".carousel-caption");
  switch(event.data){
    case -1:
      jQuery(target_control).fadeIn(500);
      jQuery(target_control).children().unbind('click');
      break
     case 0:
      jQuery(target_control).fadeIn(500);
      jQuery(target_control).children().unbind('click');
      break;
     case 1:
      jQuery(target_control).children().click(function () {return false;});
      jQuery(target_caption).fadeOut(500);
      jQuery(target_control).fadeOut(500);
       break;
      case 2:
        jQuery(target_control).fadeIn(500);
        jQuery(target_control).children().unbind('click');
        break;
        case 3:
           jQuery(target_control).children().click(function () {return false;});
           jQuery(target_caption).fadeOut(500);
           jQuery(target_control).fadeOut(500);
           break;
          case 5:
            jQuery(target_control).children().click(function () {return false;});
            jQuery(target_caption).fadeOut(500);
            jQuery(target_control).fadeOut(500);
            break;
          default:
            break;
    }
};

jQuery(window).bind('load', function(){
  jQuery(".carousel-caption").fadeIn(500);
  jQuery(".controls").fadeIn(500);
 });

jQuery('.carousel').bind('slid.bs.carousel', function (event) {
   jQuery(".controls").fadeIn(500);
});
	</script>
