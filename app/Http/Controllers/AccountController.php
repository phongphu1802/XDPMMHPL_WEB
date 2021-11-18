<?php

namespace App\Http\Controllers;

use App\Models\AccountModel;
use App\Models\PositionModel;
use Session;
use Cookie;
use Hash;
use Illuminate\Http\Request;

class AccountController extends Controller
{

    public function account_manage (){
        $resultAccount = AccountModel::account_manage();
        //Lấy thông tin tài khoản
        $arAccount = array();
        foreach ($resultAccount as $row){
            $arAccount[] = array($row->id,$row->title_name,$row->account_name,$row->password,$row->status);
        }
        return $arAccount;
    }

    public function account_customer (){
        $resultAccount = AccountModel::account_customer();
        //Lấy thông tin tài khoản
        $arAccount = array();
        foreach ($resultAccount as $row){
            $arAccount[] = array($row->id,$row->title_name,$row->account_name,$row->password,$row->status);
        }
        return $arAccount;
    }

    //Xử lý hiện giao điện quản lý tài khoản
    public function account_management(){
        if(CheckController::check_session()) {
            return view('admin.account_management')
                ->with('arAccountManage', $this->account_manage())
                ->with('arAccountCustomer', $this->account_customer());
        }else{
            return view('admin_login');
        }
    }

    public function hidden_account(Request $request){
        AccountModel::hidden_account($request->get('id'),0);
        return $this->account_management();
    }

    public function unhidden_account(Request $request){
        AccountModel::hidden_account($request->get('id'),1);
        return $this->account_management();
    }

    public function add_account()
    {
        return view('admin.add_account')
                ->with('arPosition',PositionModel::position());
    }

    public function add_save_account(Request $request)
    {
        $id = AccountModel::select_account_end();
        $password = Hash::make($request->get('password'));
        AccountModel::insert($id+1, $request->get('position_id'), $request->get('username'), $password, 2);
        return $this->account_management();
    }
}
