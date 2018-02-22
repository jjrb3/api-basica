<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ParentsController extends Controller
{
    public function Index(Request $request) {

        if($request->ajax()) {

            $result = null;

            switch ($request->get('method'))
            {
                case 'parents':
                    $result = $this->GetParentsByToken($request);
                    break;

                case 'parentsByFather':
                    $result = $this->GetParentsByTokenFather($request);
                    break;
            }

            return $result;
        }
    }


    private function GetParentsByToken($request) {

    }

    private function GetParentsByTokenFather($request) {

    }
}
