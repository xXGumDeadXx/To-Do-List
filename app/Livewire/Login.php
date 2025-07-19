<?php

namespace App\Livewire;

use Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;
use App\Models\User;

class Login extends Component
{
    #[Validate('required', message: 'Ingrese un correo válido')]
    public $email;

    #[Validate('required', message: 'Ingrese una contraseña válida')]
    public $password;

    public $errorMessage = "";

    public function login()
    {
        $this->validate();
        
        $user = User::where('email', $this->email)->first();
        if ($user) {
            Auth::login($user);
            return redirect()->intended('dashboard');
        }

        $this->errorMessage = 'El usuario no existe';

    }


    public function render()
    {
        return view('livewire.login');
    }
}
