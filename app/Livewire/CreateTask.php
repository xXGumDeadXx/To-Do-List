<?php

namespace App\Livewire;

use Livewire\Attributes\Validate;
use Livewire\Component;
use App\Models\Task;
use Auth;

class CreateTask extends Component
{
    #[Validate('required|min:3|max:255', message:[
        'required' => 'Ingrese un título válido',
        'min' => 'El título debe tener al menos 3 caracteres',
        'max' => 'El título no puede tener más de 255 caracteres'
    ] )]
    public $title;
    #[Validate('nullable|max:1000', message:[
        'max' => 'La descripción no puede tener más de 1000 caracteres'
    ] )]
    public $description;
    #[Validate('required|date_format:Y-m-d', message:[
        'required' => 'Ingrese una fecha válida',
        'date_format' => 'La fecha debe estar en el formato YYYY-MM-DD'
    ] )]
    public $due_date;

    public function saveTask()
    {
        $this->validate();
        
        Task::create([
            'title' => $this->title,
            'description' => $this->description == null ? "Sin descripción" : $this->description,
            'due_date' => $this->due_date,
            'user_id' => Auth::id()
        ]);

        $this->dispatch('taskCreated');

        // Reset fields after saving
        $this->resetForm();

        //hacemos un evento
        $this->dispatch('taskCreated');

    }
    public function resetForm()
    {
        $this->reset(['title', 'description', 'due_date']);
    }
    

    public function render()
    {
        return view('livewire.create-task');
    }
}
