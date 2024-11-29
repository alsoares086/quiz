<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('O que você sabe?') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 text-gray-900 dark:text-gray-100 bg-lightBlue dark:bg-darkGray rounded-lg shadow-sm">
                <div id="resultMessage" class="text-xl font-semibold text-lightBlue mb-4">
                    @if(session('result'))
                        {{ session('result') }}
                    @endif
                </div>

                <div id="question-container">
                    @if($question)
                        @include('quiz.partials.question', ['question' => $question])
                    @else
                        <h3 class="text-xl font-semibold text-lightBlue mb-4">Quiz Finalizado!</h3>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#quizForm').submit(function(e) {
                e.preventDefault(); // Impede o envio padrão do formulário

                $.ajax({
                    url: $(this).attr('action'),
                    method: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        $('#resultMessage').text(response.result);

                        if (response.next_question) {
                            $('#question-container').html(response.next_question);
                            $('#quizForm')[0].reset();
                        } else {
                            $('#question-container').html('<h3>Quiz Finalizado!</h3>');
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error('Erro:', textStatus, errorThrown); // Log no console

                        $('#resultMessage').html(
                            'Erro ao processar a resposta. Detalhes: ' + jqXHR.responseText
                        );
                    }
                });
            });
        });
    </script>
</x-app-layout>
