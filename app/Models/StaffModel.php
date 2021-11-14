<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffModel extends Model
{
    protected $table = "staff";

    //Select table staff với id
    //Input: Staff[account_id]
    //Output: Trả về row dữ liệu table staff tương ứng với id
    public function staff_information ($account_id){
        return StaffModel::where('account_id',$account_id)->get();
    }
}
