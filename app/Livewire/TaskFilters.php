<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;

class TaskFilters extends Component
{
    public $filters = [
        'showCompleted' => true,
        'showPending' => true,
        'showOverdue' => true,
        'fromDate' => null,
        'toDate' => null
    ];

    public function updatedFilters($value, $key)
    {
        // Validar fechas cuando se actualizan
        if (in_array($key, ['filters.fromDate', 'filters.toDate'])) {
            $this->validateDates();
        }
        $this->dispatch('filters-updated', filters: $this->filters);
    }
    protected function validateDates()
    {
        $this->validate([
            'filters.fromDate' => 'nullable|date',
            'filters.toDate' => 'nullable|date|after_or_equal:filters.fromDate'
        ], [
            'filters.toDate.after_or_equal' => 'La fecha final debe ser igual o posterior a la fecha inicial'
        ]);
    }

    public function resetFilters()
    {
        $this->filters = [
            'showCompleted' => true,
            'showPending' => true,
            'showOverdue' => true,
            'fromDate' => null,
            'toDate' => null
        ];
        $this->dispatch('filters-updated', filters: $this->filters);
    }

    public function render()
    {
        return view('livewire.task-filters');
    }
}
