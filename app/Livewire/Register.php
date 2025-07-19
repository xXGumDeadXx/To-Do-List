<?php

namespace App\Livewire;

use Livewire\Attributes\Validate;
use Livewire\Component;
use App\Models\User;
use Auth;
use Illuminate\Support\Str;

class Register extends Component
{
    #[Validate('required', message: 'Ingrese un correo válido')]
    public $email;

    #[Validate('alpha|required|min:3', message: [
        'alpha' => 'El nombre debe ser una cadena de caracteres',
        'required' => 'Ingrese un nombre válido',
        'min' => 'El nombre debe tener al menos 3 caracteres',  
    ])]
    public $name;

    #[Validate('required|min:8', message: [
        'required' => 'Ingrese una contraseña válida',
        'min' => 'La contraseña debe tener al menos 8 caracteres',
    ])]
    public $password;

    #[Validate('required', message: [
        'required' => 'Confirme su contraseña',
    ])]
    public $password_confirmation;

    public $errorMessage = "";

    public function updated($errorMessage)
    {
        if($errorMessage != ""){
            $this->errorMessage = "";
        }
    }

    public function register()
    {
        $this->validate();

        if ($this->password !== $this->password_confirmation) {
            $this->errorMessage = 'Las contraseñas no coinciden';
            return;
        }

        $user = User::where('email', 'LIKE', $this->email)->first();
        if (!$user) {
            $user = User::updateOrCreate([
                'name' => $this->name,
                'email' => $this->email,
                'password' => bcrypt($this->password),
                'avatar' => $this->generateDefaultAvatar()
            ]);
            Auth::login($user);

            return redirect()->route('dashboard');
        }
        $this->errorMessage = 'El usuario ya existe';
    }
    protected function generateDefaultAvatar()
    {
        
        $name = urlencode(Str::substr($this->name, 0, 2));
        return "https://ui-avatars.com/api/?name={$name}&background=random";
        
    }

    public function render()
    {
        return view('livewire.register');
    }
}
