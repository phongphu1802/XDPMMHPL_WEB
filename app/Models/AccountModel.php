<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AccountModel extends Model
{
    //Tìm thông tin tài khoản
    public function account_information ($account_id){
        return DB::select('select * from staff where account_id = :account_id', ['account_id' => $account_id]);
    }

    public function account_manage(){
        return DB::select('select account.id, position.title_name, account.account_name, account.password, account.status from account,position where account.position_id = position.id and account.position_id=3');
    }

    public function account_customer(){
        return DB::select('select account.id, position.title_name, account.account_name, account.password, account.status from account,position where account.position_id = position.id and account.position_id=1');
    }
}
