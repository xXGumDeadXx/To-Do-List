<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Task;
use Auth;
use Livewire\Attributes\On;

class TaskCounter extends Component
{
    public $counts = [
        'completed' => 0,
        'pending' => 0,
        'overdue' => 0
    ];


    public function mount()
    {
        $this->updateCounts();
    }

    public $activeFilters = [
        'showCompleted' => true,
        'showPending' => true,
        'showOverdue' => true
    ];

    #[On(['taskCreated'])]
    public function updateCounts()
    {
        $this->counts = [
            'completed' => Task::where('user_id', Auth::id())
                            ->where('completed', true)
                            ->count(),
            'pending' => Task::where('user_id', Auth::id())
                          ->where('completed', false)
                          ->where(function($query) {
                              $query->whereNull('due_date')
                                    ->orWhere('due_date', '>=', now());
                          })
                          ->count(),
            'overdue' => Task::where('user_id', Auth::id())
                           ->where('completed', false)
                           ->where('due_date', '<', now())
                           ->count(),
        ];

        $this->dispatch('tasksUpdated');
    }

    public function render()
    {
        return view('livewire.task-counter');
    }
}
