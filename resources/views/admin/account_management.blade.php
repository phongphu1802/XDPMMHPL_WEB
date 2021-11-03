@extends('admin_layout')
@section('admin_content')

    {{--------------------------------------------------------------------------------------------------------------------}}
    {{--Quản lý tài khoản nhân viên--}}
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            Quản lý tài khoản nhân viên
        </div>
        <div class="panel-body">
            <table class="table table-striped b-t b-light" >
{{--            <table class="table" data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">--}}
                <thead>
                    <tr>
                        <th data-sortable="true">Mã tài khoản</th>
                        <th data-sortable="true">Quyền tài khoản</th>
                        <th data-sortable="true">Tên tài khoản</th>
                        <th data-sortable="true">Trạng thái</th>
                        <th style="width:30px;"></th>
                    </tr>
                </thead>
                <tbody>
                @foreach($arAccountManage as $arraycolumn)
                    <tr>
                        <td data-sortable="true">{{$arraycolumn[0]}}</td>
                        <td data-sortable="true"><span class="text-ellipsis">{{$arraycolumn[1]}}</span></td>
                        <td data-sortable="true"><span class="text-ellipsis">{{$arraycolumn[2]}}</span></td>
                        <td data-sortable="true"><span class="text-ellipsis">{{$arraycolumn[4]}}</span></td>
                        <td data-sortable="true">
                            <a href="" class="active" ui-toggle-class=""><i class="fa fa-check text-success text-active"></i><i class="fa fa-times text-danger text"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

{{--------------------------------------------------------------------------------------------------------------------}}
{{--Quản lý tài khoản khách hàng--}}
<div class="table-agile-info" style="margin-top: 10px">
    <div class="panel panel-default">
        <div class="panel-heading">
            Quản lý tài khoản Khách hàng
        </div>
        <div class="row w3-res-tb">
            <div class="col-sm-5 m-b-xs">
                <select class="input-sm form-control w-sm inline v-middle">
                    <option value="0">Bulk action</option>
                    <option value="1">Delete selected</option>
                    <option value="2">Bulk edit</option>
                    <option value="3">Export</option>
                </select>
                <button class="btn btn-sm btn-default">Apply</button>
            </div>
            <div class="col-sm-4">
            </div>
            <div class="col-sm-3">
                <div class="input-group">
                    <input type="text" class="input-sm form-control" placeholder="Search">
                    <span class="input-group-btn">
                        <button class="btn btn-sm btn-default" type="button">Go!</button>
                    </span>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped b-t b-light">
                <thead>
                <tr>
                    <th style="width:20px;">
                        <label class="i-checks m-b-none">
                            <input type="checkbox"><i></i>
                        </label>
                    </th>
                    <th>Mã tài khoản</th>
                    <th>Quyền tài khoản</th>
                    <th>Tên tài khoản</th>
                    <th>Trạng thái</th>
                    <th style="width:30px;"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($arAccountCustomer as $arraycolumn)
                    <tr>
                        <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                        <td>{{$arraycolumn[0]}}</td>
                        <td><span class="text-ellipsis">{{$arraycolumn[1]}}</span></td>
                        <td><span class="text-ellipsis">{{$arraycolumn[2]}}</span></td>
                        <td><span class="text-ellipsis">{{$arraycolumn[4]}}</span></td>
                        <td>
                            <a href="" class="active" ui-toggle-class=""><i class="fa fa-check text-success text-active"></i><i class="fa fa-times text-danger text"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <footer class="panel-footer">
            <div class="row">
                <div class="col-sm-7 text-right text-center-xs">
                    <ul class="pagination pagination-sm m-t-none m-b-none">
                        <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
                        <li><a href="">1</a></li>
                        <li><a href="">2</a></li>
                        <li><a href="">3</a></li>
                        <li><a href="">4</a></li>
                        <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
                    </ul>
                </div>
            </div>
        </footer>
    </div>
</div>
@endsection
