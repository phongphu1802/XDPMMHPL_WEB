<?php


namespace App\Models;


use Illuminate\Support\Facades\DB;

class loginmodel extends DB{
    public function login ($username){
        return DB::select('select * from account where account_name = :account', ['account' => $username]);
    }
}
