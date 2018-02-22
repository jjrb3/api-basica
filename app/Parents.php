<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Mockery\Exception;

class Parents extends Model
{
    public $timestamps = true;
    protected $table = "parents";


    public static function GetByToken($token) {

        return Parents::select('parents.*')
            ->join('users','parents.id_user','users.id')
            ->where('users.remember_token',$token)
            ->get();
    }


    public static function GetChildrenByToken($token) {

        try {
            return Parents::select('parents.*')
                ->join('users', 'parents.id_parent', 'users.id')
                ->where('users.remember_token', $token)
                ->get();
        }
        catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
