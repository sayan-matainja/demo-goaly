var base_url = window.location.origin;

$(document).ready(function() {

        var $j = jQuery.noConflict();
        var userId = document.getElementById('user-data').getAttribute('data-user-id');

         

            var sound_correct = document.getElementById("audio_correct");

            // Check if the audio is paused (when it reaches the end)
            sound_correct.addEventListener("ended", function() {
                // Replay the audio when it ends
                sound_correct.play();
            });

                   

                    $(".action-stats").click(function () {
                        $("#collapseExample").collapse('toggle');
                        $('#h2h-tab').hide();
                        $('#predic-tab').hide();
                        $("#predictBtn").css("background-color", "#898989");
                        $("#headToHeadBtn").css("background-color", "#898989");

                    });
                    
                    $("#headToHeadBtn").click(function () {
                        $(this).css("background-color", "#9c40a3");
                        $("#predictBtn").css("background-color", "#898989");
                        $('#h2h-tab').show();
                        $('#predic-tab').hide();
                    });

                    $("#predictBtn").click(function () {
                        $(this).css("background-color", "#9c40a3");
                        $("#headToHeadBtn").css("background-color", "#898989");
                        $('#h2h-tab').hide();
                        $('#predic-tab').show();
                    });


                $('#h2h-tab').hide();
                $('#predic-tab').hide();

         var homeTeamId=document.getElementsByName('homeTeamId')[0].value;

        var awayTeamId= document.getElementsByName('awayTeamId')[0].value;

        var match_id= document.getElementsByName('match_id')[0].value;
        var H_goal=0;
        var A_goal=0;
       $.ajax({
            url:base_url+'/HandToHand/'+homeTeamId+'/'+awayTeamId,
            method:'GET',
            success: function(responseMatches){
                var h_class, a_class;

                console.log(responseMatches);
                if(responseMatches['statusOfGame'] != null){
                    $("#wins").append(responseMatches['statusOfGame']['win']);
                    $("#draw").append(responseMatches['statusOfGame']['draw']);
                    $("#loss").append(responseMatches['statusOfGame']['loss']);
                }
                $.each(responseMatches['matches'],function(index,response){
                  
                    if(response['date']!=null){

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

                    if(response['winnerTeamId']!=null){
                    if ((homeTeamId == response['homeTeamId'])&&(response['status']!="2")) {
                    H_goal += response['homeTeamScore'];
                   

                 } else if ((homeTeamId == response['awayTeamId'])&&(response['status']!="2")) {
                    H_goal += response['awayTeamScore'];
                   
                 }

                 if ((awayTeamId == response['homeTeamId'])&&(response['status']!="2")) {
                    A_goal += response['homeTeamScore'];
                 } else if ((awayTeamId == response['awayTeamId'])&&(response['status']!="2")) {
                    A_goal += response['awayTeamScore'];
                 }
                 if(response['status']=="2"){
                        

                    H_goal += response['homeTeamScore'];                   
                    A_goal += response['awayTeamScore'];
                   

                } 
                    $("#hGoals").text(H_goal);
                    $("#aGoals").text(A_goal);

                    var totalGoals = H_goal + A_goal;
                    var hGoalPercentage = (H_goal / totalGoals) * 100;
                    var aGoalPercentage = (A_goal / totalGoals) * 100;

                    // Update the progress bars' widths
                    $("#homegoals").css('width', hGoalPercentage + '%');
                    $("#awaygoals").css('width', aGoalPercentage + '%');



                }
                });

            }
        });
    $(".question:first-child").show();

    var userAnswers = {}; // Initialize an object to store user answers


    function updateUserAnswers(predictionId, questionId,question,answer,selectedTeamLogo,teamshortcode) {
        var answerObj = {
            predictionId: predictionId,
            questionId: questionId,
            question: question,
            answer: answer,
            logo:selectedTeamLogo,
            shortcode:teamshortcode
        };
          userAnswers[questionId] = answerObj;
    }
    var q=1;

// For Answer Submit

            $(".back-question").click(function() {
        var currentQuestion = $(this).closest(".question");
        var currentQuestionId = currentQuestion.data("question-id");
        console.log(currentQuestionId);

        var previousQuestion = currentQuestion.prev(".question");

        if (previousQuestion.length) {
            currentQuestion.hide();
            previousQuestion.show();
            q--;    
            
            // Calculate the new progress bar width
            var progressBarWidth = (q / 6) * 100; 
            
            // Update the progress bar width
            $("#questionBar").css('width', progressBarWidth + '%'); // Decrease the progress bar width

            // Update the progress text
            var progressText = q;
            $(".progress-text").text(progressText);
        }
    });


    $(".next-question").click(function() {
    var currentQuestion = $(this).closest(".question");
    var currentQuestionId = currentQuestion.data("question-id");
    var predictionId = currentQuestion.data("prediction-id"); // Assuming you have a prediction ID as well
    var nextQuestion = currentQuestion.next(".question");
    var question = currentQuestion.find("#questionText").text();
   
    var answer, homeTeamLogo, awayTeamLogo,teamshortcode;//declare variable 
        

    if (currentQuestion.data("type") === 1) {
        var homeScore = parseInt(currentQuestion.find(".home-score option:selected").val());
        var awayScore = parseInt(currentQuestion.find(".away-score option:selected").val());

        if (isNaN(homeScore) || isNaN(awayScore)) {
        // Show swal error message for missing or invalid input
        Swal.fire({
            icon: 'warning',
            title: 'Warning',
            text: 'All fields are required. Please enter valid scores for both home and away teams.'
        });
        return; // Exit the function early
      }
        answer = homeScore + ' : ' + awayScore;
        console.log(answer);
         selectedTeamLogo = {
            home: currentQuestion.data("home-team-logo"),
            away: currentQuestion.data("away-team-logo")
        };
        teamshortcode = {
            home: currentQuestion.data("home-short-code"),
            away: currentQuestion.data("away-short-code")
        };
    

    } else if (currentQuestion.data("type") === 2 || currentQuestion.data("type") === 3) {
    // Find the selected radio button within the current question
    var selectedRadioButton = currentQuestion.find("input[name='goal_" + currentQuestion.data("question-id") + "']:checked");
    // Check if any radio button is selected
        var answer = parseInt(selectedRadioButton.val());

       var selectedTeamNumber=answer
    if (selectedRadioButton.length === 0) {
        // Show swal error message for no selection
        Swal.fire({
            icon: 'warning',
            title: 'warning',
            text: 'Please select an option (1, 2, 3).'
        });
        return; // Exit the function early
    }

    // Get the value of the selected radio button


    if (selectedTeamNumber === 1) {
        selectedTeamLogo = {
            home: currentQuestion.data("home-team-logo"),
            away: null
        };
        teamshortcode = {
            home: currentQuestion.data("home-short-code"),
            away: null
        };
    } else if (selectedTeamNumber === 2) {
        selectedTeamLogo = {
            home: null,
            away: currentQuestion.data("away-team-logo")
        };
            teamshortcode = {
            home: null,
            away: currentQuestion.data("away-short-code")
        };
    } else {
        selectedTeamLogo = {
            home: null,
            away: null
        };
        teamshortcode = {
            home: null,
            away: null
        };
    }
}
    updateUserAnswers(predictionId,currentQuestionId,question,answer,selectedTeamLogo,teamshortcode );

    // Hide the current question
    currentQuestion.hide();

    q++;    
    var progressBarWidth = (q / 6) * 100; 
    $("#questionBar").css('width', progressBarWidth + '%');   
    var progressText = q ;
    $(".progress-text").text(progressText);


    // Show the next question (if available)
    if (nextQuestion.length) {
        nextQuestion.show();
       
    } else {

    console.log(userAnswers);

    $(".card-point").hide();//hide progressbar 

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
        $("#review-section").show();

    $.ajax({
        url: base_url + '/setsubmitprediction',
        data: { userAnswers, predictionId, userId, homeTeamId, awayTeamId },
        method: 'POST',
    success: function (response) {
        var reviewHtml = '<div class="card-submit top">' +
            '<h4 class="text-center soft-purple fw-bold fs-18" id="title"> THANK YOU </h4>' +
            '<hr class="hr-white">' +
            '<div class="text-center mb-2">' +
            '<span class="fs-14 text-white" id="text"> Your Answer </span>' +
            '</div>';

        var serialNumber = 1;
        $.each(userAnswers, function (questionId, answerObj) {
            reviewHtml += '<div class="card-summary mb-2">';
            
            // Append question number and question text
            reviewHtml += '<span class="text-muted fs-14" id="question">' + serialNumber + '. ' + answerObj.question + '</span>';
            
            // Append logo, team name, and score
            if (answerObj.questionId === 77) { 
                var scores = answerObj.answer.split(':');
                var homeScore = scores[0];
                var awayScore = scores[1];
                
                reviewHtml += '<div class="row border-top mt-2 pt-2">' +
                    '<div class="col-xs-6 border-right">' +
                    '<div class="score">' +
                    '<div class="logo-club custom mr-2">' +
                    (answerObj.logo.home ? '<img src="' + answerObj.logo.home + '" class="logos" alt="">' : '') +
                    '</div>' +
                    '<span class="name mr-2">' + answerObj.shortcode.home + '</span>' +
                    '<div class="value">' + homeScore + '</div>' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-xs-6">' +
                    '<div class="score">' +
                    '<div class="value">' + awayScore + '</div>' +
                    '<span class="name ml-2">' + answerObj.shortcode.away + '</span>' +
                    '<div class="logo-club custom ml-2">' +
                    (answerObj.logo.away ? '<img src="' + answerObj.logo.away + '" class="logos" alt="">' : '') +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>';
            } else { // For other question types
                reviewHtml += '<div class="row border-top mt-2 pt-2">' +
                    '<div class="col-xs-12">' +
                    '<div class="score">' +
                    (
                        (answerObj.logo.home || answerObj.logo.away) ?
                        (
                            '<div class="logo-club mr-2">' +
                            (answerObj.logo.home ? '<img src="' + answerObj.logo.home + '" class="logos" alt="">' : '') +
                            (answerObj.logo.away ? '<img src="' + answerObj.logo.away + '" class="logos" alt="">' : '') +
                            '</div>'
                        ) :
                        ''
                    ) +
                     '<span class="name mr-2">' +
                    ((answerObj.shortcode.home || answerObj.shortcode.away) ?
                        (answerObj.shortcode.home ? answerObj.shortcode.home : answerObj.shortcode.away) :
                        'NEITHER') +
                    '</span>' +
                    '</div>' +
                    '</div>' +
                    '</div>';
            }
            
            reviewHtml += '</div>';
            serialNumber++;
        });

        reviewHtml += '<a href="/contest" class="btn btn-primary btn-lg w-100" id="startAnotherBtn"> Start Another </a>' +
            '</div>';
            $("#review-section").empty();
        // Append the review HTML to the review section
        $("#review-section").html(reviewHtml).show();
    },

        error: function(xhr, textStatus, errorThrown) {
            // Handle error cases using swal
            var errorMessage = xhr.responseJSON && xhr.responseJSON.message
                ? xhr.responseJSON.message
                : "An error occurred while processing your request.";
            Swal.fire("Error", errorMessage, "error");

        }
    });
        }


    });

// For answer submit end

        



});
    
   