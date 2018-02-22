<?php

namespace App\Http\Controllers;

use App\Parents;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ParentsController extends Controller
{
    public function Index(Request $request) {

        $result = null;

        switch ($request->get('method'))
        {
            case 'GetParents':
                $result = $this->GetParentsByToken($request->all());
                break;

            case 'GetChildren':
                $result = $this->GetChildrenByTokenParent($request->all());
                break;
        }

        return $result;
    }


    private function GetParentsByToken($data) {

        $valitator = Validator::make($data, [
            'token' => 'required|string|min:30|max:100',
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
            return Parents::GetByToken($data['token']);
        }
    }

    private function GetChildrenByTokenParent($data) {

        $valitator = Validator::make($data, [
            'token' => 'required|string|min:30|max:100',
            'parent' => 'required|numeric|min:1'
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
            return Parents::GetChildrenByToken($data['token']);
        }
    }
}
