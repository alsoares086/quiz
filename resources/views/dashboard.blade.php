<x-app-layout>
@section('title', 'Perfil')  
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Meu Perfil') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 text-gray-900 dark:text-gray-100 bg-lightBlue dark:bg-darkGray rounded-lg shadow-sm">
                <div class="flex items-center space-x-6">
                    <!-- Avatar estático (escolhido como avatar1.png ou avatar2.png) lembrar de configurar a insercao no banco de dados -->
                    <img src="{{ asset('images/avatar1.png') }}" alt="Avatar" class="w-20 h-20 rounded-full">
                    <div>
                        <h3 class="text-2xl font-semibold text-lightBlue">{{ auth()->user()->name }}</h3>
                        <p class="text-sm text-darkGray">{{ auth()->user()->email }}</p>
                    </div>
                </div>

                <div class="mt-6">
                    <h4 class="text-xl font-semibold text-darkGray">Estatísticas</h4>
                    <ul class="list-disc pl-5 text-darkGray">
                        <li>Nº de jogos: {{ auth()->user()->games_count }}</li>
                        <li>Ranking: #{{ auth()->user()->ranking }}</li>
                    </ul>
                </div>

                <div class="mt-6">
                    <a href="{{ route('profile.edit') }}" class="text-lightBlue hover:text-lightBlue-500 underline">
                        Editar informações
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
