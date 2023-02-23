<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class LoginController extends Controller
{
    public function getLogin() {
        return view('login');
    }
    
    public function login(Request $request) {
        $user = User::where('email', $request->input('email'))->first();

        if(!is_null($user)) {
            if(Hash::check($request->input('password'), $user->password)) {
                Auth::login($user);
                return redirect('/');
            } else {
                return back()->withErrors([
                    'msg' => 'Correo o contraseña no válidos',
                ]);
            }
        } else {
            return back()->withErrors([
                'msg' => 'Correo no encontrado',
            ]);
        }
    }

    public function logout() {
        Auth::logout();

        return redirect('/');
    } 

    public function getRegister() {
        return view('register');
    }
    
    public function register(Request $request) {
        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->role = 'client';
        $user->save();

        return redirect()->route('login.getLogin');
    }

    public function verifyEmailAvailability(Request $request) {
        $user = User::where('email', $request->input('email'))->first();
        
        if(is_null($user)) {
            return response()->json(['status' => 'AVAILABLE']);
        } else {
            return response()->json(['status' => 'UNAVAILABLE']);
        }
    }
    
}
