@extends('admin.layout.master');
@section('title','Quản Lý Đề Thi');
@section('main')
		 <div class="design_cauhoi">
				
					<a href="themgiaovien"><button type="button" style="background: #213351" class="btn btn-primary">Thêm</button></a>
					<button type="button" style="background: #213351" class="btn btn-primary" >Import</button>
					
			</div>



            <div class="panel panel-default khungbang">
                    <div class="panel-heading"><h6 class="panel-title"><i class="fas fa-chalkboard-teacher"></i><b class="tbl">NHẬP THÔNG TIN ĐỀ THI</b></h6></div>
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
        		<form action="../suadethi/{{$dethi->id_de}}" method="POST" >
        			<input type="hidden" name="_token" value="{{csrf_token()}}">
					<table class="table">
						
						<tr class="tbl">
							<td class="style_row"><i class="fa fa-edit"></i> &nbsp; &nbsp;Tên Kỳ Thi</td>
							<td>
								<select name="tenkythi" id="tenloaich" class="form-control nhaploai">
							
	                                @foreach($kythi as $kt)
										<option 
										@if($dethi->id_ky == $kt->id_ky)
											{{"selected"}}
										@endif
										  value="{{$kt->id_ky}}">{{$kt->tenky}}</option>
	                                @endforeach

                       			 </select>
							
							</td>
						</tr>

						<tr class="tbl">
							<td class="style_row"><i class="fa fa-edit"></i> &nbsp; &nbsp;Tên Khối</td>
							<td>
								<select name="namekhoi" id="tenloaich" class="form-control nhaploai">
							
	                                @foreach($khoi as $tk)
										<option 
											@if($dethi->id_khoi == $tk->id_khoi)
												{{"selected"}}
											@endif
										  	value="{{$tk->id_khoi}}">{{$tk->tenkhoi}}</option>
	                                @endforeach

                       			 </select>
							
							</td>
						</tr>

						<tr class="tbl">
							<td class="style_row"><i class="fa fa-edit"></i> &nbsp; &nbsp;Tên Môn Thi</td>
							<td>
								<select name="namemonthi" id="tenloaich" class="form-control nhaploai">
							
	                                @foreach($monthi as $mt)
										<option 
										@if($dethi->id_mh == $mt->id_mh)
											{{"selected"}}
										@endif 
										value="{{$mt->id_mh}}">{{$mt->tenmh}}</option>
	                                @endforeach

                       			 </select>
							
							</td>
						</tr>

						<tr class="tbl">
							<td class="style_row"><i class="fa fa-edit"></i> &nbsp; &nbsp;Tên Giáo Viên</td>
							<td>
								<select name="namegv" id="tenloaich" class="from-control nhaploai">
							
	                                @foreach($giaovien as $gv)
										<option 
											@if($dethi->id_gv == $gv->id_gv)
												{{"selected"}}
											@endif 
											  value="{{$gv->id_gv}}">{{$gv->hoten}}</option>
	                                @endforeach

                       			 </select>
							
							</td>
						</tr>
						
						<tr class="tbl">
							<td class="style_row"><i class="fa fa-edit"></i> &nbsp; &nbsp;Ngày Thi</td>
							<td>
								<input type="date" class="from-control nhaploai"  value="{{$dethi->ngaythi}}"  placeholder="  Nhập ngày thi" name="ngaythi"  id="txtTen"/>
							
							</td>
						</tr>


						<tr class="tbl">
							<td class="style_row"><i class="fa fa-edit"></i> &nbsp; &nbsp;Thời Gian Thi</td>
							<td>
								<input type="text" class="from-control nhaploai" value="{{$dethi->thoigianthi}}" placeholder="   Nhập thời gian thi" name="thoigianthi"  id="txtTen"/>
							
							</td>
						</tr>


						<tr class="tbl">
							<td class="style_row"><i class="fa fa-edit"></i> &nbsp; &nbsp;Số câu</td>
							<td>
								<input type="text" class="from-control nhaploai" value="{{$dethi->socau}}" placeholder="  Nhập số câu" name="socau"  id="txtTen"/>
							
							</td>
						</tr>

						<tr class="tbl">
							<td class="style_row"><i class="fa fa-edit"></i> &nbsp; &nbsp;Trạng Thái</td>
							<td>
								<select name="trangthai" id="tenloaich" class="from-control nhaploai">
									
										 
											@if($dethi->trangthai == 'Thi thử')
												<option selected="true" value="{{$dethi->trangthai}}">{{$dethi->trangthai}}</option>
												<option  value="Thi chính thức" >Thi chính thức</option>
											@elseif($dethi->trangthai == 'Thi chính thức')
											<option selected="true" value="{{$dethi->trangthai}}">{{$dethi->trangthai}}</option>
												<option  value="Thi thử" >Thi thử</option>
											@endif 
											  
	                                	

	                                	

	                                {{-- <option  value="Thi thử" >Thi thử</option>
	                                <option  value="Thi chính thức" >Thi chính thức</option>
 --}}
                       			 </select>
							
							</td>
						</tr>
						
					
						<tr>
							<td class="style_row tbl-row" colspan="2" >
								<button type="submit" class="btn  btnsuach">Sửa</button>
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