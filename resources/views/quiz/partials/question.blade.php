<div class="question">
    <h3 class="text-2xl font-semibold">{{ $question['question'] }}</h3>

    <!-- Formulário para respostas -->
    <form id="quizForm" action="{{ route('quiz.answer') }}" method="POST">
        @csrf
        @foreach (array_merge([$question['correct_answer']], $question['incorrect_answers']) as $option)
            <div>
                <label>
                    <input type="radio" name="answer" value="{{ $option }}">
                    {{ $option }}
                </label>
            </div>
        @endforeach

        <input type="hidden" name="correct_answer" value="{{ $question['correct_answer'] }}">
        <button type="submit" class="mt-4 bg-lightBlue text-white px-4 py-2 rounded">Responder</button>
    </form>
</div>
