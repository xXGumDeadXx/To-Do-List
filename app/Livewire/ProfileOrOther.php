<?php

namespace App\Livewire;

use Livewire\Component;

class ProfileOrOther extends Component
{
    public $activeTab = 'profile'; // 'profile' o 'other'

    public function switchTab($tab)
    {
        $this->activeTab = $tab;
    }

    public function render()
    {
        return view('livewire.profile-or-other');
    }
}
