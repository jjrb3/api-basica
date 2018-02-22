<?php

namespace App\Http\Controllers;

use App\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    public function Create(Request $request) {

        $data = $request->all();

        $valitator = Validator::make($data, [
            'name' => 'required|string|min:3|max:50',
            'email' => 'required|string|email|max:50',
            'password' => 'required|string|min:6'
        ]);


        if ($valitator->fails()) {
            return response()->json(
                [
                    'code' => 0,
                    'message' => 'Se encontraron problemas al realizar la peticion',
                    'data' => null
                ]
            );
        }
        else {

            $data['token'] = bin2hex(random_bytes(50));

            if (Users::Create($data)) {
                return response()->json(
                    [
                        'code' => 1,
                        'message' => 'Se guardaron los cambios correctamente',
                        'data' => $data['token']
                    ]
                );
            }
            else {
                return response()->json(
                    [
                        'code' => 0,
                        'message' => 'Se encontraron problemas al guardar los datos',
                        'data' => null
                    ]
                );
            }
        }
    }


    public function Login(Request $request) {

        $data = $request->all();

        $valitator = Validator::make($data, [
            'email' => 'required|string|email|max:50',
            'password' => 'required|string|min:6'
        ]);


        if ($valitator->fails()) {
            return response()->json(
                [
                    'code' => 0,
                    'message' => 'Se encontraron problemas al realizar la peticion'
                ]
            );
        }
        else {
            $data = Users::Login($data);

            if($data->count() > 0) {
                return response()->json(
                    [
                        'code' => 1,
                        'message' => 'Se ingreso correctamente',
                        'data' => $data[0]->remember_token
                    ]
                );
            }
            else {
                return response()->json(
                    [
                        'code' => 0,
                        'message' => 'El usuario o contraseña no son validos'
                    ]
                );
            }
        }
    }
}
