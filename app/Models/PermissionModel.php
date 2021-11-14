<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PermissionModel extends Model
{
    protected $table = "permission";
    //Select table permission
    //Input: Null
    //Output: Table permission 
    public function permission(){
        return DB::table('permission')->get();
    }

    //Select table permission and id max
    //Input: Null
    //Output: Trả về id max của table
    public function select_permission_end()
    {
        return DB::table('permission')->orderBy('id','ASC')->get()->pluck('id')->last();
    }
}
