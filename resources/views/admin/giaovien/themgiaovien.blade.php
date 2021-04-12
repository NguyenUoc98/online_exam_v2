@extends('admin.layout.dashadmin');
@section('title','Quản Lý Giáo Viên');
@section('main')
		 <div class="design_cauhoi">
				
					<a href="themgiaovien"><button data-toggle="modal" data-target="#modal_form_horizontal2" type="button" style="background: #213351" class="btn btn-primary">Thêm
                   </button></a>
                   <a href="importgiaovien"> <button type="button" style="background: #213351" class="btn btn-primary">Import</button></a>
                   <a href="export"><button type="button" style="background: #213351" class="btn btn-primary">Export</button></a>
			</div>



            <div class="panel panel-default khungbang">
                    <div class="panel-heading"><h6 class="panel-title"><i class="fas fa-chalkboard-teacher"></i><b class="tbl">NHẬP THÔNG TIN GIÁO VIÊN</b></h6></div>
                    @if(count($errors)>0)
						<div class="alert alert-danger">
							@foreach($errors->all() as $err)
								<span class="glyphicon glyphicon-remove icon-remove"></span> {{$err}} <br>
							@endforeach
						</div>
                    @endif

					@if(session('thongbao'))
						<div class="alert alert-success">
							<span class="glyphicon glyphicon-ok icon-oke" ></span> {{session('thongbao')}}
						</div>
					@endif
                    <!-- <div class="datatable"> -->
        		<form action="thempost" method="POST" >
        			<input type="hidden" name="_token" value="{{csrf_token()}}">
					<table class="table">
						
						<tr class="tbl">
							<td class="style_row"><i class="fa fa-edit"></i> &nbsp; &nbsp;Tên Giáo Viên</td>
							<td><input type="text" class="from-control nhaploai" placeholder="  Nhập tên giáo viên" name="tenloai" />
							
							</td>
						</tr>
						<tr class="tbl">
							<td class="style_row"><i class="fa fa-edit"></i> &nbsp; &nbsp;Hình ảnh</td>
							<td><input type="file" class="from-control "  name="hinhanh" />
							
							</td>
						</tr>

						<tr class="tbl">
							<td class="style_row"><i class="fa fa-edit"></i> &nbsp; &nbsp;Địa chỉ</td>
							<td><input type="text" class="from-control nhaploai" placeholder="  Nhập tên giáo viên" name="tenloai" />
							
							</td>
						</tr>

						<tr class="tbl">
							<td class="style_row"><i class="fa fa-edit"></i> &nbsp; &nbsp;Số điện thoại</td>
							<td><input type="text" class="from-control nhaploai" placeholder="  Nhập tên giáo viên" name="tenloai" />
							
							</td>
						</tr>

						<tr class="tbl">
							<td class="style_row"><i class="fa fa-edit"></i> &nbsp; &nbsp;Tên môn dạy</td>
							<td><input type="text" class="from-control nhaploai" placeholder="  Nhập tên môn giảng dạy" name="tenloai" />
							
							</td>
						</tr>
						
					
						<tr>
							<td class="style_row tbl-row" colspan="2" >
								<button type="submit" class="btn  btnsuach">Thêm</button>
								<button type="reset" class="btn  btnxoach" >Thoát</button>
								{{-- <input class="input_sub" type="submit" class="from-control" 
								style="border-radius: 5px; border: 0px;background-color: rgb(66, 115, 228); color: #fff; padding: 10px" name="submit" value="Thêm"/>
								<input class="input_sub" type="submit" class="from-control" name="submit" value="Thoát" style="background-color: red; padding: 10px;border-radius: 5px; border: 0px;"/> --}}
							</td>
						</tr>
					</table>
				</form>
             </div>
@stop