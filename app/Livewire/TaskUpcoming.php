<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Task;

class TaskUpcoming extends Component
{
    public $upcomingTasks;

    public function mount()
    {
        $this->loadUpcomingTasks();
    }

    public function loadUpcomingTasks()
    {
        $this->upcomingTasks = Task::where('user_id', auth()->id())
            ->where('completed', false)
            ->whereDate('due_date', '>=', now()->startOfDay())
            ->whereDate('due_date', '<=', now()->addDays(3)->endOfDay())
            ->orderBy('due_date', 'asc')
            ->get();
    }
    public function markAsCompleted($taskId)
    {
        $task = Task::find($taskId);
        if ($task && $task->user_id === auth()->id()) {
            $task->completed = true;
            $task->save();
            $this->loadUpcomingTasks(); // Reload tasks after marking one as completed
            return redirect()->route('dashboard'); // Redirect to the dashboard after completion
        }
    }

    public function render()
    {
        return view('livewire.task-upcoming');
    }
}
