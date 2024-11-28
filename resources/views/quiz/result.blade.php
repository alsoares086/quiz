<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Quiz Completo!') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 text-gray-900 bg-lightBlue rounded-lg shadow-sm">
                <h3 class="text-2xl font-semibold">Parabéns, você terminou o quiz!</h3>
                <p class="mt-4 text-lg">Você completou todas as perguntas. Agora, pode começar de novo ou sair.</p>

                <!-- Aqui pode adicionar mais lógica para exibir as pontuações, se quiser -->
                <a href="{{ route('quiz.index') }}" class="mt-4 inline-block bg-lightBlue text-white px-6 py-3 rounded">
                    Iniciar Novo Quiz
                </a>
            </div>
        </div>
    </div>
</x-app-layout>