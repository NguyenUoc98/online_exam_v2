@extends('admin.layout.master');
@section('title','Quản Lý Loại Câu Hỏi');
@section('main')
		 <div class="design_cauhoi">
				
					<a href="themgiaovien"><button data-toggle="modal"  class="btn btnthem">Thêm</button></a>
					<button type="button" class="btn btnthem" >Import</button>
					<button type="button" class="btn btnthem" >Export</button>
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
							<span class="glyphicon glyphicon-ok icon-oke"></span> {{session('thongbao')}}
						</div>
					@endif

                    <!-- <div class="datatable"> -->
        		<form action="../suapost/{{$loai->id_loaich}}" method="POST" >
        			<input type="hidden" name="_token" value="{{csrf_token()}}">
					<table class="table">
						
						<tr class="tbl">
							<td class="style_row"><i class="fa fa-edit"></i> &nbsp; &nbsp;Tên Loại Câu Hỏi</td>
							<td><input type="text" class="from-control nhaploai" value="{{$loai->tenloai}}" placeholder="  Nhập tên loại câu hỏi" name="tenloai"  onblur="ktra()" id="txtTen"/>
							
							</td>
						</tr>
						
					
						<tr>
							<td class="style_row tbl-row2" colspan="2" >
								<button type="submit" class="btn btnsuach12">Sửa</button>
								<a href="../loaicauhoi/dsloai" ><div class="thoat">Thoát</div></a>
								
							</td>
						</tr>
					</table>
				</form>
             </div>
@stop