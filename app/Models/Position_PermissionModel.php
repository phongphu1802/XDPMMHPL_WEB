<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Position_PermissionModel extends Model
{
    protected $table = "position_permission";
    //Select table position_permission
    //Input: Null
    //Output: Table position_permission
    public function position_permission(){
        return DB::table('position_permission')->get();
    }

    //Select table position_permission với position_id
    //Input: position_id
    //Output: Row dữ liệu trong table position_permission tương ứng với position_id
    public function repair_position($position){
        return DB::select('select * from position_permission where position_id = :position', ['position' => $position]);
    }

    //Delete table position_permission với position_id
    //Input: Position_id
    //Output: Null
    public function delete_position($position){
        DB::delete('delete from position_permission where position_id = ?', [$position]);
    }

    //Insert table position_permission
    //Input: Position_id và Permission_id
    //Output: Null
    public function add_position_permission($position_id, $permission_id){
        DB::insert('insert into position_permission(permission_id, position_id) values (:permission_id, :position_id)',['permission_id'=>$permission_id,'position_id'=>$position_id]);
    }
}
