<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $email = '';
    public $password = '';
    public $remember = false;

    public function login(){
        $credentials = $this->validate([
            'email' => ['required','email'],
            'password' => ['required'],
        ], [
            'email.required' => 'O email é obrigatório',
            'email.email' => 'Formato de email incorreto',
            'password.required' => 'A senha é obrigatória',
        ]);

        if(!Auth::attempt($credentials, $this->remember)){
            session()->flash('error', 'Email e senha inválidos');
            return;
        }

        $user = Auth::user();

        request()->session()->regenerate();

        return redirect()->route('dashboard');
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}