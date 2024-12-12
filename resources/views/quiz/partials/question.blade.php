<div class="question">
    <h3 class="text-2xl font-semibold">{{ $question->question }}</h3>

    <form id="quizForm" action="{{ route('quiz.answer') }}" method="POST">
        @csrf
        <input type="hidden" name="question_id" value="{{ $question->id }}">
        @foreach ($question->answers as $option)
            <div>
                <label>
                    <input type="radio" name="answer" value="{{ $option->id }}">
                    {{ $option->answer_text }}
                </label>
            </div>
        @endforeach

        <button type="submit" class="mt-4 bg-lightBlue text-white px-4 py-2 rounded">Responder</button>
    </form>
</div>
