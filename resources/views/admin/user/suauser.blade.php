@extends('admin.layout.dashadmin');
@section('title','Quản Lý Người Dùng');
@section('main')
		 <div class="design_cauhoi">
				
					<a href="themuser"><button data-toggle="modal"  class="btn btnthem" >Thêm</button></a>
					<button type="button" class="btn btnthem" >Import</button>
					<button type="button" class="btn btnthem" >Export</button>
			</div>



            <div class="panel panel-default khungbang">
                    <div class="panel-heading"><h6 class="panel-title"><i class="fas fa-chalkboard-teacher"></i><b class="tbl">NHẬP THÔNG TIN NGƯỜI DÙNG</b></h6></div>
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
                    	<form action="admin/suauser/{{$user->id}}" method="POST" enctype="multipart/form-data">
        			<input type="hidden" name="_token" value="{{csrf_token()}}">
					<table class="table">
						
						<tr class="tbl">
							<td class="style_row"><i class="fa fa-edit"></i> &nbsp; &nbsp;Tên Người Dùng</td>
							<td><input type="text" value="{{$user->name}}" required="" class="from-control nhaploai" placeholder="  Nhập tên người dùng" name="tenuser" />
							
							</td>
						</tr>

						<tr class="tbl">
							<td class="style_row"><i class="fa fa-edit"></i> &nbsp; &nbsp;Email</td>
							<td><input type="email" value="{{$user->email}}" disabled="" required="" class="from-control nhaploai" placeholder="  Nhập email" name="email" />
							
							</td>
						</tr>

						<tr class="tbl">
							<td class="style_row"><i class="fa fa-edit"></i> &nbsp; &nbsp;Mật Khẩu</td>
							<td><input type="password" value="{{$user->password}}"  required="" class="from-control nhaploai" placeholder="  Nhập password" name="password"/>
							
							</td>
						</tr>

						<tr class="tbl">
							<td class="style_row"><i class="fa fa-edit"></i> &nbsp; &nbsp;Quyền</td>
							<td>
								<select name="quyen" id="tenloaich" class="form-control nhaploai">
									
											@if($user->quyen == '0')
												<option selected="true" value="$user->quyen">Học sinh</option>
												<option  value="1" >Giáo viên</option>
												<option  value="2" >Admin</option>
											@elseif($user->quyen == '1')
											<option selected="true" value="$user->quyen">Giáo viên</option>
												<option  value="0" >Học sinh</option>
												<option  value="2" >Admin</option>
												@elseif($user->quyen == '2')
											<option selected="true" value="$user->quyen">Admin</option>
												<option  value="0" >Học sinh</option>
												<option  value="1" >Giáo viên</option>
											@endif 
	                              
                       			 </select>
							</td>
						</tr>
						
					
						<tr>
							<td class="style_row tbl-row" colspan="2" >
								<button  class="btn btnsuach" type="submit">Sửa</button>
								<button type="reset" class="btn  btnxoach" >Thoát</button>
								
							</td>
						</tr>
					</table>
				</form>

        		
             </div>
@stop