<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Perfil') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-secondary-light">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-secondary-light overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
            <div class="flex justify-center items-center min-h-screen">
    <!-- Cartão do Perfil -->
    <div class="bg-white border-4 border-black shadow-[8px_8px_0px_black] text-center max-w-md p-6">
        <!-- Avatar com borda pixelada -->
        <img src="{{ asset(auth()->user()->avatar) }}" alt="Avatar"
             class="w-32 h-32 mx-auto border-4 border-black shadow-[4px_4px_0px_black]">

        <!-- Informações do Usuário -->
        <p class="text-lg text-black mt-4">Nome: {{ auth()->user()->name }}</p>
        <p class="text-lg text-black">Pontuação: {{ auth()->user()->pontuacao }}</p>

        <!-- Ranking -->
        <p class="text-lg text-black">
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

        <!-- Botão START -->
        <a href="{{ route('quiz.index') }}" 
           class="inline-block mt-6 px-4 py-2 bg-gray-200 border-4 border-black text-black 
                  shadow-[4px_4px_0px_black] uppercase hover:translate-x-1 hover:translate-y-1 
                  hover:shadow-none transition-all duration-150">
            Start
        </a>
    </div>
</div>
        </div>
    </div>
</div>

</x-app-layout>
