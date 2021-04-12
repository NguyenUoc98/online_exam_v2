@extends('admin.layout.dashadmin');
@section('title','Quản Lý Khối');
@section('main')
		 <div class="design_cauhoi">
				
					<a href="themkhoi"><button data-toggle="modal"  class="btn btnthem">Thêm</button></a>
					 <a href="exportkhoi"><button type="button" class="btn btnthem" >Export</button></a>
                  <a href="importkhoi"> <button type="button" class="btn btnthem" >Import</button></a>
			</div>



            <div class="panel panel-default khungbang">
                    <div class="panel-heading"><h6 class="panel-title"><i class="fas fa-chalkboard-teacher"></i><b class="tbl">NHẬP THÔNG TIN KHỐI</b></h6></div>
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
        		<form action="suakhoi/{{$khoi->id_khoi}}" method="POST" >
        			<input type="hidden" name="_token" value="{{csrf_token()}}">
					<table class="table">
						
						<tr class="tbl">
							<td class="style_row"><i class="fa fa-edit"></i> &nbsp; &nbsp;Tên Khối</td>
							<td><input type="text" class="from-control nhaploai" value="{{$khoi->tenkhoi}}" placeholder="  Nhập tên khối" name="tenkhoi"  onblur="ktra()" id="txtTen"/>
							
							</td>
						</tr>
						
					
						<tr>
							<td class="style_row tbl-row2" colspan="2" >
								<button type="submit" class="btn btnsuach12">Sửa</button>
								<a href="../khoi/dskhoi" ><div class="thoat">Thoát</div></a>
								
							</td>
						</tr>
					</table>
				</form>
             </div>
@stop