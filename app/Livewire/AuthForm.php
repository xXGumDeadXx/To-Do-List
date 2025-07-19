<?php

namespace App\Livewire;

use Livewire\Component;

class AuthForm extends Component
{   
    public $showRegister = true;


    public function toggleAuth()
    {
        $this->showRegister = !$this->showRegister;
    }

    public function render()
    {
        return view('livewire.auth-form');
    }
}
