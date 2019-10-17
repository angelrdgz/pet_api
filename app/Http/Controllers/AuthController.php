<?php

namespace App\Http\Controllers;

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

            if (Hash::check($request->password, $user->password)) {
                $token = $user->createToken('Pets Rules')->accessToken;
                $response = ['user'=>$user, 'token' => $token];
                return response($response, 200);
            } else {
                $response = "Password missmatch";
                return response($response, 422);
            }
        } else {
            $response = 'User does not exist';
            return response($response, 422);
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

        return response()->json(['message' => "User saved successfully"], 200);
    }
}
