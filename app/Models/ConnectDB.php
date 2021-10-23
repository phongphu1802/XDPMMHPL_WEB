<?php


namespace App\Models;


use Illuminate\Support\Facades\DB;

class ConnectDB extends DB{
    public function executeQuery(String $Query){
        return DB::statement($Query);
    }

    public function Select(String $TableName,String $Condition,String $OrderBy){
        
    }
}
