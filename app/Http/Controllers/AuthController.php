<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required'
        ],
        [
            'email.required' => 'El correo es requerido',
            'password.required' => 'La contraseña es requerida'
        ]);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator->errors());
        }
        
        $user = User::where('email', $request->email)->first();

        if ($user) {

            if (Auth::attempt($request->only(['email', 'password']))) {
                return redirect('admin/calendar');
            } else {
                $response = "Email o contraseña erroneos";
                return back()->with('error', $response);
            }
        } else {
            $response = "Email o contraseña erroneos";
            return back()->with('error', $response);
        }
    }

    public function register(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|unique:users|max:255',
            'name' => 'required',
            'password' => 'required|min:7|max:15',
            'phone' => 'required|min:10|max:12',
        ],
        [
            'email.required' => 'El correo es requerido',
            'email.unique' => 'El correo ya esta registrado',
            'email.max' => 'El correo no puede exceder mas de :max caracteres',
            'name.required' => 'El nombre es requerido',
            'password.required' => 'La contraseña es requerida',
            'password.min' => 'La contraseña debe tener más de :min caracteres',
            'password.max' => 'La contraseña debe tener menos de :max caracteres',
            'phone.required' => 'El teléfono es requerido',
            'phone.min' => 'El teléfono debe tener de :min caracteres',
            'phone.max' => 'El teléfono debe tener de :max caracteres',
        ]);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator->errors());
        }

        $user = new User();
        $user->email = $request->email;
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->role_id = 1;
        $user->password = Hash::make($request->password);
        $user->save();

        $response = "Hemos enviado un código de activación a su correo";
        return back()->with('success', $response);
    }

    public function logout(Request $request){
        Auth::logout(); // log the user out of our application
        return redirect('login')->with('success','Salio de sesión correctamente');
    }
}
