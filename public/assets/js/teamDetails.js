var base_url = window.location.origin;
var autocall=[];
var duplicateId=[];
$('.btn-subscribe').click(function() {
    $('.premium-alert').hide();
    $('.premium').removeClass('premium');
});
// var season_id='';
$(document).ready(function() {
    var TeamId=document.getElementsByName('TeamId')[0].value;
    var SeasonId = document.getElementById('season_id').value;       
    var league_id = document.getElementById('league_id').value;       

    // $.ajax({
    //     url: base_url + '/teamTeamScorer/' + TeamId,
    //     method: 'GET',
    //     success: function (responseData) {
    //         console.log(responseData);

    //         if (responseData.success === 1) {
    //             var players = [responseData.goals, responseData.assists, responseData.yellowcards];
    //             if (Array.isArray(players) && players.length > 0) {
    //                 $('.Tseason').append(translations.Season + ' ' + (players[0].season_name || 'N/A'));
                    
    //                 $.each(players, function (index, Player) {
    //                     if (!Player) return; // Skip null or undefined objects

    //                     var imagePath = Player.player_image || base_url + '/assets/img/players/no-player.png';
    //                     var translatedTitle = translations[Player.type] || Player.type;

    //                     $("#top-players").append(`
    //                         <li class="m-0">
    //                             <a>
    //                                 <div class="ptop-player-box">
    //                                     <div class="ptop-player-box-glass"></div>
    //                                     <span class="ptop-player-box-position" id="playerPosition">${Player.position_name}</span>
    //                                     <div class="ptop-player-box-team player-team-lgo">
    //                                         <img class="img-fluid" src="${Player.team_logo || '-'}" alt="" id="clubImg">
    //                                     </div>
    //                                     <a href="/player/details/${Player.player_id}">
    //                                         <img src="${imagePath}" alt="Player Image" onerror="this.src='${base_url}/assets/img/players/no-player.png'">
    //                                     </a>
    //                                     <p class="m-0" style="height:42px;">
    //                                         ${Player.player_name ? Player.player_name.substring(0, 17) : '-'}
    //                                     </p>
    //                                     <div class="ptop-player-box-score">
    //                                         ${translatedTitle}<br>
    //                                         <strong><b>${Player[Player.type] || '0'}</b></strong>
    //                                     </div>
    //                                 </div>
    //                             </a>
    //                         </li>`);
    //                 });
    //                 nextcall();
    //             } else {
    //                 nextcall();

    //                 $("#top-players").empty();
    //                 $("#top-players").append('<img src="' + base_url + '/assets/img/detail-match/icon-menu/no-Data-Found.png" class="no-data-img">');
    //             }
    //         } else {
    //             $("#top-players").empty();
    //             $("#top-players").append('<img src="' + base_url + '/assets/img/detail-match/icon-menu/no-Data-Found.png" class="no-data-img">');
    //             nextcall();

    //             console.error('Failed to retrieve data:', responseData);
    //         }
    //     },
    //     error: function (xhr, status, error) {
    //         $("#top-players").empty();
    //         $("#top-players").append('<img src="' + base_url + '/assets/img/detail-match/icon-menu/no-Data-Found.png" class="no-data-img">');
    //         console.error('AJAX Request Failed:', status, error);
    //     }
    // });
     $.ajax({
        url:base_url+'/teamMatches/'+TeamId,
        method:'GET',
        success: function(responseMatches){
            nextcall();
            $.each(responseMatches.futureMatches,function(index,response){
                console.log(response);

                    var matche_status = "FT";
                    var statusTxt = translations.Coming_Soon;
                    var background ="background-color:red";
                    matche_status = response['match_status'];
                        if(matche_status == "FT"){

                            var statusTxt = translations.Finished;
                            background ="background-color:red";
                        }else{
                            background ="background-color:#7CD327";
                        }
                    var date_time = response.date_time;
                    var localTime  = moment.utc(date_time).toDate();
                    var localDateTime = moment(localTime).format('YYYY-MM-DD HH:mm');
                    $("#futureMatches").append(' <div class="matches listing"><div class="d-flex j-center"><div class="club-left mx-1 text-center"><a href="/team/details/'+response.homeTeam_id+'"><div class="logo"><img id="hClubImg"src="'+response.homeTeam_logo+'" alt=""></div></a><h5 class="mb-0" id="hClubName">'+(response.homeTeam_name == null?'--':response.homeTeam_name)+'</h5></div><div class="mid mx-2 d-flex flex-column my-auto"><div class="d-flex j-center h-max-c border radius-1 px-2 py-1" style="font-size: 16pt"><span id="hClubScore">'+response.homeTeam_score+'</span><span class="mx-2 border-right"></span><span id="aClubScore">'+response.awayTeam_score+'</span></div><span class="my-1" id="matchDate">'+localDateTime+'</span><a href="/match/details/'+response.match_id+'"><span class="btn-pill bg-green" id="matchStatus" style="padding: 1px 10px;border-radius: 15px;color: white;'+background+'">'+statusTxt+'</span></a></div> <div class="club-right mx-1 text-center"><a href="/team/details/'+response.awayTeam_id+'"><div class="logo"><img id="aClubImg" src="'+response.awayTeam_logo+'" alt=""></div></a><h5 class="mb-0" id="aClubName">'+(response.awayTeam_name == null?'--':response.awayTeam_name)+'</h5></div></div></div>');                 

            });
            mylisting();
            $.each(responseMatches.pastMatches,function(index,response){
                    var statusTxt = translations.Coming_Soon;
                    var date_time = response.date_time;
                    var localTime  = moment.utc(date_time).toDate();
                    var localDateTime = moment(localTime).format('YYYY-MM-DD HH:mm');
                     var background ="background-color:red";
                    matche_status = response['match_status'];
                        if(matche_status == "FT"){
                            var statusTxt = translations.Finished;
                            background ="background-color:red";
                        }else{
                            background ="background-color:#7CD327";
                        }
                    $("#pastMatches").append(' <div class="matches previouslisting"><div class="d-flex j-center"><div class="club-left mx-1 text-center"><a href="/team/details/'+response.homeTeam_id+'"><div class="logo"><img id="hClubImg"src="'+response.homeTeam_logo+'" alt=""></div></a><h5 class="mb-0" id="hClubName">'+(response.homeTeam_name == null?'--':response.homeTeam_name)+'</h5></div><div class="mid mx-2 d-flex flex-column my-auto"><div class="d-flex j-center h-max-c border radius-1 px-2 py-1" style="font-size: 16pt"><span id="hClubScore">'+response.homeTeam_score+'</span><span class="mx-2 border-right"></span><span id="aClubScore">'+response.awayTeam_score+'</span></div><span class="my-1" id="matchDate">'+localDateTime+'</span><a href="/match/details/'+response.match_id+'"><span class="btn-pill bg-green" id="matchStatus" style="padding: 1px 10px;border-radius: 15px;color: white;'+background+'">'+statusTxt+'</span></a></div> <div class="club-right mx-1 text-center"><a href="/team/details/'+response.awayTeam_id+'"><div class="logo"><img id="aClubImg" src="'+response.awayTeam_logo+'" alt=""></div></a><h5 class="mb-0" id="aClubName">'+(response.awayTeam_name == null?'--':response.awayTeam_name)+'</h5></div></div></div>');
            });
            myPreviouslisting();
        },error:function (xhr, status, error){
            nextcall();
        }
    });
    

 function nextcall(){   
    $("#club_body_content").show();
    $("#skloader_club").hide();       
    $.ajax({
        url: base_url + '/TeamPlayers/' + TeamId + '/' + SeasonId,
        method: 'GET',
        success: function (responseMatches) {
            console.log(responseMatches);
            if (responseMatches.length != 0) {
                var imagePath = base_url + '/assets/img/players/no-player.png';

                function replaceEmpty(value) {
                    return value === '' ? '0' : value;
                }

                $.each(responseMatches.Midfielders, function (index, response) {
                    $("#Midfilders").append('<tr><td id="numberValue">' + (index + 1) + '.</td><td style="white-space: normal"><a href="/player/details/' + response.player_id + '"><div class="desc"><img id="playerImg"src="' + (response.player_image || imagePath) + '" alt="" onerror="this.src=\'' + imagePath + '\'"><div class="team"><span id="playerName">' + (replaceEmpty(response.player_name) == null ? '-' : replaceEmpty(response.player_name)) + '</span></div></div></a></td><td id="playedValue">' + (replaceEmpty(response.played) == null ? '-' : replaceEmpty(response.played)) + '</td><td id="goalValue">' + (replaceEmpty(response.goals) == null ? '-' : replaceEmpty(response.goals)) + '</td><td id="yellowValue">' + (replaceEmpty(response.yellowcards) == null ? '-' : replaceEmpty(response.yellowcards)) + '</td><td id="redValue">' + (replaceEmpty(response.redcards) == null ? '-' : replaceEmpty(response.redcards)) + '</td></tr>');
                });

                $.each(responseMatches.Goal_keeper, function (index, response) {
                    $("#GoalKeepers").append('<tr><td id="numberValue">' + (index + 1) + '.</td><td style="white-space: normal"><a href="/player/details/' + response.player_id + '"><div class="desc"><img id="playerImg"src="' + (response.player_image || imagePath) + '" alt="" onerror="this.src=\'' + imagePath + '\'"><div class="team"><span id="playerName">' + (replaceEmpty(response.player_name) == null ? '-' : replaceEmpty(response.player_name)) + '</span></div></div></a></td><td id="playedValue">' + (replaceEmpty(response.played) == null ? '-' : replaceEmpty(response.played)) + '</td><td id="saveValue">' + (replaceEmpty(response.saves) == null ? '-' : replaceEmpty(response.saves)) + '</td><td id="yellowValue">' + (replaceEmpty(response.yellowcards) == null ? '-' : replaceEmpty(response.yellowcards)) + '</td><td id="redValue">' + (replaceEmpty(response.redcards) == null ? '-' : replaceEmpty(response.redcards)) + '</td></tr>');
                });

                $.each(responseMatches.Defender, function (index, response) {
                    $("#Defender").append('<tr><td id="numberValue">' + (index + 1) + '.</td><td style="white-space: normal"><a href="/player/details/' + response.player_id + '"><div class="desc"><img id="playerImg"src="' + (response.player_image || imagePath) + '" alt="" onerror="this.src=\'' + imagePath + '\'"><div class="team"><span id="playerName">' + (replaceEmpty(response.player_name) == null ? '-' : replaceEmpty(response.player_name)) + '</span></div></div></a></td><td id="playedValue">' + (replaceEmpty(response.played) == null ? '-' : replaceEmpty(response.played)) + '</td><td id="saveValue">' + (replaceEmpty(response.saves) == null ? '-' : replaceEmpty(response.saves)) + '</td><td id="yellowValue">' + (replaceEmpty(response.yellowcards) == null ? '-' : replaceEmpty(response.yellowcards)) + '</td><td id="redValue">' + (replaceEmpty(response.redcards) == null ? '-' : replaceEmpty(response.redcards)) + '</td></tr>');
                });

                $.each(responseMatches.Attackers, function (index, response) {
                    $("#Attackers").append('<tr><td id="numberValue">' + (index + 1) + '.</td><td style="white-space: normal"><a href="/player/details/' + response.player_id + '"><div class="desc"><img id="playerImg"src="' + (response.player_image || imagePath) + '" alt="" onerror="this.src=\'' + imagePath + '\'"><div class="team"><span id="playerName">' + (replaceEmpty(response.player_name) == null ? '-' : replaceEmpty(response.player_name)) + '</span></div></div></a></td><td id="playedValue">' + (replaceEmpty(response.played) == null ? '-' : replaceEmpty(response.played)) + '</td><td id="goalValue">' + (replaceEmpty(response.goals) == null ? '-' : replaceEmpty(response.goals)) + '</td><td id="yellowValue">' + (replaceEmpty(response.yellowcards) == null ? '-' : replaceEmpty(response.yellowcards)) + '</td><td id="redValue">' + (replaceEmpty(response.redcards) == null ? '-' : replaceEmpty(response.redcards)) + '</td></tr>');
                });

                $('#skloader_club2').hide();
                $('#three-tab-content').show();
            } else {
                $("#three").append('<img src="' + base_url + '/assets/img/detail-match/icon-menu/no-Data-Found.png" class="no-data-img">');
            }
        }
    });
    $.ajax({
        url:base_url+'/MatchesByRound/'+TeamId,
        method:'GET',
        success: function(responseMatches){

            $.each(responseMatches['matches'],function(index,response){
             var time;
             var id;

            var date_time = response.time;
            var localTime  = moment.utc(date_time).toDate();
            var diff = (localTime - new Date() );
            if(diff>0){

                var id="diff"+response.id;
                hourMinute=null;
                const a={time:localTime, id:id,};
                autocall.push(a);
            }else{
                hourMinute=date_time;
            }
            if(duplicateId.indexOf(response.id)<0){
                duplicateId.push(response.id);
           // Set the initial background color
var background = response.status === 'FT' ? 'red' : '#7CD327';
var statusTxt  = response.status === 'FT' ? translations.Finished : translations.Coming_Soon;
$("#matches").append('<div class="matches">' +
    '<div class="d-flex j-center">' +
    '<div class="club-left mx-1 text-center">' +
    '<a href="/team/details/' + response.home_team_id + '">' +
    '<div class="logo"><img id="hClubImg" src="' + response.home_team_logo + '" alt=""></div>' +
    '</a>' +
    '<h5 class="mb-0" id="hClubName">' + response.home_team_name + '</h5>' +
    '</div>' +
    
    '<div class="mid mx-2 d-flex flex-column my-auto">' +
    '<div class="d-flex j-center h-max-c border radius-1 px-2 py-1" style="font-size: 16pt">' +
    '<span id="aClubScore">' + response.away_team_score + '</span>' +
    '<span class="mx-2 border-right"></span>' +
    '<span id="hClubScore">' + response.home_team_score + '</span>' +
    '</div>' +
   '<div class="countdown-timer my-1" id="' + id + '">'+hourMinute+'</div>' +

    '<a href="/match/details/' + response.id + '" style="width:100%">' +
    '<span id="matchStatus" class="btn-pill" style="padding: 1px 9px;border-radius: 15px;color: white;background-color: ' + background + '">' + statusTxt + '</span>' +
    '</a>' +
    '</div>' +
    
    '<div class="club-right mx-1 text-center">' +
    '<a href="/team/details/' + response.away_team_id + '">' +
    '<div class="logo"><img src="' + response.away_team_logo + '" alt="" id="aClubImg"></div>' +
    '</a>' +
    '<h5 class="mb-0" id="aClubName">' + (response.away_team_name == null ? '-' : response.away_team_name) + '</h5>' +
    '</div>' +
    '</div>' +
    '</div>');


            }
                });
            timeCalculate(autocall);
        }
    });
    $.ajax({
        url:base_url+'/TeamByStanding/'+TeamId,
        method:'GET',
        success: function (responseData) {
            console.log(responseData);
        if (responseData.length > 0) {
            $.each(responseData, function (index, response) {
                $("#standings").append('<div class="bg-white"><div class="standings table-responsive" id="groupName">' + (response.group_name ?? '-') + '<table class="table"><thead><tr class="bg-dark text-white"><td colspan="2" id="teamTxt">Team</td><td id="pointsTxt">Pts</td>    <td id="pTxt">P</td><td id="wonTxt">W</td><td id="drawTxt">D</td><td id="loseTxt">L</td><td id="goalForTxt">F</td><td id="goalAgainstTxt">A</td><td id="goalDifferenceTxt">GD</td></tr></thead><tbody id="standingsData' + index + '"></tbody></table></div>');
                $.each(response.data, function (key, standings) {
                    // Create a dynamic <ul> for winners
                    var winnerList = '<ul id="form">';
                    $.each(standings.winner, function (i, winner) {
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

                    $("#standingsData" + index).append('<tr><td class="bg-green text-white" id="numberValue">' + (key + 1) + '.</td><td style="white-space: nowrap"><div class="desc"><img id="clubImg" src="' + (standings.team_logo == null ? '-' : standings.team_logo) + '" alt=""><div class="team"><span id="clubName">' + (standings.team_name == null ? '-' : standings.team_name) + '</span>' + winnerList + '</div></div></td><td class="smw" id="pointsValue"><strong>' + (standings.points == null ? '-' : standings.points) + '</strong></td><td class="smw" id="pValue">' + (standings.games_played == null ? '-' : standings.games_played) + '<br> <span class="px-1 radius-1 bg-grey">-1</span></td><td class="smw" id="wonValue">' + (standings.won == null ? '-' : standings.won) + '</td><td class="smw" id="drawValue">' + (standings.draw == null ? '-' : standings.draw) + '</td><td class="smw" id="loseValue">' + (standings.lost == null ? '-' : standings.lost) + '</td><td class="smw" id="goalForValue">' + (standings.goals_scored == null ? '-' : standings.goals_scored) + '</td><td class="smw" id="goalAgainstValue">' + (standings.goals_against == null ? '-' : standings.goals_against) + '</td><td class="smw" id="goalDifferenceValue">' + (standings.goal_difference == null ? '-' : standings.goal_difference) + '</td></tr>');
                });
            });
        }
        else{
            $("#standings").empty();
            $("#standings").append('<img src="' + base_url + '/assets/img/detail-match/icon-menu/no-Data-Found.png" class="no-data-img">');

        }

        },
        error: function () {
        $("#standings").empty();       
        $("#standings").append('<img src="' + base_url + '/assets/img/detail-match/icon-menu/no-Data-Found.png" class="no-data-img">');
    }
    });  
    $.ajax({
        url:base_url+'/Stats/'+TeamId,
        method:'GET',
        success: function(response){
            if(response == null){
                return false;
            }
        $("#Record").append('<tr><td class="text-left club-stats-title">'+translations.Win+'</td><td>'+(response.win.home == null?'-':response.win.home)+'</td><td>'+(response.win.away == null?'-':response.win.away)+'</td><td>'+(response.win.total == null?'-':response.win.total)+'</td></tr><tr><td class="text-left club-stats-title">'+translations.Draw+'</td><td>'+(response.draw.home == null?'-':response.draw.home)+'</td><td>'+(response.draw.away == null?'-':response.draw.away)+'</td><td>'+(response.draw.total == null?'-':response.draw.total)+'</td></tr><tr><td class="text-left club-stats-title">'+translations.Lose+'</td><td>'+(response.lost.home == null?'-':response.lost.home)+'</td><td>'+(response.lost.away == null?'-':response.lost.away)+'</td><td>'+(response.lost.total == null?'-':response.lost.total)+'</td></tr>');

         $("#Goals").append('<tr><td class="text-left club-stats-title">'+translations.GoalsFor+'</td><td>'+(response.goals_for.home == null?'-':response.goals_for.home)+'</td><td>'+(response.goals_for.away == null?'-':response.goals_for.away)+'</td><td>'+(response.goals_for.total == null?'-':response.goals_for.total)+'</td></tr><tr><td class="text-left club-stats-title">'+translations.GoalsAgainst+'</td><td>'+(response.goals_against.home == null?'-':response.goals_against.home)+'</td><td>'+(response.goals_against.away == null?'-':response.goals_against.away)+'</td><td>'+(response.goals_against.total == null?'-':response.goals_against.total)+'</td></tr><tr><td class="text-left club-stats-title">'+translations.CleanSheets+'</td><td>'+(response.clean_sheet.home == null?'-':response.clean_sheet.home)+'</td><td>'+(response.clean_sheet.away == null?'-':response.clean_sheet.away)+'</td><td>'+(response.clean_sheet.total == null?'-':response.clean_sheet.total)+'</td></tr><tr><td class="text-left club-stats-title">'+translations.FailedToScore+'</td><td>'+(response.failed_to_score.home == null?'-':response.failed_to_score.home)+'</td><td>'+(response.failed_to_score.away == null?'-':response.failed_to_score.away)+'</td><td>'+(response.failed_to_score.total == null?'-':response.failed_to_score.total)+'</td></tr>');

    $("#Average").append('<tr><td class="text-left club-stats-title">'+translations.AvgGoalsPerGameScored+'</td><td>'+(response.avg_goals_per_game_scored.home == null?'-':response.avg_goals_per_game_scored.home)+'</td><td>'+(response.avg_goals_per_game_scored.away == null?'-':response.avg_goals_per_game_scored.away)+'</td><td>'+(response.avg_goals_per_game_scored.total == null?'-':response.avg_goals_per_game_scored.total)+'</td></tr><tr><td class="text-left club-stats-title">'+translations.AvgGoalsPerGameConceded+'</td><td>'+(response.avg_goals_per_game_conceded.home == null?'-':response.avg_goals_per_game_conceded.home)+'</td><td>'+(response.avg_goals_per_game_conceded.away == null?'-':response.avg_goals_per_game_conceded.away)+'</td><td>'+(response.avg_goals_per_game_conceded.total == null?'-':response.avg_goals_per_game_conceded.total)+'</td></tr><tr><td class="text-left club-stats-title">'+translations.AvgFirstGoalScored+'</td><td>'+(response.avg_first_goal_scored.home == null?'-':response.avg_first_goal_scored.home)+'</td><td>'+(response.avg_first_goal_scored.away == null?'-':response.avg_first_goal_scored.away)+'</td><td>'+(response.avg_first_goal_scored.total == null?'-':response.avg_first_goal_scored.total)+'</td></tr><tr><td class="text-left club-stats-title">'+translations.AvgFirstGoalConceded+'</td><td>'+(response.avg_first_goal_conceded.home == null?'-':response.avg_first_goal_conceded.home)+'</td><td>'+(response.avg_first_goal_conceded.away == null?'-':response.avg_first_goal_conceded.away)+'</td><td>'+(response.avg_first_goal_conceded.total == null?'-':response.avg_first_goal_conceded.total)+'</td></tr>');

    $.each(response.scoring_minutes,function(index,data){
        $("#Scoring").append('<tr><td class="text-left">'+(data.minute == null?'-':data.minute)+'</td><td class="text-right"><strong>'+(data.count == null?'-':data.count)+'</strong>&nbsp;/'+(data.percentage == null?'-':data.percentage)+'%</td></tr>');
    });

    $.each(response.goals_conceded_minutes,function(index,data){
        $("#Conceded").append('<tr><td class="text-left">'+(data.minute == null?'-':data.minute)+'</td><td class="text-right"><strong>'+(data.count == null?'-':data.count)+'</strong>&nbsp;/'+(data.percentage == null?'-':data.percentage)+'%</td></tr>');
    });

            $("#attacks").append(response.attacks);
            $("#dangerous_attacks").append(response.dangerous_attacks);
            $("#avg_ball_possession_percentage").append(response.avg_ball_possession_percentage);
            $("#shots_blocked").append(response.shots_blocked);
            $("#shots_off_target").append(response.shots_off_target);
            $("#avg_shots_off_target_per_game").append(response.avg_shots_off_target_per_game);
            $("#shots_on_target").append(response.shots_on_target);
            $("#avg_shots_on_target_per_game").append(response.avg_shots_on_target_per_game);
            $("#avg_corners").append(response.avg_corners);
            $("#total_corners").append(response.total_corners);
            $("#btts").append(response.btts);
            $("#avg_player_rating").append(response.avg_player_rating);
            $("#avg_player_rating_per_match").append(response.avg_player_rating_per_match);
            $("#tackles").append(response.tackles);
            $("#redcards-stats").append(response.redcards);
            $("#yellowcards-stats").append(response.yellowcards);
            $("#fouls").append(response.fouls);
            $("#offsides").append(response.offsides);


        }
    });
}
    function timeCalculate(autocall) {
        var demoautoCall = [];

        $.each(autocall, function (index, response) {

            var diff = (response.time - new Date());
            var day = 0;
            const a = null;
            if (diff > 0) {
                var day = parseInt(diff / (24 * 60 * 60 * 1000));
                var hhTime = diff % (24 * 60 * 60 * 1000);
                var hour = parseInt(hhTime / (60 * 60 * 1000));
                var mmTime = hhTime % (60 * 60 * 1000);
                var minute = parseInt(mmTime / (60 * 1000));
                var ssTime = mmTime % (60 * 1000);
                var second = parseInt(ssTime / 1000);

                var id = response.id;
                var countdownElement = $("#" + id);

                // Construct the countdown timer string
                var countdownString = "";
                if (day > 0) {
                    countdownString += day + 'd ';
                }
                if (hour > 0) {
                    countdownString += hour + 'h ';
                }
                if (minute > 0) {
                    countdownString += minute + 'm ';
                }
                countdownString += second + 's';

                countdownElement.html(countdownString);

                if (day == 0) {
                    const a = { time: response.time, id: response.id, day: day };
                    demoautoCall.push(a);
                }

                // Update the Countdown Timer every second
                if (diff > 1000) {
                    setTimeout(function () {
                        timeCalculate([response]);
                    }, 1000);
                } else {
                    // The countdown has reached 0, update the message
                    countdownElement.html("You are good to go!");
                }
            } else {
                countdownElement.html("You are good to go!");
            }
        });
        autocall = demoautoCall;

        if (autocall.length != 0) {
            setTimeout(function () {
                timeCalculate(autocall);
            }, 1000);
        }
    }
    function mylisting() {
        var size_item = $('.listing').length;
        var v=3;
        $('.listing').hide(); // hide all divs with class `listing`
        if(size_item <= 1){ $("#load_more").hide(); }

        $('.listing:lt('+v+')').show();

        $('#load_more').click(function (e) {
            e.preventDefault();
            //alert(size_item); return false;
            v= (v+3 <= size_item) ? v+3 : size_item;
            // var abcd=$(".listing").length;
            // alert(abcd); return false;
            $('.listing:lt('+v+')').show();
            // hide load more button if all items are visible
            if($(".listing:visible").length >= size_item ){ $("#load_more").hide(); }
        });
    }
    function myPreviouslisting() {
        var size_item = $('.previouslisting').length;
        var v=3;
        $('.previouslisting').hide(); // hide all divs with class `previouslisting`
        if(size_item <=1) {$("#previouslisting_more").hide(); }
        $('.previouslisting:lt('+v+')').show();

        $('#previouslisting_more').click(function (e) {
            e.preventDefault();

            //alert(size_item); return false;
            v= (v+3 <= size_item) ? v+3 : size_item;
            // var abcd=$(".previouslisting").length;
            // alert(abcd); return false;
            $('.previouslisting:lt('+v+')').show();
            // hide load more button if all items are visible
            if($(".previouslisting:visible").length >= size_item ){ $("#previouslisting_more").hide(); }
        });
    }
    $(document).on("click", "#followBtn", function () {
                    var team_id = document.getElementById('team_id').value;       
                    var league_id = document.getElementById('league_id').value;       
                    var teamName = $(this).data("team-nm");
                    var teamCode = $(this).data("team-code");
                    var teamLogo = $(this).data("team-lgo");
                    var leagueName = $(this).data("league-name");
                    var followButton = $(this);

        $.ajax({
        url: base_url + '/getUser',
        method: 'GET',
        success: function(responses){
            if (responses === '') {
                Swal.fire({
                    title:'<span id="popUpTitle">'+translations.login_first+'</span>',
                    icon: "info",
                    showCancelButton: true, // Show the cancel button
                    confirmButtonText: '<span id="positiveTxt">'+translations.Login+'</span>',
                    cancelButtonText: '<span id="negativeTxt">'+translations.cancel+'</span>',
                }).then((result) => {
                    if (result.isConfirmed) {
                        // If the user clicks the confirm (Login) button
                        window.location.replace(base_url + '/login');
                        console.log(responses);
                        console.log('user');
                    } else if (result.isDismissed) {
                        // If the user clicks the cancel button
                        console.log('Cancelled');
                    }
                });
            } else {

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        url: base_url + '/followTeam',

                        data: {
                                teamName: teamName,
                                team_id:team_id,
                                teamCode: teamCode,
                                teamLogo: teamLogo,
                                league_id:league_id,
                                leagueName: leagueName
                            },
                        type: 'POST',
                        success: function(responses) {
                            console.log(responses);
                            var table_id = responses.table_id;
                            Swal.fire({
                            title: '<span id="popUpTitle">'+ translations.fav_team +'</span>',
                            icon: "success",
                            confirmButtonText: '<span id="positiveTxt">Okay</span>', // Text for the confirm button                   
                            });

                            followButton.remove(); // Remove the follow button
                            $("#follow-container").append(
                                '<button class="btn btn-lg unfollow-button" ' +
                                'data-table-id="' + table_id + '" ' +
                                'data-team-nm="' + followButton.data("team-nm") + '" ' +
                                'data-team-code="' + followButton.data("team-code") + '" ' +
                                'data-team-lgo="' + followButton.data("team-lgo") + '" ' +
                                'data-league-name="' + followButton.data("league-name") + '" id="unfollowBtn"> '+translations.Unfollow+'</button>'
                            );

                            
                        },
                        error: function () {                    
                       Swal.fire({
                            title: "Error! Can't Add Team now",
                            icon: "error",
                            confirmButtonText: "Retry",            
                            });

                        },
                    });
                
            }
        }
        });
    });
    $(document).on("click", "#unfollowBtn", function () {
        var unfollowButton = $(this);
        var table_id = unfollowButton.data("table-id");

        $.ajax({
            url: base_url + '/team/delete/' + table_id,
            method: 'GET',
            success: function (response) {
            Swal.fire({
                title: '<span id="popUpTitle">'+ translations.deleted +'</span>',
                html: '<span id="popUpTxt">'+ translations.team_deleted +'</span>',
                icon: "success",
                confirmButtonText: '<span id="positiveTxt">Okay</span>',
            });

                // Replace the "Unfollow" button with the "Follow" button
                unfollowButton.remove(); // Remove the unfollow button
                $("#follow-container").append(
                    '<button class="btn btn-lg follow-button" ' +
                    'data-team-nm="' + unfollowButton.data("team-nm") + '" ' +
                    'data-team-code="' + unfollowButton.data("team-code") + '" ' +
                    'data-team-lgo="' + unfollowButton.data("team-lgo") + '" ' +
                    'data-league-name="' + unfollowButton.data("league-name") + '" id="followBtn">'+translations.Follow+'</button>'
                );
            },
            error: function (error) {
                // Handle the error response
                Swal.fire("Error!", error.responseJSON.error, "error");
            },
            complete: function () {
                swal.update({ allowOutsideClick: true });
            }
        });
    });
});
