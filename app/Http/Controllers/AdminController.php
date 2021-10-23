<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Cookie;
use Auth;
use App\Models\loginmodel;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    function __construct(){
//        $this->loginmodel = $this->model("loginmodel");
    }
    //Xử lý hiển thị trang login admin
    public function  index(){
        //Kiểm tra cookie
        if($this->check_cookie()){
            $this->login_cookie();
            return view('admin.dashboard');
        }else {
            //Kiểm tra sessition
            if ($this->check_session()) {
                return view('admin.dashboard');
            } else {
                return view('admin_login');
            }
        }
    }

    //Xử lý hiển thị trang admin
    public function  show_dashboard(){
        if($this->check_cookie()){
            $this->login_cookie();
            return view('admin.dashboard');
        }else {
            if ($this->check_session()) {
                $admin_position = Session::get('admin_position');
                //Kiểm tra quyền không phải là khách hàng
                if ($admin_position == 1) {
                    Session::forget('admin_id');//Xóa session
                    Session::forget('admin_position');
                    Session::put('message', "Mật khẩu hoặc tài khoản bị sai.");
                    return view('admin_login');
                } else {
                    return view('admin.dashboard');
                }
            } else {
                return view('admin_login');
            }
        }
    }

    //Xử lý kiểm tra thông tin đăng nhập là chính xác hay không
    public function  dashboard(Request $request){
        //Kiểm tra click submit
        if(isset($request->sbLogin)){
            //Lấy giá trị request
            $admin_user = $request->admin_user;
            $admin_password = $request->admin_password;
            $admin_save_passwword = $request->cb_savepassword;
            //Kiểm tra dữ liệu rỗng sẽ trả về trang login
            if(empty($admin_user)||empty($admin_password)){
                Session::put('message',"Mật khẩu hoặc tài khoản không đươc rỗng.");
                return Redirect::to('/admin_login');
            }
            $result=loginmodel::login($admin_user);
            if(!$result){
                Session::put('message',"Tài khoản không tồn tại.");
                return view('admin_login');
            }else{
                foreach($result as $row){
                    //Lấy dữ liệu tài khoản từ database
                    $id=$row->id;
                    $position=$row->position_id;
                    $password=$row->password;
                }
                //Kiểm tra mật khẩu có đúng không
                if(password_verify($admin_password,$password)){
                    //Kiểm tra người dùng có chọn lưu mật khẩu không
                    if($admin_save_passwword==1){
                        Cookie::queue('admin_id_cookie', $id,100);//Tạo cookie
                        Cookie::queue('admin_position_cookie', $position,100);
                        return Redirect::to('/dashboard');
                    }else{
                        Session::put('admin_id', $id);//Tạo session
                        Session::put('admin_position', $position);
                        return Redirect::to('/dashboard');
                    }
                }else{
                    Session::put('message',"Sai mật khẩu.");
                    return view('admin_login');
                }
            }
        }
    }

    //Xử lý đăng xuát khỏi trang admin
    public function logout(){
        //Kiểm tra session có thì xóa đi
        if($this->check_session()) {
            Session::forget('admin_id');//Xóa session
            Session::forget('admin_position');
        }
        //Kiểm tra cookie có thì xóa đi
        if($this->check_cookie()){
            Cookie::forget('admin_id_cookie');//Xóa cookie
            Cookie::forget('admin_position_cookie');
        }
        return view('admin_login');
    }


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

    //Đăng nhập tài khoản với cookie đang có
    public function login_cookie(){
        //Lấy cookie
        $admin_id_cookie = Cookie::get('admin_id_cookie');
        $admin_position_cookie = Cookie::get('admin_position_cookie');
        Session::put('admin_id', $admin_id_cookie);//Tạo session
        Session::put('admin_position', $admin_position_cookie);
    }
}
