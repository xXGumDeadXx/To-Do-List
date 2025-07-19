<?php

use App\Models\Task;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\GoogleAuthController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Mail;



Route::get('/', function () {
    return view('home');
})->name('home');

Route::post('/logout', function () {
    //cerramos las sesiones del usuario
    Auth::logout();
    return redirect()->route('home');
})->name('logout');


//Rutas del dashboard

Route::prefix('/dashboard')->middleware('auth')->group(function () {
    Route::get('/', [TaskController::class, 'index'])->name('dashboard');
    //Pagina de tareas

    Route::get('/tareas',[TaskController::class, 'tasks'])->name('tasks');

    Route::get('/tareas/editar', [TaskController::class, 'edit'])->name('tasks.edit');
    Route::post('/tareas/editar', [TaskController::class, 'saveTask'])->name('tasks.update');

    Route::get('/configuracion', function(){
        return view('auth.configuracion');
    })->name('settings');

});



//Url de login de aplicaciones

Route::get('/login/google/redirect', [GoogleAuthController::class, 'redirect'])->name('google.login');
Route::get('/login/google/callback', [GoogleAuthController::class, 'callback']);