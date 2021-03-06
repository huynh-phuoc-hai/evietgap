@extends('layouts.admin')
@section('content')
<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">Chỉnh Sửa Thể Loại</h3>
	</div>
	<div class="panel-body">
	@if(session()->has('thongbao'))
		<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<strong>{{session('thongbao')}}</strong> 
		</div>
	@endif
	@if($errors->all())
		@foreach($errors->all() as $err)
		<div class="alert alert-danger">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<strong>Lỗi!</strong> {{$err}}
		</div>
		@endforeach
	@endif
		<form action="" method="POST" role="form">
			<div class="form-group">
				<label for="">Tên Thể Loại</label>
				<input type="text" class="form-control" name="TenTheLoai" placeholder="Nhập tên thể loại" value="{{$theloai->TenTheLoai}}" required="required">
			</div>
			<div class="form-group">
				<label for="">Thể Loại Cha</label>
				<?php $loaicha = DB::table("cms_theloai")->where([["TheLoaiCha",0],["TrangThai",1]])->get();?>
				<select name="TheLoaiCha" class="form-control" required="required">
					<option value="0">ROOT</option>
					@foreach($loaicha as $tl)
					<option value="{{$tl->MaTheLoai}}" @if($tl->MaTheLoai == $theloai->TheLoaiCha)selected="selected"@endif>- {{$tl->TenTheLoai}}</option>
					@endforeach
				</select>

			</div>
			{{ csrf_field() }}
			<button type="submit" class="btn btn-primary">Chỉnh sửa</button>
			<a href="{{ url('quantrinoidung/theloai')}}" class="btn btn-default" title="Thêm Mới">Trở về</a>
		</form>
	</div>
</div>
@endsection
