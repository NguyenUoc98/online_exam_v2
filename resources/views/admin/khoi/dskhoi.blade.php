@extends('admin.layout.dashadmin');
@section('title','Quản Lý Khối');
@section('main')

<div class="design_cauhoi">
               
                   <a href="themkhoi"><button data-toggle="modal" data-target="#modal_form_horizontal2" class="btn btnthem" >Thêm
                   </button></a>
                   <a href="exportkhoi"><button type="button" class="btn btnthem" >Export</button></a>
                  <a href="importkhoi"> <button type="button" class="btn btnthem" >Import</button></a>
					
              
</div>

<div class="panel panel-default">
			                <div class="panel-heading">
			                	<h6 class="panel-title"><i class="fas fa-chalkboard-teacher"></i>DANH SÁCH KHỐI</h6></div>
			                <div class="datatable">
			                
 <table class="table tbl" style="font-size: 12px">

				                    <thead>
				                        <tr >
											<th>STT</th>
                                                    <th>Tên khối</th>
													<th>Sửa</th>
                                                    <th>Xóa</th>
                                                </tr>
				                        </tr>
				                    </thead>
				                    <tbody>
				                    	<?php 
				                    	$stt= 1;
				                    	 foreach($khoi as $kt ):$stt ?>
										<tr>
											<td>{{ $stt++ }}</td>
														<td>{{$kt->tenkhoi}}</td>
														
														
														
														<td><a  href="../khoi/suakhoi/{{$kt->id_khoi}}"><button   class="btn btnsuach" >Sửa</button></a></td>
														<td><a onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" href="../khoi/xoakhoi/{{$kt->id_khoi}}"><button type="button" class="btn btnxoach" >Xóa</button></a></td>
														<!-- <%=rows.ID_TK%> để dẫn đến đường link lấy ra mã tài khoản, phải tạo một đường dẫn /id ở app.js	 -->
											</tr>
											<?php endforeach ?>

				                    </tbody>
				                </table>

			                </div>
				        </div>
@stop