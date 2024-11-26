<x-guest-layout>
    @section('title', 'Login')    
    <!-- Centraliza o conteúdo sem esticar a altura -->
    <div class="flex items-center justify-center bg-lightGray text-darkGray">
        <!-- Div de login com o conteúdo necessário -->
        <div class="p-8  w-full max-w-md animate-fade-in">
            <!-- Título do formulário -->
            <h2 class="text-3xl font-extrabold text-center text-lightBlue mb-6">
               Login
            </h2>

            <!-- Formulário de login -->
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Campo de Email -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input 
                        id="email" 
                        class="block mt-2 w-full bg-lightGray text-darkGray border border-gray-300 focus:ring-lightBlue focus:border-lightBlue"
                        type="email" 
                        name="email" 
                        :value="old('email')" 
                        required 
                        autofocus 
                    />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500" />
                </div>

                <!-- Campo de Senha -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Senha')" />
                    <x-text-input 
                        id="password" 
                        class="block mt-2 w-full bg-lightGray text-darkGray border border-gray-300 focus:ring-lightBlue focus:border-lightBlue" 
                        type="password" 
                        name="password" 
                        required 
                    />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500" />
                </div>

                <!-- Lembrar-me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded text-lightBlue focus:ring-lightBlue" name="remember">
                        <span class="ms-2 text-sm text-darkGray">{{ __('Lembrar de mim') }}</span>
                    </label>
                </div>

                <!-- Botão de Enviar -->
                <div class="flex items-center justify-between mt-6">
                    @if (Route::has('password.request'))
                        <a class="text-sm text-lightBlue hover:text-lightBlue-500 underline" href="{{ route('password.request') }}">
                            {{ __('Esqueceu sua senha?') }}
                        </a>
                    @endif

                    <x-primary-button class="ms-3 bg-lightBlue hover:bg-lightBlue-500 text-white shadow-lg">
                        {{ __('Entrar') }}
                    </x-primary-button>
                </div>
            </form>
            <div class="mt-4 text-center">
                <p class="text-sm text-darkGray">
                    {{ __('Não tem uma conta?') }}
                    <a href="{{ route('register') }}" class="text-lightBlue hover:text-lightBlue-500">
                        {{ __('Cadastre-se') }}
                    </a>
                </p>
            </div>
        </div>
    </div>
</x-guest-layout>
