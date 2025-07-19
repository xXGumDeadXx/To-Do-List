<?php

namespace App\Livewire;

use Livewire\Component;

class OtherSection extends Component
{
    public $content = "Aquí puedes poner el contenido de la otra sección";

    public function render()
    {
        return view('livewire.other-section');
    }
}
