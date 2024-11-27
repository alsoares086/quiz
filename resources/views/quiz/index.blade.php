<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('O que você sabe?') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 text-gray-900 dark:text-gray-100 bg-lightBlue dark:bg-darkGray rounded-lg shadow-sm">
                @if(session('result'))
                    <div class="text-xl font-semibold text-lightBlue mb-4">
                        {{ session('result') }}
                    </div>
                @endif

                @foreach ($questions as $index => $question)
                    <div class="question">
                        <h3 class="text-2xl font-semibold">{{ $question['question'] }}</h3>

                        <!-- Formulário para respostas -->
                        <form action="{{ route('quiz.answer') }}" method="POST">
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
                    @break <!-- Exibe uma pergunta por vez -->
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
