@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            Thêm quyền mới
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="col-md-12">
                            <form action="{{URL :: to('admin/13/repair-save')}}" method="post">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <div id="macv" name="macv" value=""></div>
                                    <label>Chức vụ cần cập nhật thêm</label>
                                        <!-- Kiểm tra input chua tao thi se tao ra -->
                                        <input class="form-control" type="hidden" placeholder="Chức vụ cần thêm" id="position_id" name="position_id" value="">
                                        <input class="form-control" placeholder="Chức vụ cần thêm" id="position_name" name="position_name" value="" required="">
                                </div>
                                <div class="form-group">
                                    <label>Quyền truy cập tài khoản</label>
                                    @foreach($arPermission as $arrayPermission)
                                        <div class="pretty p-switch p-fill"><input type="checkbox" id="{{$arrayPermission->id}}" name="permission_{{$arrayPermission->id}}" value="{{$arrayPermission->id}}">  {{$arrayPermission->title_name}}</div>
                                    @endforeach
                                    <button id="btnsubmitsuachucvu" value="nut" class="btn btn-primary" type="submit">Lưu nội dung đã sửa</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div><!-- /.col-->
            </div><!-- /.row -->
        </div>
    </div>
    @endsection
