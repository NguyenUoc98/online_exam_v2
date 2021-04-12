@extends('admin.layout.dashadmin');
@section('title','Quản Lý Kết Quả');
@section('main')
		<div class="design_cauhoi">
               
                   
                   <a href="admin/exportKetQua"> <button type="button" style="background: #213351" class="btn btn-primary">Export Excel</button></a>
                   <a href="admin/ketqua/exportPDF"><button  style="background: #213351" class="btn btn-primary" >Export PDF</button></a>
					
              
		</div>

		<div class="panel panel-default">
					                <div class="panel-heading">
					                	<h6 class="panel-title"><i class="fas fa-chalkboard-teacher"></i>QUẢN LÝ KẾT QUẢ THI</h6></div>
					                <div class="datatable">
					                	@if(session('thongbao'))
											<div class="alert alert-success">
												<span class="glyphicon glyphicon-ok icon-oke"></span> {{session('thongbao')}}
											</div>
										@endif
		 <table class="table tbl" >
				                    <thead>
				                        <tr >
											<th>STT</th>
											<th>Họ tên</th>
											<th>Kỳ thi</th>
											<th>Tên môn</th>
											{{-- <th>Mã đề thi</th>
											<th>Số câu đúng</th> --}}
											<th>Điểm</th>
											<th>Xếp loại</th>
											
				                        </tr>
				                    </thead>
				                    <tbody>
				                    	<?php 
				                    	$stt= 1;
				                    	 foreach($ketqua as $kq ):$stt ?>
										<tr>
											<td>{{ $stt++ }}</td>
											<td >{{$kq->hoten}}</td>
											<td>{{$kq->tenky}}</td>
											<td>{{$kq->tenmh}}</td>
											{{-- <td >{{$gv->id_mh}}</td> --}}
											{{-- <td >{{$kq->id_de}}</td>
											<td >{{$kq->socaudung}}</td> --}}
											<td >{{$kq->diem}}</td>
											<td >{{$xeploai}}</td>		
												
											</tr>
											<?php endforeach ?>
	                    </tbody>
				                </table>
				             </div>
				         </div>
@stop