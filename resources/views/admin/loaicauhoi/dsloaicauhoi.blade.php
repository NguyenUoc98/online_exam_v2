@extends('admin.layout.master');
@section('title','Quản Lý Loại Câu Hỏi');
@section('main')
		<div class="design_cauhoi">
               
                   <a href="themloai"><button data-toggle="modal" data-target="#modal_form_horizontal2" class="btn btnthem" >Thêm
                   </button></a>
                   <a href="import"> <button type="button" class="btn btnthem">Import</button></a>
                   <a href="export"><button type="button" class="btn btnthem">Export</button></a>
                  
					
              
		</div>

		<div class="panel panel-default">
					                <div class="panel-heading">
					                	<h6 class="panel-title"><i class="fas fa-chalkboard-teacher"></i>QUẢN LÝ LOẠI CÂU HỎI</h6></div>
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
											<th>Tên loại</th>
											<th>Sửa</th>
				                            <th>Xóa</th>
				                        </tr>
				                    </thead>
				                    <tbody>
				                    	<?php 
				                    	$stt= 1;
				                    	 foreach($loai as $loaich ):$stt ?>
										<tr>
											<td>{{ $stt++ }}</td>
											<td id="name" name="name">{{$loaich->tenloai}}</td>
														
											<td><a  href="../sualoai/{{$loaich->id_loaich}}">
													<button data-toggle="modal"  class="btn btnsuach" >Sửa</button>
												</a>
											</td>
											<td><a onclick="return confirm('Bạn có chắc chắn muốn xóa không?')"
												href="xoaloai/{{$loaich->id_loaich}}">
													<button type="button" class="btn btnxoach">Xóa</button>
												</a>
											</td>
														
											</tr>
											<?php endforeach ?>
	                    </tbody>
				                </table>
				             </div>
				         </div>
@stop