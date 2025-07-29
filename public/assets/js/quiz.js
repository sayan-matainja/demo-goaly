$(document).ready(function () {
    let timeLeft = 20; // 10 seconds for each question
    let timerInterval;

    function startTimer() {
        clearInterval(timerInterval);  // Clear previous interval if any
        timeLeft = 20;  // Reset time for the new question
        timerInterval = setInterval(updateTimer, 1000);
    }

    function formatTime(seconds) {
        let minutes = Math.floor(seconds / 60);
        let remainingSeconds = seconds % 60;
        return `${minutes}:${remainingSeconds < 20 ? '0' : ''}${remainingSeconds}`;
    }

    function updateTimer() {
        if (timeLeft <= 0) {    
            disableOptions() ;
            submitAnswer(null); 
            clearInterval(timerInterval);
        } else {
            timeLeft--;
            document.getElementById('time').textContent = formatTime(timeLeft);
        }
    }
    
    function updateProgress(current, total) {
    var percent = (current / total) * 100;
    $('.progress-bar-custom').css('width', percent + '%');
    }


    function stopTimer() {
        clearInterval(timerInterval);
    }
    function disableOptions() {
    $('.option-btn').prop('disabled', true);  // Disable all buttons with the 'option-btn' class
    }
    function submitAnswer(selectedOption) {
    let questionId = $('.question').data('question-id');
    stopTimer();
    disableOptions() ;
    $.ajax({
        url: '/quiz/check-answer/' + questionId,
        method: 'POST',
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            option: selectedOption 
        },
        success: function (response) {
            if (response.isCorrect !== null) {
                $('#result').text(response.isCorrect ? 'Correct! ✔️' : 'Incorrect! ❌').show();
            } else {
                $('#result').text('Unanswered! ⏳').show();  
            }

            if (response.endQuiz) {
                endQuiz();  
            } else {
                loadNextQuestion(response.nextId);  
            }
        },
        error: function () {
            alert('An error occurred while submitting the answer.');
        }
    });
}

    function loadNextQuestion(nextQuestionId) {
        if (nextQuestionId) {
            $.ajax({
                url: '/quiz/question/' + nextQuestionId,
                method: 'GET',
                success: function (response) {
                    $('#quiz-container').html(response);
                    startTimer();  // Restart the timer when the next question loads
                },
                error: function () {
                    alert('An error occurred while loading the next question.');
                }
            });
        } else {
            endQuiz();  // End quiz if no more questions
        }
    }

    function endQuiz() {
        $.ajax({
            url: '/quiz/end',
            method: 'GET',
            success: function(response) {
                $('#quiz-container').html(response);
                stopTimer();  // Stop the timer when the quiz ends
            },
            error: function() {
                stopTimer();
                alert('An error occurred while ending the quiz.');
            }
        });
    }

    startTimer();

    $(document).on('click', '.option-btn', function () {
        let selectedOption = $(this).data('option');
        submitAnswer(selectedOption);
    });
});
