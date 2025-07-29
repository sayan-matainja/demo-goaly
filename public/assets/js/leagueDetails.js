var base_url = window.location.origin;
var league_id = document.getElementsByName('league_id')[0].value;
var season_id = document.getElementsByName('season_id')[0].value;
var comp_id = document.getElementsByName('comp_id')[0].value;
$(document).ready(function () {

    $.ajax({
    url: base_url + '/LeagueRound/' + league_id,
    method: 'GET',
    success: function (responseData) {
        console.log(responseData);
        if (responseData.success == '1') {
            // Sort round_list in descending order based on round_id
            responseData.round_list.sort((a, b) => b.round_id - a.round_id);

            // If current_round is not present or is an empty array
            if (!responseData.current_round || responseData.current_round.length === 0) {
                // Display all rounds in descending order
                $.each(responseData.round_list, function (index, response) {
                    $("#gameWeekDropDown").append('<option value="' + response.round_id + '">Game Week ' + response.round_name + '</option>');
                });
                match();                
            } else {
                // If current_round is present, display rounds from current round to the first round in descending order
                const currentIndex = responseData.round_list.findIndex(round => round.round_id === responseData.current_round.round_id);

                const selectedRounds = responseData.round_list.slice(currentIndex);

                $.each(selectedRounds, function (index, response) {
                    $("#gameWeekDropDown").append('<option value="' + response.round_id + '">Game Week ' + response.round_name + '</option>');
                });

                $("#gameWeekDropDown").val(responseData.current_round.round_id);

                match();
            }

        } else {
            $("#gameWeekDropDown").append('<option value="0">Game Week</option>');
            $("#match").append('<img src="' + base_url + '/assets/img/detail-match/icon-menu/no-Data-Found.png" class="no-data-img">');
        }
    },
    error: function () {
        $("#gameWeekDropDown").append('<option value="0">Game Week</option>');
        $("#match").append('<img src="' + base_url + '/assets/img/detail-match/icon-menu/no-Data-Found.png" class="no-data-img">');
    }
});




    
    // $('#standingsTab').click(function () {
$.ajax({
    url: base_url + '/LeagueStanding/' + league_id,
    method: 'GET',
    success: function (responseData) {
        console.log(responseData);
        if (responseData.length > 0) {
            $.each(responseData, function (index, response) {
                $("#standings").append('<div class="bg-white"><div class="standings table-responsive" id="groupName">' + (response.group_name ?? '-') + '<table class="table"><thead><tr class="bg-dark text-white"><td colspan="2" id="teamTxt">Team</td><td id="pointsTxt">Pts</td><td id="pTxt">P</td><td id="wonTxt">W</td><td id="drawTxt">D</td><td id="loseTxt">L</td><td id="goalForTxt">F</td><td id="goalAgainstTxt">A</td><td id="goalDifferenceTxt">GD</td></tr></thead><tbody id="standingsData' + index + '"></tbody></table></div></div>');
                $.each(response.data, function (key, standings) {
                    var winnerList = '<ul id="form">';
                    $.each(standings.recent_form.split(''), function (i, winner) {
                        var winnerClass = '';
                        if (winner === 'W') {
                            winnerClass = 'bg-green';
                        } else if (winner === 'D') {
                            winnerClass = 'bg-orange';
                        } else if (winner === 'L') {
                            winnerClass = 'bg-red';
                        }
                        winnerList += '<li class="' + winnerClass + '">' + winner + '</li>';
                    });
                    winnerList += '</ul>';
                    
                    $("#standingsData" + index).append('<tr><td class="bg-green text-white" id="numberValue">' + (standings.position) + '.</td><td style="white-space: nowrap"><div class="desc"><img id="clubImg" src="' + (standings.team_logo || '-') + '" alt=""><div class="team"><span id="clubName">' + (standings.team_name || '-') + '</span>' + winnerList + '</div></div></td><td class="smw" id="pointsValue"><strong>' + (standings.points || '-') + '</strong></td><td class="smw" id="pValue">' + (standings.games_played || '-') + '<br> <span class="px-1 radius-1 bg-grey"></span></td><td class="smw" id="wonValue">' + (standings.won || '-') + '</td><td class="smw" id="drawValue">' + (standings.draw || '-') + '</td><td class="smw" id="loseValue">' + (standings.lost || '-') + '</td><td class="smw" id="goalForValue">' + (standings.goals_scored || '-') + '</td><td class="smw" id="goalAgainstValue">' + (standings.goals_against || '-') + '</td><td class="smw" id="goalDifferenceValue">' + (standings.goal_difference || '-') + '</td></tr>');
                });
            });
        } else {
            $("#standings").empty();
            $("#standings").append('<img src="' + base_url + '/assets/img/detail-match/icon-menu/no-Data-Found.png" class="no-data-img">');
        }
    },
    error: function () {
        $("#standings").empty();
        $("#standings").append('<img src="' + base_url + '/assets/img/detail-match/icon-menu/no-Data-Found.png" class="no-data-img">');
    }
});

    // });
    $.ajax({
        url: base_url + '/TopScores/' + league_id + '/' + season_id,
        method: 'GET',
        success: function (responseData) {


            $("#Matched_played").append(responseData.Matched_played);
            $("#Goal").append(responseData.Goals);
            $("#Yellow").append(responseData.Yellow_Cards);
            $("#Red").append(responseData.Red_Cards);
            $("#Assists").append(responseData.Assists);

        }
    });

   

    $.ajax({
        url: base_url + '/TopPlayers/' + league_id + '/' + comp_id,
        method: 'GET',
        success: function (responseData) {
            console.log(responseData);
            if (responseData.length > 0) {
                $.each(responseData, function (index, PlayerCategory) {
                    var Player = PlayerCategory.data[0]; // Access the first player's data directly
                    if (!Player) {
                        return; // Skip if no data
                    }

                    var imagePath = Player.image_path || base_url + '/assets/img/players/no-player.png';
                    var translatedTitle = translations[PlayerCategory.title];

                    $("#PlayerDetails").append(`
                        <li class="m-0">
                            <a>
                                <div class="ptop-player-box">
                                    <div class="ptop-player-box-glass"></div>
                                    <span class="ptop-player-box-position" id="playerPosition">${Player.position_name}</span>
                                    <div class="ptop-player-box-team player-team-lgo">
                                        <img id="playerClub" class="img-fluid" src="${Player.team_logo || '-'}" alt="">
                                    </div>
                                    <a href="/player/details/${Player.player_id}">
                                        <img src="${imagePath}" onerror="this.src='${base_url}/assets/img/players/no-player.png'" alt="Player Image">
                                    </a>
                                    <p class="m-0" style="height:auto;" id="playerName">${Player.name ? Player.name.substring(0, 17) : '-'}</p>
                                    <div class="ptop-player-box-score" id="value">${translatedTitle}<br><strong><b>${Player.scores || '0'}</b></strong></div>
                                </div>
                            </a>
                        </li>
                    `);
                });
            } else {
                $("#PlayerDetails").append('<div class="img-size"><img src="' + base_url + '/assets/img/detail-match/icon-menu/no-Data-Found.png" class="no-data-img"></div>');
            }
        },
        error: function (xhr, status, error) {
                $("#PlayerDetails").append('<div class="img-size"><img src="' + base_url + '/assets/img/detail-match/icon-menu/no-Data-Found.png" class="no-data-img"></div>');

            console.error('AJAX Request Failed:', status, error);
        }
    });


 // Handle "More" button click
    // $(".more-button").on("click", function () {
    //     // Find the parent container of the button
    //     var container = $(this).closest(".container-matches");

    //     // Toggle the "hide-records" class to show/hide all records within the container
    //     container.find(".matches").toggleClass("hide-records");
    //     console.log(container);
    //     // Change the text of the "More" button based on its state
    //     if (container.find(".matches.hide-records").length > 0) {
    //         $(this).text("More");
    //     } else {
    //         $(this).text("Less");
    //     }
    // });


    $.ajax({
    url: base_url + '/LastAndNextMatch/' + league_id,
    method: 'GET',
    success: function (responseData) {
        if (responseData.success === 1) {
            console.log(responseData);
            // Handle "Last Game"
            var lastGames = responseData.last_game;

            if (lastGames.length === 0) {
                $("#last-match").append('<img src="' + base_url + '/assets/img/detail-match/icon-menu/no-Data-Found.png" class="no-data-img">');
                $('#loadMoreLastGame').hide();
            } else if (lastGames.length === 1) {
                $('#loadMoreLastGame').hide();
            }

            var lastMatchContainer = $("#last-match");

            lastGames.forEach(function (match, index) {
                var lastMatchItem = $('<div class="d-flex j-center matches ' + (index >= 2 ? 'hide-records' : '') + '">'); // Apply the "hide-records" class conditionally
                lastMatchItem.append('<div class="club-left mx-1 text-center"><div class="logo"><a href="/team/details/'+match.homeTeam_id+'"><img id="hClubImg" src="' + match.home_logo + '" alt=""></a></div><h5 class="mb-0" id="hClubName">' + match.homeTeam_name + '</h5></div>');
                lastMatchItem.append('<div class="mid mx-2 d-flex flex-column my-auto"><div class="d-flex j-center h-max-c border radius-1 px-2 py-1" style="font-size: 16pt"><span id="hClubScore">' + match.homeTeam_score + '</span><span class="mx-2 border-right"></span><span id="aClubScore">' + match.awayTeam_score + '</span></div><span class="my-1" id="matchDate">' + match.date_time + '</span><a href="/match/details/'+match.match_id+'"><span class="btn-pill bg-red" style="padding: 3px 27px; border-radius: 15px;color: white;" id="matchStatus">'+ translations.Finished +'</span></a></div>');
                lastMatchItem.append('<div class="club-right mx-1 text-center"><div class="logo"><a href="/team/details/'+match.awayTeam_id+'"><img src="' + match.away_logo + '" alt="" id="aClubImg"></a></div><h5 class="mb-0" id="aClubName">' + match.awayTeam_name + '</h5></div>');

                lastMatchContainer.append(lastMatchItem);
            });

            // Handle "Next Game"
            var nextGames = responseData.next_game;
            if (nextGames.length === 0) {
                $("#next-match").append('<img src="' + base_url + '/assets/img/detail-match/icon-menu/no-Data-Found.png" class="no-data-img">');
                $('#loadMoreNextGame').hide();
            } else if (nextGames.length === 1) {
                $('#loadMoreNextGame').hide();
            }

            var nextMatchContainer = $("#next-match");

            nextGames.forEach(function (match, index) {
                var nextMatchItem = $('<div class="d-flex j-center matches ' + (index >= 2 ? 'hide-records' : '') + '">'); // Apply the "hide-records" class conditionally
                nextMatchItem.append('<div class="club-left mx-1 text-center"><div class="logo"><a href="/team/details/'+match.homeTeam_id+'"><img id="hClubImg" src="' + match.home_logo + '" alt=""></a></div><h5 class="mb-0" id="hClubName">' + match.homeTeam_name + '</h5></div>');
                nextMatchItem.append('<div class="mid mx-2 d-flex flex-column my-auto"><div class="d-flex j-center h-max-c border radius-1 px-2 py-1" style="font-size: 16pt"><span id="hClubScore">' + match.homeTeam_score + '</span><span class="mx-2 border-right"></span><span id="aClubScore">' + match.awayTeam_score + '</span></div><span class="my-1" id="matchDate">' + match.date_time + '</span><a href="/match/details/'+match.match_id+'"><span class="btn-pill bg-green" style="padding: 2px 10px;border-radius: 15px;color: white;background-color:#7CD327; font-size:12px" id="matchStatus">' + translations.Coming_Soon + '</span></a></div>');
                nextMatchItem.append('<div class="club-right mx-1 text-center"><div class="logo"><a href="/team/details/'+match.awayTeam_id+'"><img id="aClubImg"src="' + match.away_logo + '" alt=""></a></div><h5 class="mb-0" id="aClubName">' + match.awayTeam_name + '</h5></div>');

                nextMatchContainer.append(nextMatchItem);
            });
        } else {
            $("#last-match").append('<img src="' + base_url + '/assets/img/detail-match/icon-menu/no-Data-Found.png" class="no-data-img">');
            $("#next-match").append('<img src="' + base_url + '/assets/img/detail-match/icon-menu/no-Data-Found.png" class="no-data-img">');
        }
    },error: function () {
            $("#last-match").append('<img src="' + base_url + '/assets/img/detail-match/icon-menu/no-Data-Found.png" class="no-data-img">');
            $("#next-match").append('<img src="' + base_url + '/assets/img/detail-match/icon-menu/no-Data-Found.png" class="no-data-img">');


    }
});

    $.ajax({
        url: base_url + '/league/News/' + league_id,
        method: 'GET',
        success: function (responseData) {
            console.log(responseData);

            var news = responseData;
            var newsContainer = $("#newss-tab");

            if (news.length > 0) {
                            
                news.forEach(function (newsItem, index) {

                     if (index < 3) {  // Only process the first 3 records
                    var sliderId = "#slider-" + (index + 1);

                    // Update the carousel slide's content with the news data
                    $(sliderId).find("img").attr("src", newsItem.urlToImage);
                    $(sliderId).find("h3").text(newsItem.title);
                    }

                    var newsItemHTML = $('<div class="row bg-white ' + (index >= 4 ? 'hide-records' : '') + '">' +
                                            '<a href="' + newsItem.url + '" >'+
                                        '<div class="news">'+
                                        '<div class="col-xs-5">'+    
                                        '<a href="' + newsItem.url + '" style="border-radius: 9px">' +'<img id="newsImg" src="' + newsItem.urlToImage + '" alt="" class="news-list-img">' +'</a>'+
                                        '</div>'+
                                            '<div class="col-xs-7">' +
                                            '<h5 class="title-cat" id="newsTitle" style="color:#337AB7">' + newsItem.title + '</h5>' +
                                            '<span id="newsDate">' + newsItem.publishedAt + '</span>' +

                                            '</div>' +
                                            '</div>' +
                                            
                        '<span class="news-devider"></span>' +
                    '</a>'+
                        '</div>');

                    newsContainer.append(newsItemHTML);
                });

                
            } else {
                $("#five").append('<img src="' + base_url + '/assets/img/detail-match/icon-menu/no-Data-Found.png" class="no-data-img">');
            }
        }
    });




    $('#teamsTab').click(function () {
        var league_id = document.getElementsByName('league_id')[0].value;
        $("#six").empty();

        $.ajax({
            url: base_url + '/teamsByleagueId/' + league_id,
            method: 'GET',
            success: function (responseData) {
                console.log(responseData);

                var teams = responseData;
                var teamsContainer = $("#six");
                if (teams.length != 0) {
                    var leagueTeamContainer = $('<div class="league-team"></div>');

  


                    teams.forEach(function (team) {
                        var teamItem = $('<div class="team"><a href="' + base_url + '/team/details/' + team.id + '"><div class="cover-img"><img src="' + team.badge + '" alt="" id="clubImg"></div></a></div>');
                        leagueTeamContainer.append(teamItem);
                    });

                    teamsContainer.append(leagueTeamContainer);
                } else {
                    $("#six").append('<img src="' + base_url + '/assets/img/detail-match/icon-menu/no-Data-Found.png" class="no-data-img">');
                }
            }
        });

    });



})
$(document).on('change', '#gameWeekDropDown', function () {
    match();
});
function match() {
    var league_id = document.getElementsByName('league_id')[0].value;
    var round_id = document.getElementsByName('round')[0].value;
    $.ajax({
        url: base_url + '/LeagueMatch/' + league_id + '/' + round_id,
        method: 'GET',
        success: function (responseData) {
                console.log(responseData);
                
            $("#match").html('');
            $.each(responseData, function (index, response) {

                matche_status = response['status'];
                        if(matche_status == "NS" || matche_status =="TBA"){
                            background ="background-color:#7CD327";
                            status=translations.Coming_Soon;                            
                        }else{                            
                            background ="background-color:red";
                            status=translations.Finished;//to get translation from blade
                        }

                var date_time = response.time;

                var localTime = moment.utc(date_time).toDate();
                
                var diff = (localTime - new Date());
                

                if (diff < 0) {
                    hourMinute = ' ';
                } else {
                    var day = parseInt(diff / (24 * 60 * 60 * 1000));
                    var hhTime = diff % (24 * 60 * 60 * 1000);
                    var hour = parseInt(hhTime / (60 * 60 * 1000));
                    var mmTime = hhTime % (60 * 60 * 1000);
                    var minute = parseInt(mmTime / (60 * 1000));
                    var ssTime = mmTime % (60 * 1000);
                    var second = parseInt(ssTime / 1000);

                    var id = response.id;
                    hourMinute = day + 'd:' + hour + 'h:' + minute + 'm:' + second + 's';
                }
                   $("#match").append('<div class="matches"><div class="d-flex j-center"><div class="club-left mx-1 text-center"><div class="logo"><a href="/team/details/' + response.home_team_id + '"><img id="hClubImg"src="' + (response.home_team_logo == null ? '-' : response.home_team_logo) + '" alt=""></a></div><h5 class="mb-0" id="hClubName">' + (response.home_team_name == null ? '-' : response.home_team_name) + '</h5></div><div class="mid mx-2 d-flex flex-column my-auto"><div class="d-flex j-center h-max-c border radius-1 px-2 py-1" style="font-size: 16pt"><span id="hClubScore">' + response.home_team_score + '</span><span class="mx-2 border-right"></span><span id="aClubScore">' + response.away_team_score + '</span></div><span class="my-1" id="matchDate">' + response.time + '</span><a href="/match/details/' + response.id + '" ><span class="btn-pill" style="padding: 1px 10px;border-radius: 15px;color: white;' + background + '" id="matchStatus">' + status + '</span></a><span class="my-1">' + hourMinute + '</span></div><div class="club-right mx-1 text-center"><div class="logo"><a href="/team/details/' + response.away_team_id + '"><img id="aClubImg"src="' + (response.away_team_logo == null ? '-' : response.away_team_logo) + '" alt=""></a></div><h5 class="mb-0" id="aClubName">' + (response.away_team_name == null ? '-' : response.away_team_name) + '</h5></div></div></div>');



            });

        }
    });
}


