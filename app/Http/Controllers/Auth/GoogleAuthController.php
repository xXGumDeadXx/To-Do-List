<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Str;

class GoogleAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        try{
            //recuperamos el usuario de la sesion
            $user = Socialite::driver('google')->user();
            
            //Verificamos si el usuario eiste en la base de datos
            $userExists = User::where('google_id', $user->getId())->first();
            
            if($userExists){
                Auth::login($userExists);
                return redirect()->route('dashboard');
            }
            //Si el usuario no existe, creamos un nuevo
            $userNew = User::create([
                'google_id' => $user->getId(),
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                'avatar' => $user->getAvatar(),
                'password' => null, // No necesitamos contraseña para OAuth
            ]);
    
            //creamos una sesion y lo redirigimos
            Auth::login($userNew);
    
            return redirect()->route('dashboard');

        } catch (\Exception $e) {
            return redirect()->route('home');
        }


    }
}
