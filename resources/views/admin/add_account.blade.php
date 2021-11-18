@extends('admin_layout')
@section('admin_content')
<div class="col-lg-12">
	<section class="panel">
		<header class="panel-heading">
			Thêm tài khoản
		</header>
		<div class="panel-body" style="display: block;">
			<div class="form">
				<form class="cmxform form-horizontal " id="signupForm" method="post" action="{{URL::to('admin/12/add_account')}}" novalidate="novalidate">
					{{ csrf_field() }}
					<div class="form-group ">
						<label for="username" class="control-label col-lg-3">Tên đăng nhập</label>
						<div class="col-lg-6">
							<input class=" form-control" id="username" name="username" type="text">
						</div>
					</div>
					<div class="form-group ">
						<label for="password" class="control-label col-lg-3">Mật khẩu</label>
						<div class="col-lg-6">
							<input class=" form-control" value="123456" id="password" name="password" type="text" readonly="readonly">
						</div>
					</div>
					<div class="form-group ">
						<label for="agree" class="control-label col-lg-3 col-sm-3">Chọn quyền tài khoản</label>
						<div class="col-lg-6 col-sm-9">
							<select name="position_id">
								<option>Chọn quyền cho tài khoản</option>
								@foreach($arPosition as $arrayPosition)
									@if($arrayPosition->id!=1)
										<option value="{{$arrayPosition->id}}">{{$arrayPosition->title_name}}</option>
									@endif
								@endforeach
							</select>
						</div>
					</div>

					<div class="form-group">
						<div class="col-lg-offset-3 col-lg-6">
							<button class="btn btn-primary" type="submit">Lưu</button>
							<a href="{{URL::to('admin/12/')}}"><button class="btn btn-default" type="button">Hủy</button></a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</section>
</div>
@endsection