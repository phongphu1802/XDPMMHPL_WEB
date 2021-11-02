<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffModel extends Model
{
    //Tìm thông tin tài khoản
    protected $table = "staff";
    public function staff_information ($account_id){
//        return DB::select('select * from staff where account_id = :account_id', ['account_id' => $account_id]);
        return StaffModel::where('account_id',$account_id)->get();
    }
}
