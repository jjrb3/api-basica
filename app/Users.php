<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Users extends Model
{
    public static function Create($data) {

        return DB::table('users')
            ->insert(
                [
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'password' => md5($data['password']),
                    'remember_token' => $data['token'],
                ]
            );
    }


    public static function Login($data) {

        return DB::table('users')
            ->where('email',$data['email'])
            ->where('password', md5($data['password']))
            ->get();
    }
}
