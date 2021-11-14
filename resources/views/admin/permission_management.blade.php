@extends('admin_layout')
@section('admin_content')
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Quản lý quyền
            </div>
            <form method="get" action="{{URL::to('admin/13/add')}}">
                <button type="submit" class="btn btn-warning" id="add_position" onClick="" style="margin-top: 10px;margin-left: 10px; float: left" >Thêm quyền mới</button>
            </form>
            <form method="get" action="{{URL::to('admin/13/unhidden')}}">
            <button type="submit" class="btn btn-warning" id="open_position" onClick="" style="margin-top: 10px;margin-left: 10px; float: left">Mở quyền đã ẩn</button>
            </form>
        <div>
            <div class="panel-body" style="margin-top: 40px">
                <table id="table_position_permission" class="display" style="width:100%">
                  <thead>
                    <tr>
                        <th></th>
                        @foreach($arPosition as $arrayPosition)
                            @if($arrayPosition->status==1)
                                <th>{{$arrayPosition->title_name}}
                                    <form method="get" action="{{URL::to('admin/13/repair')}}">
                                        <button class="btn btn-info btn-sm" style="float: left" title="Chỉnh sửa thông tin quyền" name="id" value="{{$arrayPosition->id}}" id="{{$arrayPosition->id}}" type="submit"><i class="fa fa-edit"></i></button>
                                    </form>

                                    <form method="get" action="{{URL::to('admin/13/hidden')}}">
                                        <button class="btn btn-danger btn-sm" style="float: left; margin-left: 5px" title="Ẩn quyền" name="id" value="{{$arrayPosition->id}}" id="id" type="submit"><i class="fa fa-lock" ></i></button>
                                    </form>
                                </th>
                            @endif
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach($arPermission as $arrayPermission)
                    <tr>
                        <td>{{$arrayPermission->title_name}}</td>
                        <?php
                        /** @var TYPE_NAME $arPosition_Permission */
                        /** @var TYPE_NAME $arrayPermission */
                        /** @var TYPE_NAME $arPosition */
                        /** @var TYPE_NAME $temp */
                        $temp = $arPosition->count();
                        for($i=1; $i<=$temp; $i++){
                            //Kiểm tra trạng thái của quyềnn đang ẩn hay hiên
                            if($arPosition->where('id',$i)->where('status',1)->count()){
                                //Kiểm tra dữ liệu của từng row tương ứng với collum
                                $filtered1 = $arPosition_Permission->where('permission_id',$arrayPermission->id)->where('position_id',$i);
                                if($filtered1->count()!=0){
                                    echo '<td><i class="fa fa-check" aria-hidden="true" style="color: green;"></i></td>';
                                }else{
                                    echo '<td><i class="fa fa-times" aria-hidden="true" style="color: red;"></i></td>';
                                }
                            }
                        }
                        ?>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        </div>
    </div>
</div>
@endsection
