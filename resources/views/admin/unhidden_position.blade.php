@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
   <div class="panel panel-default">
      <div class="panel-heading">
         Các chức vụ đã ẩn
      </div>
      <div>
         <table class="table" ui-jq="footable" ui-options='{
            "paging": {
            "enabled": true
            },
            "filtering": {
            "enabled": true
            },
            "sorting": {
            "enabled": true
            }}'>
         <thead>
            <tr>
               <th data-sortable="true">Các quyền đã ẩn</th>
               <th data-sortable="true">Thao tác</th>
            </tr>
         </thead>
         <tbody>
            @foreach($arPosition as $values)
                @if($values->status==0)
                    <tr data-expanded="true">
                        <td data-sortable="true">{{$values->title_name}}</td>
                        <td data-sortable="true">
                           <form method="post" action="{{URL::to('admin/13/unhidden-save')}}">
                              {{ csrf_field() }}
                              <button class="btn btn-danger btn-sm" style="float: left" title="Mở khóa quyền" name="id" value="{{$values->id}}" id="{{$values->id}}" type="submit"><i class="fa fa-unlock"></i></button>
                           </form>
                        </td>
                    </tr>
                @endif
            @endforeach
         </tbody>
         </table>
      </div>
   </div>
</div>
@endsection
