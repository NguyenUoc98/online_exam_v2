@extends('admin.layout.master');
@section('title','Quản Lý Kết Quả');
@section('main')

<script type="text/javascript" src="js/jqueryui/1.10.2/jquery-ui.min.js"></script>
		<div class="design_cauhoi">
               
                   
					<button type="button" style="background: #213351" class="btn btn-primary exportexcel hidden" onclick="dropdown()"> Export Excel <i class="fas fa-sort-down"></i></button>
					<div class="menunguoidung" id="menunguoidung">
								@foreach($kythi as $kt)
									<p><a href="../ketqua/exportKetQua/{{$kt->id_ky}}"><b>Kỳ Thi {{$kt->tenky}}</b> <i class="fas fa-chevron-right"></i></a></p>
								@endforeach
								
							</div>
                   <a href="../ketqua/exportKetQua"> <button type="button" style="background: #213351" class="btn btn-primary">Export Excel</button></a>
                   <a href="../ketqua/exportPDF"><button  style="background: #213351" class="btn btn-primary" >Export PDF</button></a>
              
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
											<th>Mã SV</th>
											<th>Họ và tên</th>
											<th>Giới tính</th>
											<th>Ngày sinh</th>
											<th>Địa chỉ</th>
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
											<td >{{$kq->id_hs}}</td>
											<td>{{$kq->hoten}}</td>
											<td>{{$kq->gioitinh}}</td>
											<td>{{$kq->ngaysinh}}</td>
											<td>{{$kq->diachi}}</td>
											{{-- <td >{{$gv->id_mh}}</td> --}}
											{{-- <td >{{$kq->id_de}}</td>
											<td >{{$kq->socaudung}}</td> --}}
											<td >{{$kq->diem}}</td>
											<td >{{$kq->xeploai}}</span></td>		
												
											</tr>
											<?php endforeach ?>
	                    </tbody>
				                </table>
				             </div>
				         </div>
<style>
	.menunguoidung{
		background: #4F588C;
		color: #000;
		width: 170px;
		height: 155px;
		position: fixed;
		margin-left: 853px;
		margin-top: 235px;
		padding-top: 10px;
		top: 1;
		z-index: 1;
		text-align: left;
		padding-left: 20px;
		
		border: 1px solid #D8D4D4;
		display: none;
	}
	.menunguoidung a{
		color: #fff;

	}
</style>

<script>
	var state=0;
		
	function dropdown(){
		if(state==0){
			document.getElementById("menunguoidung").style.display = 'block';
		state=1;}
		else if(state==1){
			document.getElementById("menunguoidung").style.display = 'none';
		state=0;}
	}
</script>

@stop