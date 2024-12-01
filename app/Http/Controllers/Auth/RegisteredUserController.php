<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    public function create(): View
    {
        return view('auth.register');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Definir os avatares possíveis
        $avatars = ['avatar1.png', 'avatar2.png', 'avatar3.png', 'avatar4.png'];

        // Escolher um avatar aleatoriamente
        $randomAvatar = $avatars[array_rand($avatars)];

        // Caminho do avatar
        $avatarPath = 'images/' . $randomAvatar;

        // Criar o usuário com os dados fornecidos
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'pontuacao' => 0,
            'avatar' => $avatarPath,  // Salvar o caminho do avatar
        ]);

        // Disparar o evento de registro
        event(new Registered($user));

        // Logar o usuário e redirecionar para o dashboard
        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}
