var base_url = window.location.origin;



$(document).ready(function() {
        var pid = $('#player_id').val();
        var teamId = $('#team_id').val();
        var seasonId = $('#season_id').val();
        var leagueId = $('#league_id').val();


         $("#basicStatsBtn").addClass("btn-purple");
        $("#advanceStatsBtn").addClass("btn-white");

        $("#pl-stats").show();
        $("#pl-adv").hide();

      
        
        $("#basicStatsBtn").click(function() {
        $("#basicStatsBtn").removeClass("btn-white").addClass("btn-purple");
        $("#advanceStatsBtn").removeClass("btn-purple").addClass("btn-white");

        $("#pl-stats").show();
        $("#pl-adv").hide();
    });

    // Click event for "Advance Stats" tab
    $("#advanceStatsBtn").click(function() {
        $("#advanceStatsBtn").removeClass("btn-white").addClass("btn-purple");
        $("#basicStatsBtn").removeClass("btn-purple").addClass("btn-white");

        $("#pl-adv").show();
        $("#pl-stats").hide();
        

    });

    $('.btn-subscribe').click(function() {
            $('.premium-alert').hide();
            $('.premium').removeClass('premium');
        });
    $.ajaxSetup({
        headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    $.ajax({
        url: base_url + '/playerInfomatches',
        method: 'POST',
        data: {
            teamId: teamId,
            seasonId: seasonId,
            leagueId: leagueId,
        },
        success: function (responseData) {
            var matches = responseData.matches;
            var matchContainer = $("#matches");

            if (responseData.success === 1 && matches.length > 0) {
               matchContainer.empty();

               matches.slice(0, 2).forEach(function (matchItem) {
             var matchItemHTML = `
                        <div class="matches">
                            <div class="d-flex j-center">
                                <div class="club-left mx-1 text-center">
                                    <div class="logo"><img src="${matchItem.home_team_logo}" alt=""></div>
                                    <h5 class="mb-0">${matchItem.home_team_name}</h5>
                                </div>
                                <div class="mid mx-2 d-flex flex-column my-auto">
                                    <div class="d-flex j-center h-max-c border radius-1 px-2 py-1" style="font-size: 16pt">
                                        <span>-</span>
                                        <span class="mx-2 border-right"></span>
                                        <span>-</span>
                                    </div>
                                    <span class="my-1">${matchItem.time}</span>
                                </div>
                                <div class="club-right mx-1 text-center">
                                    <div class="logo"><img src="${matchItem.away_team_logo}" alt=""></div>
                                    <h5 class="mb-0">${matchItem.away_team_name}</h5>
                                </div>
                            </div>
                        </div>`;
                    matchContainer.append(matchItemHTML);
                });
            } else {
                matchContainer.empty();
                matchContainer.append('<div class="no-data-msg">No Future matches available.</div>');
            }
        },
        error:function(responseData){
                matchContainer.empty();
                matchContainer.append('<div class="no-data-msg">No Future matches available.</div>');

        }
    });

 
    getplayernews();
            
function getplayernews(){
     if (!pid) {
            // Append the "No Data Found" image when pid is empty or null
            $("#four").append('<img src="' + base_url + '/assets/img/detail-match/icon-menu/no-Data-Found.png" class="no-data-img">');
            return;
        }
    $.ajax({
        url: base_url + '/playerNews/' + pid,
        method: 'GET',
        success: function (responseData) {

            var news = responseData;
            var newsContainer = $("#pnewss-tab");

            if (news.length > 0) {
                            
                news.forEach(function (newsItem, index) {

                     if (index < 3) {  // Only process the first 3 records
                    var sliderId = "#slider-" + (index + 1);

                    // Update the carousel slide's content with the news data
                    $(sliderId).find("img").attr("src", newsItem.urlToImage);
                    $(sliderId).find("h3").text(newsItem.title);
                    }
                     if (index < 10) { 
                    var newsItemHTML = $('<div class="row listing ' + (index >= 4 ? 'hide-records' : '') + '"  style="margin-top:15px">' +
                    '<div class="col-xs-5">'+    
                    '<a href="' + newsItem.url + '" style="border-radius: 9px">' +'<img id="newsImg" src="' + newsItem.urlToImage + '" alt="" class="news-list-img">' +'</a>'+
                    '</div>'+
                        '<div class="col-xs-7">' +
                        '<h5 class="title-cat" style="color:#337AB7" id="newsTitle">' + newsItem.title + '</h5>' +
                        
                        '<span style="color:#B1B1B1" id="newsDate">' + formatDate(newsItem.publishedAt) + '</span>' +
                        '</div>' +                   
                        '</div>'+
                        '<span class="news-devider"></span>' );

                    newsContainer.append(newsItemHTML);}
                });

                
            } else {
                $("#four").append('<img src="' + base_url + '/assets/img/detail-match/icon-menu/no-Data-Found.png" class="no-data-img">');
            }
        }
    });
}
function formatDate(dateString) {
    if (!dateString) {
        return 'N/A';
    }
    var date = new Date(dateString);
    var options = {
        day: '2-digit',month: '2-digit',year: 'numeric',hour: 'numeric',minute: '2-digit',second: '2-digit',hour12: true, timeZone: 'UTC' 
    };
        return date.toLocaleDateString('en-GB', options);
}

 const $row = $('#market-value-row');
        $row.fadeIn();

        function blinkRow() {
            $row.fadeOut(300).fadeIn(300);
        }

        setInterval(blinkRow, 1000); // Blinks every second

});