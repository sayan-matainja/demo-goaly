
var myTeam=[];
var base_url = window.location.origin;
var c=0;
// var User
    $(document).ready(function() {
var $j = jQuery.noConflict();

var userId = $('#session').val();
var selectedLeagueID = " ";


        getUserFavourites();

function getUserFavourites() {
    $.ajax({
        url: base_url + '/UserFavourite',
        method: 'GET',
        success: function (responses) {
            var tableBody = $("#favTeamTable").find("tbody");
            tableBody.empty();
            $("#UserFavourite").empty();
            

            if (responses.userFavteams.length > 0) {
                var count = 0;
                $.each(responses.userFavteams, function (index, response) {
                    if (count < 3) {
                        $("#UserFavourite").append('<div class="favClubLogo"><img id="favouriteClub" src="' + response.badge + '" alt=""></div> ');

                        count++;
                    }
                var row = $("<tr>");

                var editIcon = '<a href="' + base_url + '/team/details/' + response.id + '" id="clubDetail"><i class="fa fa-external-link" aria-hidden="true" style="font-size: 20px; color: rgb(0, 153, 204);"> </i></i></a>';
                var deleteIcon = '<a class="delete-icon" data-id="' + response.table_id + '" id="deleteIcn"><i class="fa fa-trash" style="font-size: 22px; color: red; padding: 6px;"></i></a>';
                var badgeImage = '<img src="' + response.badge + '" alt="Badge" style="height: 30px; width: auto;" id="clubImg">';

                row.append('<td >' + badgeImage + '</td>');
                row.append('<td id="clubName">' + response.name + '</td>');
                row.append('<td></td>'); // Add a column for icons
                row.find("td:last").append(editIcon).append(deleteIcon);

                tableBody.append(row);

                });
            } else {
                // If no response, append the default image
                $("#UserFavourite").append('<div><img src="assets/img/no-club.png" alt="club" style="height:69px; margin-right: 25px"></div>');
                tableBody.append('<tr><td colspan="4">No records found.</td></tr>');

            }
            console.log(responses);
        }
    });
}

    $("#show").click(function(){
    $.ajax({
        url: base_url + '/getUser',
        method: 'GET',
        success: function(responses){
            if (responses === '') {
                Swal.fire({
                title: '<span id="popUpTitle">'+translations.login_first+'</span>',
                icon: 'info', // Use the information (info) icon
                showCancelButton: true,
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
                $("#myModalClub").modal("show");
                $("#hide").removeClass('hide');
                $('#myTeam').addClass('hide');
            }
        }
    });
});

        $("#clubHide").click(function(){
            $("#hide").addClass('hide');
            $('#myTeam').removeClass('hide');
        });
        $('#skloader-contest').hide();
        $('.contest').show();

var myTeam = [];

$j("#addBtn").click(function(event) {
    var teamContainer = $("#myModalClub").find(".team-containerr"); // Get the modal element
    teamContainer.empty();     
    $.ajax({
        url: base_url + '/Leaguebyteam' ,
        method: 'GET',
        success: function (responses) {
            myTeam = [];
            console.log(responses);
            $.each(responses, function (index, response) {
                var id = "team-ui-" + response.league_id;
                var tid = parseInt(response.id) + '-' + parseInt(response.league_id);

                var logoContainer = $('<div>', {
                    class: 'pd-5',
                    id: 'club-select-' + tid,
                    style: 'display: flex; flex-direction: column; justify-content: center; align-items: center; position: relative; padding: 10px; width: 33%; float: left;'
                });

                var logoImg = $('<img>', {
                    src: response.logo_path,
                    alt: '',
                    style: 'height: 75px; width: 75px;',
                    id: 'clubImg' // Add the id attribute
                });


                var tickIcon = $('<div>', {
                    id: 'club-select-remuve-' + tid,
                    style: 'position: absolute; padding: 5px 10px; background: rgba(0, 0, 0, 0.5); color: green; border-radius: 2px; display: none;',
                    html: '<svg class="hydrated sc-bdVaJa fUuvxv" fill="#1aaf25" width="32px" height="32px" viewBox="0 0 1024 1024" rotate="0"><path d="M372.602 679.786l-180.602-180.864-64 61.014 244.602 244.064 523.398-522.988-64-61.012z"></path></svg>'
                });

                if (response.status === 'selected') {
                    tickIcon.css('display', 'block');
                }

                logoContainer.append(logoImg);
                logoContainer.append(tickIcon);

                $("#" + id).append(logoContainer);

                // Handle team selection and deselection
                logoContainer.click(function () {
                    if (response.status === 'selected') {
                        // Logo is already selected, untick it
                        myTeam.splice(myTeam.indexOf(response), 1);
                        tickIcon.css('display', 'none'); // Hide tick icon
                        response.status = ''; // Update the status
                    } else {
                        myTeam.push(response);
                        tickIcon.css('display', 'block'); // Display tick icon
                        response.status = 'selected'; // Update the status
                    }
                });

                // Prevent unticking if already selected
                if (response.status === 'selected') {
                    logoContainer.off('click');
                }
            });
        }
    });
    $('#myModalClub').modal({
        backdrop: false    
    }).modal('show');
});

//empty the selected teams
$('#myModalClub').on('hidden.bs.modal', function () {
    myTeam = [];
});


$("#saveBtn").click(function(event) {
    event.preventDefault(); // Prevent the default form submission or link behavior
    $("#myModalClub").modal("hide");
    if (myTeam.length === 0) {
        Swal.fire({
                        title: '<span id="popUpTitle"> '+ translations.no_team +' </span>',
                        icon: "info",
                        confirmButtonText: '<span id="positiveTxt">Okay</span>', 
                    });
    } else {
        console.log(myTeam);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: base_url + '/UpdateTeam',
            data: { 'users': myTeam },
            type: 'POST',
            success: function(responses) {
                console.log(responses);
                 Swal.fire({
                            title: '<span id="popUpTitle">'+ translations.fav_team +'</span>',
                            icon: "success",
                            confirmButtonText: '<span id="positiveTxt">Okay</span>', 
                            });
                getUserFavourites();

                // Reload the page after a successful response
                // window.location.reload();
            }
        });
    }
});




$j(document).on("click", ".favClubLogo", function (event) {
    
 if(userId != '')
 {
     $("#favteams")
         .modal({
             backdrop: false,
         })
         .modal("show");
 }
});

$j(document).on("click", ".delete-icon", function (event) {
     event.preventDefault();
    var teamId = $(this).data("id");
      console.log(teamId);
    Swal.fire({
        title: '<span id="popUpTitle">'+ translations.team_remove +'</span>',
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: '<span id="positiveTxt">Yes</span>',
        cancelButtonText: '<span id="negativeTxt">Cancel</span>',
        allowOutsideClick: false, // Prevent clicking outside the modal
    }).then((result)=> {
                    if (result.isConfirmed) {
            $.ajax({
                url: base_url + '/team/delete/' + teamId,
                method: 'GET',
                success: function (response) {
                    Swal.fire({
                title: '<span id="popUpTitle">'+ translations.deleted +'</span>',
                html: '<span id="popUpTxt">'+ translations.team_deleted +'</span>',
                icon: "success",
                confirmButtonText: '<span id="okBtn">Okay</span>',
                });

                    $('#favteams').modal('hide'); 
                    getUserFavourites();
                  
                    // window.location.reload();

                },
                error: function (error) {
                    // Handle the error response
                    Swal.fire("Error!", error.responseJSON.error, "error");

                },
                complete: function () {
                    // Allow clicking outside the modal again after AJAX request is complete
                    swal.update({ allowOutsideClick: true });
                }
            });
        }
    });
});
    $(document).on('click', '.show-contestants-link', function(e){
        e.preventDefault(); // Prevent the default behavior of the link
        var id = $(this).data('id'); // Get the competition ID from the data attribute
        $('#contestantTableBody').empty();
            $.ajax({
                url: '/getContestant/' + id, // Change the URL to match your route
                method: 'GET',
                success: function (data) {
                    // Clear existing table rows
                    console.log(data);
                    
                      // Check if any players are found
                        if (data.players.length === 0) {
                            var noPlayerRow = '<div style="display: flex; line-height: 100px; align-items: center; justify-content: center;"><span style="color: red; font-size: 14px; font-weight: 100; letter-spacing: 1px;" id="noPlayerTxt"> '+translations.no_players+'</span></div>';
                            $('#contestantTableBody').append(noPlayerRow);
                            return; // Exit the function
                        }
                        var tableHeading = '<tr class="clr-aqua">' +
                        '<th id="numberTitle">'+translations.No+'</th>' +
                        '<th id="playerTitle">'+translations.Players+'</th>' +
                         (data.status === 'winner' ? '<th id="pointTitle">'+translations.Points+'</th>' : '<th id="pointTitle">'+translations.Prediction+'</th>') +
                        '</tr>';
                    $('#contestantTableBody').append(tableHeading);
                    // Populate the table with contestant data
                  function isEmpty(value) {
                        return value === undefined || value === null || value.trim() === '';
                    }

                    $.each(data.players, function (index, player) {
                        var playerName = !isEmpty(player.name) ? player.name : 'xxxxxxx' + player.msisdn.slice(-4);
                        var row = '<tr class="wpos">' +
                            '<td id="number">' + (index + 1) + '</td>' +
                            '<td id="user"><a class="contestants_answer" href="#" data-userid="' + player.user_id + '" data-predid="' + player.pred_id + '" data-toggle="modal" data-target="#answer">' + playerName + '</a></td>' +
                            '<td id="point"><strong>' + player.pts + '</strong></td>' +
                            '</tr>';
                        $('#contestantTableBody').append(row);
                    });




                },

                 error: function(xhr, textStatus, errorThrown) {
                // Handle AJAX error here
                var noPlayerRow = '<div style="display: flex; line-height: 100px; align-items: center; justify-content: center;"><span style="color: red; font-size: 14px; font-weight: 100; letter-spacing: 1px;" id="noPlayerTxt"> '+translations.no_players+'</span></div>';
                $('#contestantTableBody').empty();
                $('#contestantTableBody').append(noPlayerRow);
            }
            });
        });


$(document).on('click', '.contestants_answer', function(e){

    $('#answerTableBody').empty();
    $('#cotestent').empty();
    $('#loaderIimg').show();

    e.preventDefault();
    var userId = $(this).data('userid');
    var predId = $(this).data('predid');

    $.ajax({
        url: base_url +'/getUserQusAns',
        data: { userId, predId },
        method: 'POST',
        success: function (data) {
            console.log(data);
            $('#loaderIimg').hide();

            if (data.questionAnswers.length == 0) {
                var noPlayerRow = '<div style="display: flex; line-height: 100px; align-items: center; justify-content: center;"><span style="color: red; font-size: 14px; font-weight: 100; letter-spacing: 1px;" id="noPlayerTxt"> '+translations.no_data+'</span></div>';
                $('#answerTableBody').append(noPlayerRow);
                return;
            }
            $('#cotestent').html('<div id="cotestent" style="width: 100%;"><span><img id="userImg" src="' + (data.user_image !== null ? data.user_image : base_url + '/images/leaderboard/user_no_image.png') + '" style="height: 22px; width: auto; float: left; margin-top: 20px; margin-left: 4px; margin-right: 9px;"></span><span style="float: left;"><h2><span id="playtime"> ' + data.created_at + '</span></h2></span></div>');
            var tableHeading = '<tr class="clr-aqua">' +
                '<th id="numberTitle">'+translations.No+'</th>' +
                '<th id="playerTitle">'+translations.Question+'</th>' +
                '<th id="pointTitle">'+translations.Answer+'</th>' +
                '</tr>';
            $('#answerTableBody').append(tableHeading);

            $.each(data.questionAnswers, function (index, question) {
                var translatedQuestion = translations.question?.[question.question.trim()] || question.question;                var row = '<tr class="wpos">' +
                    '<td id="number">' + (index + 1) + '</td>' +
                    '<td id="question">' + translatedQuestion + '</td>' +
                    '<td id="answer">';

                if (index === 0) {
                    row += '<img src="' + question.homelogo + '" style="height: 15px; width: auto;">';
                    row += '<span> ' + question.home_score + ' - ' + question.away_score + '</span>';
                    row += '<img src="' + question.awaylogo + '" style="height: 15px; width: auto;">';
                } else {
                    if (question.home_score == 1) {
                        row += '<img src="' + question.homelogo + '" style="height: 15px; width: auto;">';
                        row += '<span> (1) </span>';
                    } else if (question.away_score == 1) {
                        row += '<img src="' + question.awaylogo + '" style="height: 15px; width: auto;">';
                        row += '<span> (2) </span>';
                    } else if (question.neither == 1) {
                        row += '<span> (0) </span>';
                    } else {
                        row += '<span> (0) </span>';
                    }
                }


                row += '</td>' +
                    '</tr>';
                $('#answerTableBody').append(row);
            });
        },
        error: function(xhr, textStatus, errorThrown) {
            $('#loaderIimg').hide();
            var noPlayerRow = '<div style="display: flex; line-height: 100px; align-items: center; justify-content: center;"><span style="color: red; font-size: 14px; font-weight: 100; letter-spacing: 1px;" id="noPlayerTxt"> '+translations.no_data+'</span></div>';
            $('#answerTableBody').empty();
            $('#answerTableBody').append(noPlayerRow);
        }
    });
});


   // League filter 

    GetCotestsByleague();//Show all contest

    const $dropdownButton = $('.dropdown-button');
    const $dropdownMenu = $dropdownButton.find('.dropdown-menu');

    $dropdownButton.on('click', function () {
        $dropdownMenu.toggle(); // Toggle the visibility of the dropdown menu
    });

    $(document).on('click', function (event) {
        if (!$dropdownButton.is(event.target) && !$dropdownButton.has(event.target).length) {
            $dropdownMenu.hide(); // Hide the dropdown menu when clicking outside
        }
    });

    $dropdownMenu.on('click', 'li', function () {
        const leagueName = $(this).text();
        const leagueLogo = $(this).find('img').attr('src');
        if (leagueLogo) {
            $dropdownButton.find('.dropdown-toggle').html(`
              <img src="${leagueLogo}" class="selected-image" /> ${leagueName}
              <i class="fa fa-caret-down fa-lg" aria-hidden="true" style="position: absolute; right: 26px;"></i>
            `);

        } else {
            
            $dropdownButton.find('.dropdown-toggle').html(`${leagueName}`);
        }
    });
  
    $('.custom-dropdown .dropdown-menu li').click(function () {
    // Update the global variable with the selected league ID
    selectedLeagueID = $(this).data('value');
    GetCotestsByleague(); // Call GetMatches to fetch matches based on the selected league ID
    });

    function GetCotestsByleague() {

        $('#contest').empty();

      
       $('#skloader-contest').show();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "POST",
            dataType: "json",
            url: base_url + '/contestsByLeague',
            data: {
                leagueId: selectedLeagueID
            },
            success: function (response) {
                console.log(response);

                var contest_html = '';

                if (response.competitions.length !== 0) {
                    $.each(response.competitions, function (index, competition) {
    var buttonText = response.current_time <= competition.prediction_end_time ? translations.who_play :  translations.prediction_result ;
    var contestLink = response.userId ? '/contest/detail/' + competition.id : '/login';

    contest_html += '<div class="contest" style="background: ' + (competition.venue_image ? 'url(' + competition.venue_image + ') ' : 'url(/assets/img/stadium.png) ') + 'no-repeat, linear-gradient(to bottom, rgb(28, 51, 8), black); background-size: 100% 100%, cover; background-position: 0 0;">';
    contest_html += '<div class="blurContainer">';
    contest_html += '<div class="d-flex j-center">';
    contest_html += '<div class="club-left mx-1 text-center">';
    contest_html += '<a href="/team/details/' + competition.home_team_id + '">';
    contest_html += '<div class="logo"><img src="' + competition.home_team_logo + '" id="hClubImg"></div>';
    contest_html += '</a>';
    contest_html += '<h5 class="mb-0" id="hClubName">' + competition.home_team_name + '</h5>';
    contest_html += '</div>';

    contest_html += '<div class="mid mx-2 d-flex ais-center">';
    contest_html += '<div class="h-max-c">';
    contest_html += '<div class="logo" style="width: 83px; height: 61px; background: white; border-radius: 53px; padding: 7px 5px; margin: auto auto 10px;">';
    contest_html += '<img id="leagueImg"src="' + base_url + '/assets/img/league/' + competition.league_logo + '" alt="" style="width: 50px;margin-top:5px">';
    contest_html += '</div>';


    contest_html += '<div class="date p-1" id="matchDay">' + competition.match_time_bar + '<br>' + competition.match_time + '</div>';
    contest_html += '<div class="place p-1" id="location">' + competition.venue + '</div>';
    contest_html += '</div>';
    contest_html += '</div>';

    contest_html += '<div class="club-right mx-1 text-center">';
    contest_html += '<a href="/team/details/' + competition.away_team_id + '">';
    contest_html += '<div class="logo"><img id="aClubImg"src="' + competition.away_team_logo + '"></div>';
    contest_html += '</a>';
    contest_html += '<h5 class="mb-0" id="aClubName">' + competition.away_team_name + '</h5>';
    contest_html += '</div>';

    contest_html += '</div>';

var loginButton='<a href="/login"><button type="button" id="playBtn" class="btn bg-green p-2 w-100 my-2 text-white" style="font-size: 12pt;"><strong>' + translations.lets_play + '</strong></button></a>';
var letsPlayButton = '<a href="/contest/detail/' + competition.id + '"><button id="playBtn" type="button" class="btn bg-green p-2 w-100 my-2 text-white" style="font-size: 12pt;"><strong>' + translations.lets_play + '</strong></button></a>';
var matchResultButton = '<a href="/match/details/' + competition.fixture_id + '"><button type="button" id="matchResultBtn" class="btn bg-grey p-2 w-100 my-2 text-white" style="font-size: 12pt;"><strong>' + translations.match_result + '</strong></button></a>';
var comingSoonButton = '<a href="javascript:void(0)"><button type="button" class="btn bg-green p-2 w-100 my-2 text-white" style="font-size: 12pt;"><strong>' + translations.coming_soon + '</strong></button></a>';








    if (
        response.current_time >= competition.prediction_start_time &&
        response.current_time <= competition.prediction_end_time &&
        response.current_time < competition.match_time
    ) {
        // Use LET'S PLAY Button
        contest_html += userId ? letsPlayButton : loginButton;
    } else if (competition.prediction_end_time < response.current_time || competition.match_time < response.current_time) {
        // Use Match Result Button
        contest_html += matchResultButton;
    } else {
        // Use COMING SOON Button
        contest_html += comingSoonButton;
    }




    contest_html += '<div class="d-flex">';
    contest_html += '<div class="w-50 p-1 bg-whitesmoke border-right" style="border-top-left-radius: 10px;" id="startText">' + translations.start + ': <br> <strong id="startDate">' + competition.prediction_start_time + '</strong></div>';
    contest_html += '<div class="w-50 p-1 bg-whitesmoke" style="border-top-right-radius: 10px;" id="endTxt">' + translations.end + ': <br> <strong id="endDate">' + competition.prediction_end_time + '</strong></div>';
    contest_html += '</div>';

    contest_html += '<div class="w-100 p-2 text-white" style="border: 1px solid whitesmoke; border-radius: 0 0 10px 10px;" id="point">' + translations.total_point_win + ': <b>100</b></div>';

    contest_html += '<a href="#" class="show-contestants-link" data-id="' + competition.id + '" data-toggle="modal" data-target="#UserPlay">';
    contest_html += '<button type="button" class="btn btn-lg btn-purple mt-2" id="seeWhoPlayBtn">' + buttonText + '</button>';
    contest_html += '</a>';

    contest_html += '</div>';
    contest_html += '</div>';
});

                    $('#skloader-contest').hide();
                    $('#contest').html(contest_html);
                } else {
                    $('#skloader-contest').hide();
                    $('#contest').html('<div align="center"><img src="' + base_url + '/assets/img/detail-match/icon-menu/no-Data-Found.png" class="no-data-img"></div>');
                }
            },
            error: function (response) {
                $('#skloader-contest').hide();
                $('#contest').html('<div align="center"><img src="' + base_url + '/assets/img/detail-match/icon-menu/no-Data-Found.png" class="no-data-img"></div>');
            }
        });

    }






















    // League Filter End

});

