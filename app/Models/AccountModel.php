<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AccountModel extends Model
{
    protected $table = "account,position";
    public function account_manage(){
        return DB::select('select account.id, position.title_name, account.account_name, account.password, account.status from account,position where account.position_id = position.id and account.position_id=3');
    }

    public function account_customer(){
        return DB::select('select account.id, position.title_name, account.account_name, account.password, account.status from account,position where account.position_id = position.id and account.position_id=1');
    }
}
