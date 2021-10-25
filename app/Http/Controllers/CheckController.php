<?php

namespace App\Http\Controllers;

use Session;
use Cookie;
use Illuminate\Http\Request;

class CheckController extends Controller
{
    //Kiểm tra cookie thông tin đăng nhập có tồn tại không
    public function check_cookie(){
        //Lấy cookie
        $admin_id_cookie = Cookie::get('admin_id_cookie');
        $admin_position_cookie = Cookie::get('admin_position_cookie');
        if($admin_id_cookie && $admin_position_cookie){
            //Cho vào trang admin
            return true;
        }else {
            return false;
        }
    }

    //Kiểm tra session thông tin đăng nhập có tồn tại không
    public function check_session(){
        //Lấy session
        $admin_id = Session::get('admin_id');
        $admin_position = Session::get('admin_position');
        //Kiểm tra sessition
        if ($admin_position && $admin_id) {
            return true;
        } else {
            return false;
        }
    }
}
