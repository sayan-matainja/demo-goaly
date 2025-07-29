var baseurl = window.location.origin;
var selectedLeagueID = " ";
const tz = Intl.DateTimeFormat().resolvedOptions().timeZone;
document.cookie = 'fcookie=' + tz;

//show data according to date filter

$("#allTeamTab").click(function() {
    $("#allTeamTab").addClass("team_active");
    $("#myTeamTab").removeClass("team_active");



});

    // Click event for "Advance Stats" tab
$("#myTeamTab").click(function() {
    $("#myTeamTab").addClass("team_active");
    $("#allTeamTab").removeClass("team_active");


});


function tabAction(id) {
    // Remove active class from all tabs
    $("#yesterdayTab, #todayTab, #tomorrowTab, #liveTab, #weeklyTab").removeClass("date_active");

    // Add active class to the selected tab
    if (id == 1) {
        $("#yesterdayTab").addClass("date_active");
    }
    if (id == 2) {
        $("#todayTab").addClass("date_active");
    }
    if (id == 3) {
        $("#tomorrowTab").addClass("date_active");
    }
    if (id == 4) {
        $("#liveTab").addClass("date_active");
    }
    if (id == 5) {
        $("#weeklyTab").addClass("date_active");
    }
}


function matchDetails(object) {
    var fixture_id = object.id;

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: "POST",
        dataType: "json",
        url: baseurl + "/matchDetails",
        data: {
            fixture_id: fixture_id,
        },
        success: function (response) {
            var date_time = response.date_time;
            var localTime = moment.utc(date_time).toDate();
            var localDateTime = moment(localTime).format('YYYY-MM-DD HH:mm:ss');

            var localDateTime_split = localDateTime.split(' ');
            var date = localDateTime_split[0];
            var time = localDateTime_split[1];

            var game_html = '';
            if (response.success == 1) {
                game_html += '<div class="date">' +
                '<div>' + date + '</div>' +
                '<div>' + time + '</div>' +
                '</div>';

                $('div#dt_id').html('');
                $('div#dt_id').html(game_html);
            }
            else if (response.success == 0) {
                game_html += '<div class="date">' +
                '<div>' + "0000-00-00" + '</div>' +
                '<div>' + "00:00:00" + '</div>' +
                '</div>';

                $('div#dt_id').html('');
                $('div#dt_id').html(game_html);
            }
        }
    });

}

