@extends('admin.layout.master');
@section('title','Quản Lý Mức Độ');
@section('main')
<style>
	.nhaploaimodel{
	border-radius: 5px;
	 border: 1px solid rgb(177, 175, 175); 
	 height: 40px; 
	 width: 400px;
}
.modal-body{
	margin-left: 30px;
	margin-top: 20px;
}
.modal-dialog{
	top: 200px;
}
</style>
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="design_cauhoi">
               
                   {{-- <a href="themdethi"> --}}
                   		<button data-toggle="modal" data-target="#them" style="background: #213351" class="btn btn-primary">Thêm</button>
                   {{-- </a> --}}
                   <a href="exportmd"><button style="background: #213351" class="btn btn-primary">Export</button></a>
                  <a href="importmd"> <button style="background: #213351" class="btn btn-primary">Import</button></a>
					
              
</div>

  <!-- Modal -->
  <div class="modal fade" id="them" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <form method="POST" action="themmd" >
      		<input type="hidden" name="_token" value="{{csrf_token()}}">
      		<div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal">&times;</button>
	          <h4 class="modal-title">NHẬP THÔNG TIN MỨC ĐỘ </h4>
	        </div>
	        <div class="modal-body">
	          <p><i class="fa fa-edit"></i> &nbsp; &nbsp;<b>Tên Mức Độ</b></p>
	          <p><input type="text" class="from-control nhaploaimodel" required="required" width="400" placeholder="  Nhập tên mức độ" name="tenmucdo" /></p>
	        </div>
	        <div class="modal-footer">
	        	<button type="submit" class="btn btn-primary" >Thêm</button>
	          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        </div>
	      </div>
      </form>
      
    </div>
  </div>

<div class="panel panel-default">
			                <div class="panel-heading">
			                	<h6 class="panel-title"><i class="fas fa-chalkboard-teacher"></i>DANH SÁCH MỨC ĐỘ</h6></div>
			                <div class="datatable">
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
 <table class="table tbl" style="font-size: 12px">

				                    <thead>
				                        <tr >
											<th>STT</th>
                                                    <th>Tên mức độ</th>
													<th>Sửa</th>
                                                    <th>Xóa</th>
                                                </tr>
				                        </tr>
				                    </thead>
				                    <tbody>
				                    	<?php 
				                    	$stt= 1;
				                    	 foreach($mucdo as $md ):$stt ?>
										<tr>
											<td>{{ $stt++ }}</td>
											<td style="display: none">{{$md->id_mucdo}}</td>
														<td>{{$md->tenmd}}</td>
														
														
														
														<td><button  class="btn btnsuach"  >Sửa</button></td>
														<td><a onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" href="../mucdo/xoamucdo/{{$md->id_mucdo}}"><button type="button" class="btn btnxoach" >Xóa</button></a></td>
														<!-- <%=rows.ID_TK%> để dẫn đến đường link lấy ra mã tài khoản, phải tạo một đường dẫn /id ở app.js	 -->
											</tr>
											<?php endforeach ?>

				                    </tbody>
				                </table>

			                </div>
				        </div>

 <div class="modal fade" id="modal-edit" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <form method="POST" id="form-edit" role="form" >

      		<input type="hidden" name="_token" value="{{csrf_token()}}">
      		
      		<div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal">&times;</button>
	          <h4 class="modal-title">NHẬP THÔNG TIN MỨC ĐỘ </h4>
	        </div>
	        <div class="modal-body">
	        		{{-- {{method_field('PUT')}} --}}
	          <p><i class="fa fa-edit"></i> &nbsp; &nbsp;<b>Tên Mức Độ</b></p>
	          <input type="hidden" name="idmd" id="idmucdo">
	          <p><input type="text" class="from-control nhaploaimodel" id="tenmucdo" width="400" placeholder="  Nhập tên mức độ" name="tenmd" /></p>
	        </div>
	        <div class="modal-footer">
	        	<button type="submit" id="btnsuamd"  class="btn btn-primary" >Sửa</button>
	          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        </div>
	      </div>
      </form>
      
    </div>
  </div>
  
<script src="{{asset('js/jquery/3.3.1/jquery.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>

  <script type="text/javascript" charset="utf-8">
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
		</script>
		<script>

			$(document).ready(function () {
				$('.btnsuach').click(function(e){
					// var url = $(this).attr('data-url');
					$('#modal-edit').modal('show');
					$tr = $(this).closest('tr');
					var data = $tr.children('td').map(function(){
						return $(this).text();

					}).get();
					
					$('#idmucdo').val(data[1]);
					$('#tenmucdo').val(data[2]); //lấy tên md
				});
			$('#btnsuamd').click(function(e){
					e.preventDefault();
					var id = $('#idmucdo').val();

					$.ajax({
						type: 'POST',
						url: '../suamucdo/'+ id,
						data: {
							'_token': $('input[name=_token]').val(),
							'tenmd': $('input[name=tenmd]').val(),
							
						},
						success: function(data) {
							window.location.assign("http://localhost:1412/thitructuyen/public/giaovien/mucdo/dsmucdo"); 
							
						}
					});
				});
			})

			
		</script>
@stop