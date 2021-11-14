<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AccountModel extends Model
{
    protected $table = "account";
    //Lấy dữ liệu thông tin của tài khoản của nhà quản lý
    //Input: Null
    //Output: accout[id,account_name,password,status] and position[title_name] tương ứng với accout[positon_id] với position_id != 1
    public function account_manage(){
        return DB::select('select account.id, position.title_name, account.account_name, account.password, account.status from account,position where account.position_id = position.id and account.position_id!=1');
    }

    //Lấy dữ liệu thông tin của tài khoản của khách hàng
    //Input: Null
    //Output: accout[id,account_name,password,status] and position[title_name] tương ứng với accout[positon_id] với position_id = 1
    public function account_customer(){
        return DB::select('select account.id, position.title_name, account.account_name, account.password, account.status from account,position where account.position_id = position.id and account.position_id=1');
    }

    //Update status của table account
    //Input: account id
    //Output: Null
    public function hidden_account($account_id, $status)
    {
        DB::update('update account set status = ? where id = ?',[$status,$account_id]);
    }
}
