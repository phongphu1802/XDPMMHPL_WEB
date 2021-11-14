<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PositionModel extends Model
{
    protected $table = "position";
    //Select table position
    //Input: Null
    //Output: Dữ liệu table position
    public function position(){
        return DB::table('position')->get();
    }

    //Select table position với id
    //Input: position[id]
    //Output: Dữ liệu row table position tương ứng với id
    public function position_id($id){
        return DB::table('position')->where('id',$id)->get();
    }

    //Insert table position
    //Input: position[id, title_name, status]
    //Output: Null
    public function insert($position_id, $position_name, $position_status)
    {
        DB::insert('insert into position values (?,?,?)',[$position_id, $position_name, $position_status]);
    }

    //Select id max của table position
    //Input: Null
    //Output: Trả về id max của position
    public function select_position_end(){
        return DB::table('position')->orderBy('id','ASC')->get()->pluck('id')->last();
    }

    //Update trạng thái của position
    //Input: position[id, status]
    //Output: Null
    public function update_status($position_id, $status)
    {
        DB::update('update position set status = ? where id = ?',[$status,$position_id]);
    }
}
