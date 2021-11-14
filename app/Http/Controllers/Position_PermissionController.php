<?php

namespace App\Http\Controllers;

use App\Models\PermissionModel;
use App\Models\PositionModel;
use App\Models\Position_PermissionModel;
use Session;
use Cookie;
use Illuminate\Http\Request;

class Position_PermissionController extends Controller
{
    //Xử lý hiện giao điện quản lý quyền
    //Input: Null
    //Output: Trả về link dẫn trang quản lý quyền 
    public function permission_management()
    {
        if(CheckController::check_session()) {
            return view('admin.permission_management')
                ->with('arPosition', PositionModel::position())
                ->with('arPermission', PermissionModel::permission())
                ->with('arPosition_Permission', Position_PermissionModel::position_permission());
        }else{
            return view('admin_login');
        }
    }

    //Xử lý hiện giao điện sủa lý quyền
    //Input: id của position cần chỉnh sửa
    //Output: Trả về link dẫn trang chỉnh sửa position
    public function repair_position_permission(Request $request)
    {
        if(CheckController::check_session()) {
            return view('admin.repair_position_permission')
                ->with('arPosition', PositionModel::position_id($request->get('id')))
                ->with('arPermission', PermissionModel::permission())
                ->with('arPosition_Permission', Position_PermissionModel::repair_position($request->get('id')));
        }else{
            return view('admin_login');
        }
    }

    //Xử lý hiện giao điện sủa lý quyền
    //Input: Null
    //Output: Trả về link dẫn trang thêm position
    public function add_position_permission()
    {
        if(CheckController::check_session()) {
            return view('admin.add_position')
                ->with('arPermission', PermissionModel::permission());
        }else{
            return view('admin_login');
        }
    }

    //Xử lý cập nhật thay đổi quyền
    //Input: Tên position và id permission
    //Output: Cập nhật dữ liệu về database và trả về link trang permission_management
    public function repair_save_position_permission(Request $request){
        //Kiểm tra name của position
        if($request->get("position_name")){
            //Kiểm tra id của position đã có hay chưa
            //Nếu đã có thực hiện update position
            //Nếu chưa có thực hiện insert position
            if($request->get("position_id")){
                //Xoa permission trong table permission_position theo position_id
                Position_PermissionModel::delete_position($request->get("position_id"));
                //Kiem tra lay id max cua table permission
                $permission_id=PermissionModel::select_permission_end();
                for ($i=1;$i<=$permission_id;$i++){
                    if($request->get("permission_$i")){
                        Position_PermissionModel::add_position_permission($request->get("position_id"),$request->get("permission_$i"));
                    }
                }
                //Trả về trang permission_management
                return $this::permission_management();
            }else{
                //Kiem tra lay id max cua table position
                $position_id = PositionModel::select_position_end();
                PositionModel::insert($position_id+1,$request->get("position_name"),1);
                //Kiem tra lay id max cua table permission
                $permission_id=PermissionModel::select_permission_end();
                for ($i=1;$i<=$permission_id;$i++){
                    if($request->get("permission_$i")){
                        Position_PermissionModel::add_position_permission($position_id+1,$request->get("permission_$i"));
                    }
                }
                //Trả về trang permission_management
                return $this::permission_management();
            }
        }
    }

    //Xử lý ẩn quyền
    //Input: Position[id] 
    //Output: Trả về link trang permission_management
    public function hidden_position_permission(Request $request){
        if(isset($request->id)){
            PositionModel::update_status($request->get("id"),0);
            return $this::permission_management();
        }
    }

    //Xử lý hiện các quyền bị ẩn đi
    //Input: Null
    //Output: Trả về link trang unhidden_position
    public function unhidden_position_permission(){
        return view('admin.unhidden_position')
                ->with('arPosition', PositionModel::position());
    }

    //Xử lý để mở quyền
    //Input: Position[id] cần mở khóa
    //Output: Cập nhật dữ liệu vào database và trả về link trang permission_management
    public function unhidden_save_position_permission(Request $request){
        if(isset($request->id)){
            PositionModel::update_status($request->get("id"),1);
            return $this::permission_management();
        }
    }
}
