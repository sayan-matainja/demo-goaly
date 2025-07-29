var base_url = window.location.origin;
// const tz = Intl.DateTimeFormat().resolvedOptions().timeZone;
// document.cookie='fcookie='+tz;
// function headToHead(homeTeamId,awayTeamId) {
//     var homeTeamId= homeTeamId;
//     var awayTeamId= awayTeamId;
$(document).ready(function () {
    var homeTeamId = document.getElementsByName('homeTeamId')[0].value;

    var awayTeamId = document.getElementsByName('awayTeamId')[0].value;

    var match_id = document.getElementsByName('match_id')[0].value;
    var H_goal = 0;
    var A_goal = 0;

    $(".nav-link").click(function () {
        // Change the image source for the clicked link
        var imageName = $(this).data("image");
        $(this).find("img").attr("src", base_url + "/assets/img/detail-match/icon-menu/" + imageName + "2.png");

        // Reset the image source for other links
        $(".nav-link").not(this).each(function () {
            var otherImageName = $(this).data("image");
            $(this).find("img").attr("src", base_url + "/assets/img/detail-match/icon-menu/" + otherImageName + ".png");
        });
    })

    myTimeline();
    // console.log(match_id);



    $.ajax({
        url: base_url + '/players/' + match_id,
        method: 'GET',
        success: function (responseMatches) {

            console.log(responseMatches);
        if(responseMatches.playersStats.length != 0){
            $("#sk_loader_match_details_player").hide();
            $("#player_info").show();


            // console.log(responseMatches);
            $.each(responseMatches.playersStats.final_passes, function (index, response) {
                $("#final_passes").append('<tr><td class="one"><img src="'+ response.team_logo + '" alt="" style="height: 25px; width: 25px;" id="passesClubIcn"></td><td class="ver-mid" id="passesPlayer">'+ response.players_name + '</td><td class="one"><img src="'+ response.players_logo + '" alt="" style="height: 25px; width: 25px;" id="passesPlayerImg"></td><td class="text-right"><strong id="passesValue">' + response.passes_success + '</strong>/<strong>' + response.passes_total + '</strong></td></tr>'
            );
            });
            $.each(responseMatches.playersStats.final_passingAccuracy, function (index, response) {
                $("#final_passingAccuracy").append('<tr><td class="one"><img src="'+ response.team_logo + '" alt="" style="height: 25px; width: 25px;" id="passingAccuracyClubImg"></td><td class="ver-mid" id="passingAccuracyPlayer">'+ response.players_name + '</td><td class="one"><img src="'+ response.players_logo + '" alt="" style="height: 25px; width: 25px;" id="passingAccuracyPlayerImg"></td><td class="text-right" id="passingAccuracyValue"><strong>' + response.passing_accuracy + '%</strong></td></tr>');
            });
            $.each(responseMatches.playersStats.final_crosses, function (index, response) {
                $("#final_crosses").append('<tr><td class="one"><img src="' + response.team_logo + '" alt="" class="player-img" id="crossesClubIcn"></td><td class="ver-mid" id="crossesPlayer">' + response.players_name + '</td><td class="one"><img src="' + response.players_logo + '" alt="" class="player-img" id="crossesPlayerImg"></td><td class="text-right"><strong id="crossesValue">' + response.crosses_accuracy + '</strong>/<strong>' + response.crosses_total + '</strong></td></tr>');
            });
            $.each(responseMatches.playersStats.final_shots, function (index, response) {
                $("#final_shots").append('<tr><td class="one"><img src="' + response.team_logo + '" alt="" class="player-img" id="shotsClubImg"></td><td class="ver-mid" id="shotsPlayer">' + response.players_name + '</td><td class="one"><img src="' + response.players_logo + '" alt="" class="player-img" id="shotsPlayerImg"></td><td class="text-right"><strong>' + response.shots_goal + '</strong>/<strong id="shotsValue">' + response.shots_onTarget + '</strong>/<strong>' + response.shots_total + '</strong></td></tr>');
            });
            $.each(responseMatches.playersStats.final_changesCreated, function (index, response) {
                $("#final_changesCreated").append('<tr><td class="one"><img src="' + response.team_logo + '" alt="" class="player-img" id="chancesImg"></td><td class="ver-mid" id="chancesPlayer">' + response.players_name + '</td><td class="one"><img src="' + response.players_logo + '" alt="" class="player-img" id="chancesPlayerImg"></td><td class="text-right"><strong id="chancesValue">' + response.created_assists + '</strong>/<strong>' + response.created_chances + '</strong></td></tr>');
            });
        }
        else{
            $("#sk_loader_match_details_player").hide();            
            $("#player_info").empty();
            $("#player_info").append('<img src="' + base_url + '/assets/img/detail-match/icon-menu/no-Data-Found.png" class="no-data-img">');
            $("#player_info").show();
        
        }
        }
    });

    $(document).on('click', '#playerTab', function (e) {
        
        playermatchDetails();

        $(document).on('change', '#teamDropDown', function (e) {
        e.preventDefault();
        playermatchDetails();
    });

        $(document).on('change', '#positionDropDown', function (e) {
        
        e.preventDefault();
        playermatchDetails();
    });

    function playermatchDetails(){

        
        var team_id = $('#teamDropDown').val();
        var position = $('#positionDropDown').val();



                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                    var container = $('#adv-player_infos');

        var container = $('#adv-player_infos');

        $.ajax({
            type: "POST",
            dataType: "json",
            url: base_url + '/playermatchDetails',
            data: {
                match_id: match_id,
                team_id: team_id,
                position: position,
            },
            success: function (responseMatches) {
                console.log(responseMatches);

                if (responseMatches.length !== 0) {
                    // Clear the container before appending new data
                    container.empty();

                    $.each(responseMatches, function (index, data) {
                        var playerDesign = '<div class="detail-match-player">' +
                            '<div class="detail-match-player-head">' +
                            '<div class="row d-flex ais-center">' +
                            '<div class="col-xs-6" style="width: 60%; display: flex; flex-direction: row; justify-content: center; align-items: center;">' +
                            '<img class="player-club" src="' + data.team_logo + '" alt="Team Logo" style="width: 20%;" id="clubImg">' +
                            '<strong style="width: 60%;" id="playerName">' + data.player_name + '</strong>' +
                            '<img class="player-club" src="' + data.players_logo + '" alt="Player Logo" style="width: 20%;" id="playerImg">' +
                            '</div>' +
                            '<div class="col-xs-6 text-right">' +
                            '<span class="mr-2" id="playTime"><i class="icon-time-left"></i>' + data.minutes_played + '</span>' +
                            '<i class="icon-star" id="rating"></i>' + data.rating +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '<div class="detail-match-player-body">' +
                            '<div class="row row-no-gutters" style="margin: 0;">' +
                            '<div class="col-xs-6">' +
                            '<div class="box-item d-flex j-between">' +
                            '<div class="box-item-point" id="goalVar">Goals</div>' +
                            '<div class="box-item-val" id="goalValue">' + data.goal + '</div>' +
                            '</div>' +
                            '<div class="box-item d-flex j-between">' +
                            '<div class="box-item-point" id="assistVar">Assists</div>' +
                            '<div class="box-item-val" id="assistValue">' + data.assists + '</div>' +
                            '</div>' +
                            '<div class="box-item d-flex j-between">' +
                            '<div class="box-item-point" id="dribblesVar">Dribbles</div>' +
                            '<div class="box-item-val" id="dribblesValue">' + data.dribbles + '</div>' +
                            '</div>' +
                            '<div class="box-item d-flex j-between">' +
                            '<div class="box-item-point" id="crossessVar">Crossess</div>' +
                            '<div class="box-item-val" id="crossessValue">' + data.crosses + '</div>' +
                            '</div>' +
                            '<div class="box-item d-flex j-between">' +
                            '<div class="box-item-point" id="goalSaveVar">Goal Save</div>' +
                            '<div class="box-item-val" id="goalSaveValue">' + data.goal_save + '</div>' +
                            '</div>' +
                            '</div>' +
                            '<div class="col-xs-6">' +
                            '<div class="box-item d-flex j-between">' +
                            '<div class="box-item-point" id="foulsVar">Fouls</div>' +
                            '<div class="box-item-val" id="foulsValue">' + data.fouls + '</div>' +
                            '</div>' +
                            '<div class="box-item d-flex j-between">' +
                            '<div class="box-item-point" id="tacklesVar">Tackles</div>' +
                            '<div class="box-item-val" id="tacklesValue">' + data.tackles + '</div>' +
                            '</div>' +
                            '<div class="box-item d-flex j-between">' +
                            '<div class="box-item-point" id="redCardVar">Red Card</div>' +
                            '<div class="box-item-val" id="redCardValue">' + data.red_card + '</div>' +
                            '</div>' +
                            '<div class="box-item d-flex j-between">' +
                            '<div class="box-item-point" id="yellowCardVar">Yellow Card</div>' +
                            '<div class="box-item-val" id="yellowCardValue">' + data.yellow_card + '</div>' +
                            '</div>' +
                            '<div class="box-item d-flex j-between">' +
                            '<div class="box-item-point" id="duelsWonVar">Duels Won</div>' +
                            '<div class="box-item-val" id="duelsWonValue">' + data.duels_won + '</div>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '</div>';


                        container.append(playerDesign);
                    });
                } else {
                    container.empty();
                    container.append('<img src="' + base_url + '/assets/img/detail-match/icon-menu/no-Data-Found.png" class="no-data-img">');
                }
            }
        });

    }

    
        });










    $.ajax({
        url: base_url + '/HandToHand/' + homeTeamId + '/' + awayTeamId,
        method: 'GET',
        success: function (responseMatches) {
               var h_class, a_class;
            if (responseMatches['statusOfGame'] != null) {
                $("#wins").append(responseMatches['statusOfGame']['win']);
                $("#draw").append(responseMatches['statusOfGame']['draw']);
                $("#loss").append(responseMatches['statusOfGame']['loss']);
            }
            $.each(responseMatches['matches'], function (index, response) {
                if (response['date'] != null) {


                    if (response['homeTeamScore'] > response['awayTeamScore']) {
                        h_class = 'green';
                        a_class = 'red';
                    } else if (response['homeTeamScore'] < response['awayTeamScore']) {
                        h_class = 'red';
                        a_class = 'green';
                    } else {
                        h_class = 'gray';
                        a_class = 'gray';
                    }
                    var dayInformation = String(moment(response['date']));
                    var position = dayInformation.indexOf(" ");
                    let result = dayInformation.substring(0, position);
                    $("#matchHead").append('<tr><td width="25%" class="text-date"><time datetime="1639161000000">' + result + '<br id="matchDate">' + response['date'] + '</time></td><td><div class="col-xs-2 handToHand" style="font-weight:750";><p id="hClubName">' + response['homeTeam'] + '</p></div><div class="col-xs-2 handToHand"><img class="handToHandimg" src="' + response['homeTeamLogo'] + '"></div><div class="col-xs-4 handToHand"><strong><span style="color: ' + h_class + ';" id="score">' + response['homeTeamScore'] + '</span> - <span style="color: ' + a_class + ';">' + response['awayTeamScore'] + '</span></strong></div><div class="col-xs-2 handToHand"><img class="handToHandimg" src="' + response['awayTeamLogo'] + '"></div><div class="col-xs-2 handToHand"><p id="aClubName">' + response['awayTeam'] + '</p></div></td></tr>');

                }


                if (response['winnerTeamId'] != null) {
                    if ((homeTeamId == response['homeTeamId']) && (response['status'] != "2")) {
                        H_goal += response['homeTeamScore'];


                    } else if ((homeTeamId == response['awayTeamId']) && (response['status'] != "2")) {
                        H_goal += response['awayTeamScore'];

                    }

                    if ((awayTeamId == response['homeTeamId']) && (response['status'] != "2")) {
                        A_goal += response['homeTeamScore'];
                    } else if ((awayTeamId == response['awayTeamId']) && (response['status'] != "2")) {
                        A_goal += response['awayTeamScore'];
                    }
                    if (response['status'] == "2") {


                        H_goal += response['homeTeamScore'];
                        A_goal += response['awayTeamScore'];


                    }
                    $("#hGoals").text(H_goal);
                    $("#aGoals").text(A_goal);

                }

                var totalGoals = H_goal + A_goal;
                var hGoalPercentage = (H_goal / totalGoals) * 100;
                var aGoalPercentage = (A_goal / totalGoals) * 100;

                // Update the progress bars' widths
                $('#homegoals').css('width', hGoalPercentage + '%');
                $('#awaygoals').css('width', aGoalPercentage + '%');

            });
        }
    });


    var size_item = $('.listing').length;
    var v = 3;
    $('.listing').hide(); // hide all divs with class `listing`
    $('.listing:lt(' + v + ')').show();
    $('#load_more').click(function () {
        //alert(size_item); return false;
        v = (v + 3 <= size_item) ? v + 3 : size_item;
        // var abcd=$(".listing").length;
        // alert(abcd); return false;
        $('.listing:lt(' + v + ')').show();
        // hide load more button if all items are visible
        if ($(".listing:visible").length >= size_item) { $("#load_more").hide(); }
    });

    let activity = $('.activity')
    for (var i = 0; i < 10; i++) {
        activity.clone().appendTo('#timeline')
    }
})
function myTimeline() {

    $("#sk_loader_match_details_timeline").show();
    var match_id = document.getElementsByName('match_id')[0].value;
    $.ajax({
        url: base_url + '/matchTimeline/' + match_id,
        method: 'GET',
        success: function (responseMatches) {
            console.log(responseMatches);
            var shortComment;
            var img;



            $("#sk_loader_match_details_timeline").hide();
            $("#timeline").show();
            if(responseMatches.comments.length != 0){
            responseMatches['comments'].sort((a, b) => {
                if (a.comment.search(/game finished/i) >= 0) return -1;
                if (b.comment.search(/game finished/i) >= 0) return 1;

                const aTotalMinute = (a.minute || 0) + (a.extra_minute || 0);
                const bTotalMinute = (b.minute || 0) + (b.extra_minute || 0);

                if (aTotalMinute !== bTotalMinute) {
                    return bTotalMinute - aTotalMinute;
                }

                return (b.order || 0) - (a.order || 0);
            });


            $.each(responseMatches.comments, function (index, response) {
                let img, shortComment;

                if (response.comment.search(/Foul/i) >= 0) {
                    shortComment = "FOUL";
                    img = "/assets/img/detail-match/icon-timeline/Group 114.png";
                } else if (response.is_goal == true) {
                    shortComment = "GOAL";
                    img = "/assets/img/detail-match/icon-timeline/goal.png";
                } else if (response.comment.search(/Corner/i) >= 0) {
                    shortComment = "CORNER";
                    img = "/assets/img/detail-match/icon-timeline/corner1.png";
                } else if (response.comment.search(/yellow card/i) >= 0) {
                    shortComment = "YELLOW CARD";
                    img = "/assets/img/icon-timeline/Group 117.png";
                } else if (response.comment.search(/receive red card/i) >= 0) {
                    shortComment = "RED CARD";
                    img = "/assets/img/icon-timeline/Group 116.png";
                } else if (response.comment.search(/Substitution/i) >= 0) {
                    shortComment = "SUBSTITUTION";
                    img = "/assets/img/icon-timeline/Group 120.png";
                } else if (response.comment.search(/free kick/i) >= 0) {
                    shortComment = "FREE KICK";
                    img = "/assets/img/icon-timeline/Group 115.png";
                } else if (response.comment.search(/Half ended/i) >= 0) {
                    shortComment = response.comment.search(/First Half ended/i) >= 0 ? "FIRST HALF END" : "SECOND HALF END";
                    img = "/assets/img/detail-match/icon-timeline/Group 114.png";
                } else if (response.comment.search(/Hand|Offside/i) >= 0) {
                    shortComment = response.comment.search(/Hand/i) >= 0 ? "HAND" : "OFFSIDE";
                    img = "/assets/img/detail-match/icon-timeline/Group 114.png";
                } else {
                    shortComment = response.comment.split(' ').slice(0, 2).map(word => word.toUpperCase()).join(' ');
                    img = "/assets/img/detail-match/icon-timeline/Group 114.png";
                }

                // Format the minute display
                let totalMinutes = response.minute ? parseInt(response.minute, 10) : 0;
                if (response.extra_minute) {
                    totalMinutes += parseInt(response.extra_minute, 10);
                }
                let eventTime = totalMinutes + '\'';
                
                $("#timeline").append(
                '<div class="activity" style="display:flex">' +
                    '<div class="">' +
                        '<div class="notif-icon">' +
                            '<div class="icon"><img src="' + base_url + img + '" alt="" id="eventIcn"></div>' +
                        '</div>' +
                    '</div>' +
                    '<div class="w-100">' +
                        '<div class="' + (shortComment === 'GOAL' ? 'green' : 'notif-body') + '">' +
                            '<div class="' + (shortComment === 'GOAL' ? 'goal-text' : 'msg') + '">' +
                                '<h4 style="font-size: 15px;" id="eventTitle">' + shortComment + 
                                    '<div class="goalTime" id="eventTime">' + eventTime + '</div>' +
                                '</h4>' +
                                '<span id="eventDescription">' + response.comment + '</span>' +
                            '</div>' +
                        '</div>' +
                    '</div>' +
                '</div>'
            );
        });

            console.log(responseMatches['status']);
            if (responseMatches['status'] == "NS" || responseMatches['status'] == "TBA") {
                $("#timeline").empty();
                $("#timeline").append('<div class="row activity"><img src="' + base_url + '/assets/img/detail-match/icon-menu/no-Data-Found.png" class="no-data-img"></div>');

                setTimeout(myTimeline, 60000);
            }

        }
            else{
                $("#timeline").empty();
                $("#timeline").append('<div class="row activity"><img src="' + base_url + '/assets/img/detail-match/icon-menu/no-Data-Found.png" class="no-data-img"></div>');

            }

        },
        error: function(xhr, textStatus, errorThrown) {
                 $("#timeline").empty();
                $("#timeline").append('<div class="row activity"><img src="' + base_url + '/assets/img/detail-match/icon-menu/no-Data-Found.png" class="no-data-img"></div>');
        }   
     });

}



