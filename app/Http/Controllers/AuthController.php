<?php

namespace App\Http\Controllers;

use App\Models\members;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    public function Register(Request $request){


        $user = User::create([
            'name'=>$request->input('name'),
            'lastname'=>$request->input('lastname'),
            'username' => $request->input('username'),
            'email' =>$request->input('email'),
            'ministryId' => $request->input('ministryId'),
            'password' => Hash::make($request->input('password')),
            'memberId' => $request->input('memberId')
        ]);

        $token = $user->createToken('remember_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }


    public function login(Request $request){
        {
            $rules = [
                'username' => 'required',
                'password' => 'required'
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return response()->json([
                    'message' => 'Algunos campos contienen errores.',
                    'detail' => $validator->errors()->all()
                ], 400);
            }

            $user = user::where('username', $request->input('username'))->first();

           // $userData = members::Where('userId',$request->input($user->id))->first();

            if ($user && Hash::check($request->input('password'), $user->password)) {
                return response()->json([
                    'data' => $user,
                    'token' => $user->createToken('userToken')->plainTextToken,
                ]);
            } else {
                return response()->json([
                    'message' => 'Usuario/Contraseña incorrectos.',
                ], 400);
            }
        }
    }
}
