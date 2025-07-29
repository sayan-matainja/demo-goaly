 <div class="container">
                <div class="quiz-box">

                    {{-- Progress & Question Counter --}}
                    <div class="text-right mb-2">
                        Question {{ $currentIndex }}/{{ $totalCount }}
                    </div>
                    <div class="quiz-progress-bar">
                        <div class="quiz-progress-bar-inner" style="width: {{ ($currentIndex / $totalCount) * 100 }}%;"></div>
                    </div>


                    {{-- Timer --}}
                    <div id="timer" class="text-danger text-center mb-3">
                        Time Left: <span id="time"></span>
                    </div>

                    {{-- Question Image --}}
                    <img src="{{ $question->image ? asset('images/quizImage/' . $question->image) : asset('images/quizImage/default.png') }}"
                    alt="Question Image"
                    class="question-img">

                    {{-- Question --}}
                    <div class="question mb-4 text-center" data-question-id="{{ $question->id }}">
                        <h4><strong>{{ $question->question }}</strong></h4>
                    </div>

                    {{-- Options --}}
                    <ul class="list-unstyled">
                        @foreach($options as $key => $option)
                        <li>
                            <button class="option-btn" data-option="{{ $key }}">
                                {{ $option }}
                            </button>
                        </li>
                        @endforeach
                    </ul>

                    {{-- Result Placeholder --}}
                    <div id="result" class="mt-4 text-center" style="display: none;">
                        <h5>Results:</h5>
                        <ul id="result-list" class="list-unstyled"></ul>
                        <button id="next-question" class="btn btn-primary" style="display:none;">Next Question</button>
                    </div>
                </div>
            </div>
