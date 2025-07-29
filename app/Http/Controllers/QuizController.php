<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;

class QuizController extends Controller
{
    public function startQuiz()
    {
        session(['score' => 0]);
        session(['question_count' => 0]);
        
        // $totalActiveQuestions = Question::isActive()->count();
        $totalActiveQuestions = 5;

        session(['total_questions' => $totalActiveQuestions]);
        return redirect()->route('question');
    }
    public function showQuestion($id = null)
    {
        $question = $id ? Question::find($id) : Question::inRandomOrder()->isActive()->first();

        if (!$question) {
            return $this->endQuiz();
        }

        $currentIndex = session('question_count', 0) + 1;
        $totalCount = session('total_questions', 0); 
        $options = collect(['A' => $question->option_a, 'B' => $question->option_b, 'C' => $question->option_c]); 

        if (request()->ajax()) {
            return view('quiz.partials.question', compact('question', 'options','currentIndex', 'totalCount'))->render();
        }

        return view('quiz.question', compact('question', 'options','currentIndex', 'totalCount'));
    }

    public function checkAnswer(Request $request, $id)
    {
        $question = Question::find($id);
        $selectedOption = $request->input('option');
        $isCorrect = $selectedOption !== null ? $selectedOption === $question->correct_option : null;
        
        $score = session('score', 0);
        $questionCount = session('question_count', 0);
        $correctAnswers = session('correct_answers', 0);
        $incorrectAnswers = session('incorrect_answers', 0);

        // Increment score and question count if answered
        if ($isCorrect !== null) {
            session(['score' => $score + ($isCorrect ? 1 : 0)]);
            session(['correct_answers' => $correctAnswers + ($isCorrect ? 1 : 0)]);
            session(['incorrect_answers' => $incorrectAnswers + (!$isCorrect ? 1 : 0)]);
        }

        session(['question_count' => $questionCount + 1]);

        // If 5 questions have been answered, end the quiz
        if ($questionCount >= 4) {
            return response()->json([
                'isCorrect' => $isCorrect,
                'endQuiz' => true,
                'score' => session('score'),
                'correctAnswers' => session('correct_answers'),
                'incorrectAnswers' => session('incorrect_answers'),
            ]);
        }

        $nextQuestion = Question::where('id', '!=', $id)->isActive()->inRandomOrder()->first();

        if (!$nextQuestion) {
            return response()->json([
                'isCorrect' => $isCorrect,
                'endQuiz' => true,
            ]);
        }

        return response()->json([
            'isCorrect' => $isCorrect,
            'nextId' => $nextQuestion->id,
        ]);
    }


    public function endQuiz()
    {
        $score = session('score', 0);
        $correctAnswers = session('correct_answers', 0);
        $incorrectAnswers = session('incorrect_answers', 0);

        // Forget the session variables after the quiz ends
        session()->forget(['score', 'question_count', 'correct_answers', 'incorrect_answers']);

        if (request()->ajax()) {
            return view('quiz.end', compact('score', 'correctAnswers', 'incorrectAnswers'))->render();
        }

        return view('quiz.end', compact('score', 'correctAnswers', 'incorrectAnswers'));
    }

}
