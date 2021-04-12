@extends('admin.layout.master');
@section('title','Quản Lý Loại Câu Hỏi');
@section('main')
		 <div class="design_cauhoi">
				
					<a href="themgiaovien"><button data-toggle="modal"  class="btn btnthem" >Thêm</button></a>
					<a href="import"> <button type="button" class="btn btnthem" >Import</button></a>
					<a href="export"> <button type="button" class="btn btnthem" >Export</button></a>
			</div>



            <div class="panel panel-default khungbang">
                    <div class="panel-heading"><h6 class="panel-title"><i class="fas fa-chalkboard-teacher"></i><b class="tbl">NHẬP THÔNG TIN LOẠI CÂU HỎI</b></h6></div>
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
							<td class="style_row"><i class="fa fa-edit"></i> &nbsp; &nbsp;Tên Loại Câu Hỏi</td>
							<td><input type="text" class="from-control nhaploai" placeholder="  Nhập tên loại câu hỏi" name="tenloai" />
							
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