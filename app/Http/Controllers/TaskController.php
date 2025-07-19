<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EditFormRequest;
use App\Models\Task;
use Auth;

class TaskController extends Controller
{
    public function index()
    {
        try{
            $userId = Auth::user()->id;
            //Recuperamos las tareas del usuario autenticado
            $tasks = Task::where('user_id', $userId);
            //recuperamos las tareas completadas y pendientes
            $taskCompleted = Task::where('completed', true)->where('user_id', $userId);
            $taskPending = Task::where('completed', false)->where('user_id', $userId);
            $taskOverdue = Task::where('completed', false)
                ->where('due_date', '<', now())
                ->where('user_id', $userId);
    
            //Pasamos los valores como un objeto
            $infoTasks = (object)[
                'total' => $tasks->count(),
                'completed' => $taskCompleted->count(),
                'pending' => $taskPending->count(),
                'overdue' => $taskOverdue->count(),
    
            ];
    
            return view('auth.dashboard', compact('infoTasks'));

        }catch (\Exception $e){
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function tasks(){
        return view('auth.tareas');
    }

    public function edit(Request $request){
        // Verificamos si tenemos una peticion
        if (!$request->has('id')){
            return redirect()->route('tasks')->with('error', 'No se ha especificado una tarea para editar.');
        }
        //recuperamos la id de la tarea
        $taskId = $request->input('id');
        //buscamos la tarea por id
        $verifyTaskUser = Task::where('id', $taskId)->where('user_id', Auth::user()->id)->first();
        if(!$verifyTaskUser){
            return redirect()->route('tasks')->with('error', 'La tarea no existe o no pertenece a este usuario.');
        }
        $infoTask = $verifyTaskUser;

        return view('auth.editar', compact('infoTask'));
    }

    public function saveTask(EditFormRequest $request){
        // Validamos los datos de la tarea
        if(!$request->has('id')){
            return redirect()->route('tasks')->with('error', 'No hay id');
        }
        // Validamos los campos de la tarea

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'due_date' => 'date',
        ]);

        try{
            if($request->input('status') === 'completed'){
                $isCompleted = true;
            } elseif ($request->input('status') === 'overdue') {
                $isCompleted = false; // Overdue tasks are not completed
            } else {
                $isCompleted = false; // Default to pending if no status is provided
            }

            // Creamos o actualizamos la tarea
            Task::updateOrCreate(
                ['id' => $request->input('id'), 'user_id' => Auth::user()->id],
                [
                    'title' => $request->input('title'),
                    'description' => $request->input('description') == null ? "Sin descripción" : $request->input('description'),
                    'due_date' => $request->input('due_date'),
                    'completed' => $isCompleted,
                ]
            );
            return redirect()->route('tasks')->with('success', 'Tarea guardada correctamente.');

        }catch (\Exception $e){
            dd($e->getMessage());
            return redirect()->route('tasks')->with('error', 'Error al guardar la tarea: ' . $e->getMessage());
        }

    }
}
