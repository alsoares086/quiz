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

                <!-- Adicionando o id "question-container" para o lugar onde a próxima pergunta será inserida -->
                <div id="question-container">
                    @if($question)
                        <div class="question">
                            <h3 class="text-2xl font-semibold">{{ $question['question'] }}</h3>

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
                    @else
                        <div>
                            <h3 class="text-xl font-semibold text-lightBlue mb-4">Quiz Finalizado!</h3>
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </div>

    <!-- Importando o jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            // Função que será chamada ao enviar a resposta do quiz via AJAX
            $('#quizForm').submit(function(e) {
                e.preventDefault(); // Impede o envio padrão do formulário

                // Envia o formulário com os dados via AJAX
                $.ajax({
                    url: $(this).attr('action'), // A URL do formulário (deve ser a rota do controlador)
                    method: 'POST',
                    data: $(this).serialize(), // Serializa os dados do formulário
                    success: function(response) {
                        // Exibe o resultado
                        $('#resultMessage').text(response.result); // Atualiza o resultado (correto/errado)

                        // Verifica se existe uma próxima pergunta
                        if (response.next_question) {
                            // Substitui o conteúdo da pergunta atual pela próxima pergunta
                            $('#question-container').html(response.next_question);
                        } else {
                            // Caso não haja mais perguntas, exibe uma mensagem de fim de quiz
                            $('#question-container').html('<h3>Quiz Finalizado!</h3>');
                        }
                    },
                    error: function() {
                        // Em caso de erro, exibe uma mensagem de erro
                        $('#resultMessage').text('Erro ao processar a resposta. Tente novamente.');
                    }
                });
            });
        });
    </script>
</x-app-layout>
