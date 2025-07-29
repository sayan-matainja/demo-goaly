<div class="container mt-4">
    <div class="card">
        <div class="card-body text-center">
            <h2>Quiz Completed!</h2>
            <p>Your final score is:</p>
            <h3>{{ $score }} points</h3>

            <h4>Results:</h4>
            <p>
                Correct Answers: <span class="text-success">{{ $correctAnswers }}</span><br>
                Incorrect Answers: <span class="text-danger">{{ $incorrectAnswers }}</span>
            </p>

            <a href="{{ route('quiz.start') }}" class="btn btn-primary mt-3">Start a New Quiz</a>
        </div>
    </div>
</div>