$(document).ready(function () {
    var baseurl = window.location.origin;
    GetMatches();

    $(document).on('click', '#todayTab', function (e) {
        e.preventDefault();
        GetMatches();
    });

    $(document).on('click', '#tomorrowTab', function (e) {
        e.preventDefault();
        GetMatches();
    });

    $(document).on('click', '#yesterdayTab', function (e) {
        e.preventDefault();
        GetMatches();
    });

    $(document).on('click', '#liveTab', function (e) {
        e.preventDefault();
        GetMatches();
    });
     $(document).on('click', '#weeklyTab', function (e) {
        e.preventDefault();
        GetMatches();
    });

    $(document).on('click', '#myTeamTab', function (e) {
        e.preventDefault();
        $.ajax({
            url: baseurl + '/UserFavourite',
            method: 'GET',
            success: function(responses) {
                console.log(responses);
                if (responses.success == '0') {
                    Swal.fire({
                        title: '<span id="popUpTitle">'+translations.login_first+'</span>',
                        icon: "info",
                        showCancelButton: true,
                        confirmButtonText: '<span id="positiveTxt">'+translations.Login+'</span>',
                        cancelButtonText: '<span id="negativeTxt">'+translations.cancel+'</span>',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.replace(baseurl + '/login');
                            console.log('user');
                        } else if (result.isDismissed) {
                            $("#myTeamTab").removeClass("team_active");
                            $("#allTeamTab").addClass("team_active");
                            console.log('Cancelled');
                        }
                    });
                } else if (!responses.userFavteams.length > 0) {
                    $("#myTeamTab").removeClass("team_active");
                    $("#allTeamTab").addClass("team_active");

                    Swal.fire({
                        title: '<span id="popUpTitle">'+translations.sorryNoFavClub+'</span>',
                        icon: "info",


                    });

                }
                else {
                   GetMatches();
               }
           }
       });

    });
    $(document).on('click', '#allTeamTab', function (e) {
        e.preventDefault();



        GetMatches();
        // getLeagueList(start_date,end_date,type);
    });

    // $(".selectAggregate").unbind().change(function () {

    //     GetMatches();

    // });

    $('.custom-dropdown .dropdown-menu li').click(function () {
    // Update the global variable with the selected league ID
        selectedLeagueID = $(this).data('value');
    GetMatches(); // Call GetMatches to fetch matches based on the selected league ID
});

   function GetMatches() {
    // $('div#matchDisplay').empty();
    $('.matchDisplay').empty();

    $(".matches").hide();
    $('#skloader').show();

    let date = new Date();
    let start_date, end_date;
    const team_type = $(".team_active").attr('data-href');
    const leauge_id = selectedLeagueID;
    const type = $(".date_active").attr('data-type');
    if (type === "today") {
        start_date = date.toISOString().slice(0, 10);
        end_date = new Date(date.getTime() + 14 * 60 * 60 * 1000).toISOString().slice(0, 10);
    } else if (type === "tomorrow") {
        start_date = new Date(date.getTime() + 24 * 60 * 60 * 1000).toISOString().slice(0, 10);
        end_date = new Date(date.getTime() + 48 * 60 * 60 * 1000).toISOString().slice(0, 10);
    } else if (type === "yesterday") {

        // end_date = date.toISOString().slice(0, 10);
        start_date = new Date(date.getTime() - 24 * 60 * 60 * 1000).toISOString().slice(0, 10);
        end_date=start_date;

    } else if (type === "live") {
        start_date = date.toISOString().slice(0, 10);
        end_date = new Date(date.getTime() + 14 * 60 * 60 * 1000).toISOString().slice(0, 10);
    }else if (type === "weekly") {
        start_date = date.toISOString().slice(0, 10);
        end_date = new Date(date.getTime() + 7 * 24 * 60 * 60 * 1000).toISOString().slice(0, 10);
    }


    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
    });

    $.ajax({
        type: "POST",
        dataType: "json",
        url: baseurl + (type === "live" ? "/getLivematches" : "/getmatches"),
        data: {
            start_date,
            end_date,
            type,
            team_type,
            league: leauge_id
        },
        success: function (response) {
            $('#skloader').hide();
            let game_html = '';

            if (response.success === 1 && response.matches.length !== 0) {
                let autocall = [];

                $.each(response.matches, function (_, data) {
                    let background = data['match_status'] === "Finished" ? "matche-status-red" : "matche-status-green";
                    let statusTxt = translations[data['match_status']] || data['match_status'];
                    let localDateTime = moment.unix(data['starting_at']).tz(tz).format('YYYY-MM-DD HH:mm');
                    let localTime = moment.unix(data['starting_at']).toDate();
                    var diff = localTime - new Date();
                    let id = "diff" + data['fixture_id'];
                    let hourMinute = localDateTime;

                    if (diff > 0) {
                        autocall.push({ time: localTime, id: id });
                    }

                    game_html +=
                        '<div class="matches">' +
                            '<div class="d-flex j-center">' +
                                '<div class="club-left mx-1 text-center" style="width:80px">' +
                                    '<a href="' + baseurl + '/team/details/' + data['homeTeam_id'] + '">' +
                                        '<div class="logo">' +
                                            '<img src="' + data['homeTeam_image'] + '" alt="" id="hClubImg">' +
                                        '</div>' +
                                    '</a>' +
                                    '<h5 class="mb-0" id="hClubName">' + data['homeTeam_name'] + '</h5>' +
                                '</div>' +
                                '<div class="mid mx-2 d-flex flex-column my-auto">' +
                                    '<div class="logo-match">' +
                                        '<img id="leagueImg" src="' + data['images'] + '" alt="" style="height: 50px">' +
                                    '</div>' +
                                    '<div class="d-flex j-center h-max-c border radius-1 px-2 py-1" style="font-size: 16pt">' +
                                        '<span id="hClubScore">' + data['localteam_score'] + '</span>' +
                                        '<span class="mx-2 border-right"></span>' +
                                        '<span id="aClubScore">' + data['visitorteam_score'] + '</span>' +
                                    '</div>' +
                                    '<span class="countdown-timer my-1" id="' + id + '">' + hourMinute + '</span>' +
                                    '<a href="' + baseurl + '/match/details/' + data['fixture_id'] + '" style="width:100%;">' +
                                        '<span class="btn-pill ' + background + '" id="matchStatus">' + statusTxt + '</span>' +
                                    '</a>' +
                                '</div>' +
                                '<div class="club-right mx-1 text-center" style="width:80px">' +
                                    '<a href="' + baseurl + '/team/details/' + data['awayTeam_id'] + '">' +
                                        '<div class="logo">' +
                                            '<img src="' + data['awayTeam_image'] + '" alt="" id="aClubImg">' +
                                        '</div>' +
                                    '</a>' +
                                    '<h5 class="mb-0" id="aClubName">' + data['awayTeam_name'] + '</h5>' +
                                '</div>' +
                            '</div>' +
                        '</div>';
                });

                // $('div#matchDisplay').html(game_html);
                $('.tab-pane.active .matchDisplay').html(game_html);


                setTimeout(() => {
                    if (autocall.length > 0) {
                        console.log("Calling timer for", autocall.length, "matches");
                        timeCalculate(autocall);
                    }
                }, 100);
            } else {
                $('.tab-pane.active .matchDisplay').html(
                    '<div align="center">' +
                        '<img src="' + baseurl + '/assets/img/detail-match/icon-menu/no-match.png" class="no-data-img">' +
                    '</div>'
                );
            }
        }
    });
}


function timeCalculate(autocall) {
    var demoautoCall = [];

    $.each(autocall, function (index, response) {

        var diff = new Date(response.time).getTime() - new Date().getTime();
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
        }, 500);
    }
}
});