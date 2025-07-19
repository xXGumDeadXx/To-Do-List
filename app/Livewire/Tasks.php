<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Task;
use Auth;
use Livewire\Attributes\On; 


class Tasks extends Component
{
    use WithPagination;

    public $filters = [
        'showCompleted' => true,
        'showPending' => true,
        'showOverdue' => true,
        'fromDate' => null,
        'toDate' => null,
    ];


    #[On('filters-updated')]
    public function updatedFilters($filters)
    {
        $this->filters = $filters;
        $this->resetPage(); // Reset pagination when filters are updated
    }


    #[On('taskCreated')]
    public function refreshTasks()
    {
        $lastPage = Task::paginate(9)->lastPage();
        $this->gotoPage($lastPage);
    }

    public function render()
    {
        //Query principal para despues obtener los resltados filtrados
        $query = Task::where('user_id', Auth::id())
            ->where(function($q) {

            if ($this->filters['showCompleted']) {
                $q->orWhere('completed', true);
            }

            if ($this->filters['showPending']) {
                $q->orWhere(function($q2) {
                    $q2->where('completed', false)
                       ->where(function($q3) {
                           $q3->whereNull('due_date')
                              ->orWhere('due_date', '>=', now());
                       });
                });
            }

            if ($this->filters['showOverdue']) {
                $q->orWhere(function($q2) {
                    $q2->where('completed', false)
                       ->where('due_date', '<', now());
                });
            }

            if (!$this->filters['showCompleted'] && !$this->filters['showPending'] && !$this->filters['showOverdue']) {
                    $q->whereRaw('1 = 0');
                }
            })
            ->when($this->filters['fromDate'] || $this->filters['toDate'], function($q) {
                if ($this->filters['fromDate']) {
                    $q->whereDate('due_date', '>=', $this->filters['fromDate']);
                }
                if ($this->filters['toDate']) {
                    $q->whereDate('due_date', '<=', $this->filters['toDate']);
                }
            })
            ->orderBy('due_date', 'asc');

        return view('livewire.tasks', [
            'tasks' => $query->paginate(9)
        ]);
    }
}
