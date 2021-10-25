<?php


namespace App\Models;


use Illuminate\Support\Facades\DB;

class loginmodel extends DB{
    public function login ($username){
        return DB::select('select * from account where account_name = :account', ['account' => $username]);
    }
    //Tìm queyen
    public function decentralization ($position){
        return DB::select('select * from position_permission, permission where position_permission.permission_id = permission.id and position_id = :position_id', ['position_id' => $position]);
    }
}
