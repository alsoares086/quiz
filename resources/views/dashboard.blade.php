<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex items-center space-x-6">
                        <!-- Avatar sem borda arredondada (removido rounded-full) -->
                        <img src="{{ asset(auth()->user()->avatar) }}" alt="Avatar" class="w-20 h-20 border-4 border-[#6a0dad]">

                        <div class="space-y-4">
                            <p class="text-lg font-semibold text-[#6a0dad]">Nome: {{ auth()->user()->name }}</p>
                            <p class="text-lg font-medium text-[#6a0dad]">Pontuação: {{ auth()->user()->pontuacao }}</p>

                            <!-- Exibindo o Ranking -->
                            <p class="text-sm text-[#6a0dad]">
                                Ranking: 
                                @php
                                    $ranking = auth()->user()->pontuacao > 0 
                                        ? \App\Models\User::orderByDesc('pontuacao')
                                            ->pluck('id')
                                            ->search(auth()->user()->id) + 1
                                        : '#';
                                @endphp
                                {{ $ranking }}
                            </p>
                        </div>
                    </div>

                    <!-- Botão que redireciona para o quiz -->
                    <div class="mt-6">
                        <a href="{{ route('quiz.index') }}" class="inline-block bg-[#6a0dad] text-white py-2 px-4 rounded-lg hover:bg-[#5a08a2] transition duration-300">
                            Iniciar Quiz
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
