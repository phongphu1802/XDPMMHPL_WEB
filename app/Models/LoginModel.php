<?php


namespace App\Models;


use Illuminate\Support\Facades\DB;

class LoginModel extends DB{
    //Select table accout với account_name
    //Input: account_name
    //Output: table account với account_name đã input
    public function login ($username){
        return DB::select('select * from account where account_name = :account', ['account' => $username]);
    }

    //Select table position_permission 
    //Input: position_id
    //Output: table position_permission với table positon và table permission tương ứng
    public function decentralization ($position){
        return DB::select('select * from position_permission, permission where position_permission.permission_id = permission.id and position_id = :position_id', ['position_id' => $position]);
    }
}
