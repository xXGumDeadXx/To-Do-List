<?php

namespace App\Livewire;

use Livewire\Attributes\Validate;
use Livewire\Component;
use Auth;
use Illuminate\Support\Facades\Hash;

class ProfileSection extends Component
{
    #[Validate('required', message: 'El campo es obligatorio')]
    public $name;
    public $email;
    public $isOAuth;
    public $containPassword;
    public $password;

    #[Validate('required|min:6|different:password', message: [
        'required' => 'El campo es obligatorio',
        'min' => 'El campo debe tener al menos 6 caracteres',
        'different' => 'La nueva contraseña debe ser diferente a la actual',
    ])]
    public $new_password;


    #[Validate('required|same:new_password', message:[
        'required' => 'El campo es obligatorio',
        'same' => 'Las contraseñas no coinciden con la nueva',
    ])]
    public $password_confirmation;


    public function mount()
    {
        $user = Auth::user();
        $this->name = $user->name;
        $this->email = $user->email;
        $this->containPassword = $user->password ? true : false; // Verifica si el usuario tiene una contraseña
        $this->isOAuth = $user->google_id ? true : false; // Verifica si el usuario se registró con OAuth
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email',
            'new_password' => 'required|min:6|different:password',
            'password_confirmation' => 'required|same:new_password',
        ];
    }

    public function updatePassword()
    {

        $user = Auth::user();

        if(!$this->isOAuth){
            // Si el usuario no se registró con OAuth, validamos la contraseña actual
            $this->rules()['password'] = 'required';
            
            $this->validate();
            
            //verificamos si la contraseña actual es correcta
            if(!Hash::check($this->password, $user->password)){
                //si no es correcta, lanzamos un error
                $this->addError('password', 'La contraseña actual es incorrecta');
                return;
            }
        }else{
            $this->validate();
        }

        
        //si es correcta, actualizamos la contraseña
        Auth::user()->update([
            'password' => Hash::make($this->new_password),
        ]);

        //limpiamos los campos
        $this->reset(['password', 'new_password', 'password_confirmation']);
        return session()->flash('success', 'Contraseña actualizada correctamente');

    }
    public function updateProfile()
    {
        $this->validate();

        Auth::user()->update([
            'name' => $this->name,
        ]);

        return session()->flash('success', 'Nombre actualizado correctamente');
    }

    function deleteAccount()
    {
        $user = Auth::user();
        $user->delete();
        Auth::logout();
        return redirect()->route('home');
    }

    public function render()
    {
        return view('livewire.profile-section');
    }
}