function appendChatMessages(response) {
    var chatContainer = $("#live-chat").find('.chat');
    chatContainer.empty();
    if (response.length > 0) {
        response.forEach(function (comment) {
            var date_time = comment.c_time;
            var localTime = moment.utc(date_time).tz($("#userTimeZone").val());
            var currentTime = moment();
            var timeDiffSeconds = currentTime.diff(localTime, 'seconds');

            function formatTimeAgo(seconds) {
                if (seconds < 60) {
                    return seconds + " seconds ago";
                } else if (seconds < 3600) {
                    var minutes = Math.floor(seconds / 60);
                    return minutes + " minutes ago";
                } else if (seconds < 86400) {
                    var hours = Math.floor(seconds / 3600);
                    return hours + " hours ago";
                } else {
                    var days = Math.floor(seconds / 86400);
                    return days + " days ago";
                }
            }
            var chatMessageHTML = 
                '<div class="liveChatContain">' +
                    '<div class="AccountInfo">' +
                        '<div class="AcountImg">' +
                            (comment.image ?
                                '<img src="' + base_url + '/uploads/' + comment.image + '" id="photoProfile">' :
                                '<img src="' + base_url + '/assets/img/default_avatar.png" id="photoProfile">'
                            ) +
                        '</div>' +
                        '<div class="AcountDetails">' +
                            '<div class="AcountName">' +
                                '<strong class="primary-font" id="name">' + comment.name + '</strong>' +
                            '</div>' +
                            '<div class="TimeDetails">' +
                                '<small class="pull-right text-muted">' +
                                    '<img src="' + base_url + '/images/prizeImage/clock.svg" id="messageTime">' +
                                    '<time  class="timeago" datetime="' + localTime.format() + '"  style="margin-left: 2px;">' + formatTimeAgo(timeDiffSeconds) + '</time>' +
                                '</small>' +
                            '</div>' +
                        '</div>' +
                    '</div>' +
                    '<div class="chat-body">' +
                        '<p id="message">' + comment.comment + '</p>' +
                    '</div>' +
                    '<hr style="border-top: 3px solid #eee">' +
                '</div>';

            chatContainer.append(chatMessageHTML);
        });
    } else {
        chatContainer.html("<p>No comments available.</p>");
    }

    chatContainer.scrollTop(chatContainer[0].scrollHeight);
}







$("#sendBtn").click(function () {
    var comment = $('#messageInput').val();
    var match_id = document.getElementsByName('match_id')[0].value; // Get the value of the first element with the name 'match_id'

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: base_url + '/getUser',
        method: 'GET',
        success: function (responses) {
            if (responses === '') {

                Swal.fire({
                    title: '<span id="popUpTitle">Please Login !!</span>',
                    icon: "info",
                    showCancelButton: true, // Show the cancel button
                    confirmButtonText: '<span id="positiveTxt">Login</span>', 
                    cancelButtonText:  '<span id="negativeTxt">Cancel</span>',
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


                $.ajax({
                    url: base_url + '/usercomment',
                    data: {
                        comment: comment,
                        match_id: match_id // Include match_id in the data object
                    },
                    method: 'POST',
                    success: function (response) {
                        $('#messageInput').val('');
                        console.log(response);
                        appendChatMessages(response);

                    },
                    error: function (xhr, textStatus, errorThrown) {
                        // Handle error cases using swal
                        var errorMessage = xhr.responseJSON && xhr.responseJSON.message
                            ? xhr.responseJSON.message
                            : "An error occurred while processing your request.";
                        Swal.fire("Error", errorMessage, "error");
                    }
                });


            }
        }
    });
});
////////////