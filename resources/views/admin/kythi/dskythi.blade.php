@extends('admin.layout.dashadmin');
@section('title','Quản Lý Kỳ Thi');
@section('main')

<div class="design_cauhoi">
               
                   <a href="themdethi"><button data-toggle="modal" data-target="#modal_form_horizontal2" class="btn btnthem" >Thêm
                   </button></a>
                   <a href="export"><button type="button" class="btn btnthem" >Export</button></a>
                  <a href="import"> <button type="button" class="btn btnthem" >Import</button></a>
					
              
</div>

<div class="panel panel-default">
			                <div class="panel-heading">
			                	<h6 class="panel-title"><i class="fas fa-chalkboard-teacher"></i>DANH SÁCH KỲ THI</h6></div>
			                <div class="datatable">
			                
 <table class="table tbl" style="font-size: 12px">

				                    <thead>
				                        <tr >
											<th>STT</th>
                                                    <th>Tên Kỳ Thi</th>
													<th>Sửa</th>
                                                    <th>Xóa</th>
                                                </tr>
				                        </tr>
				                    </thead>
				                    <tbody>
				                    	@foreach($kythi as $kt )
										<tr>
														<td>{{$kt->id_ky}}</td>
														<td>{{$kt->tenky}}</td>
														
														
														
														<td><a  href="../suamucdo/{{$kt->id_ky}}"><button   class="btn btnsuach" >Sửa</button></a></td>
														<td><a onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" href="../xoamucdo/{{$kt->id_ky}}"><button type="button" class="btn btnxoach" >Xóa</button></a></td>
														<!-- <%=rows.ID_TK%> để dẫn đến đường link lấy ra mã tài khoản, phải tạo một đường dẫn /id ở app.js	 -->
											</tr>
											@endforeach

				                    </tbody>
				                </table>

			                </div>
				        </div>
@stop