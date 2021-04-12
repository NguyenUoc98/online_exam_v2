@extends('admin.layout.master');
@section('title','Quản Lý Đề Thi');
@section('main')

<div class="design_cauhoi">
               
                   <a href="themdethi"><button data-toggle="modal" data-target="#modal_form_horizontal2" type="button" style="background: #213351" class="btn btn-primary" >Thêm
                   </button></a>
                   <a href="export">
                   	<button type="button" style="background: #213351" class="btn btn-primary">Export</button></a>
                  <a href="import"> <button type="button" style="background: #213351" class="btn btn-primary">Import</button></a>
					
              
</div>

<div class="panel panel-default">
			                <div class="panel-heading">
			                	<h6 class="panel-title"><i class="fas fa-chalkboard-teacher"></i>DANH SÁCH ĐỀ THI</h6></div>
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
												<span class="glyphicon glyphicon-ok icon-oke"></span> {{session('thongbao')}}
											</div>
										@endif
 <table class="table tbl" style="font-size: 12px">

				                    <thead>
				                        <tr >
													<th>STT</th>
                                                   
													 <th>Tên kỳ thi</th>
													 <th>Thời gian thi</th>
													 <th>Ngày thi</th>
													 <th>Tên khối</th>
													 <th>Tên môn</th>
													{{--  <th>Tên giáo viên</th> --}}
													 <th>Số câu</th>
													 <th>Trạng thái</th>
													 <th>Nội dung</th>
                                                    <th>Sửa</th>
                                                   <th>Xóa</th>
                                                </tr>
				                        </tr>
				                    </thead>
				                    <tbody>
				                    	<?php 
				                    	$stt= 1;
				                    	 foreach($dethi as $dt ):$stt ?>
										<tr>
											<td>{{ $stt++ }}</td>
														
														<td>{{$dt->tenky}}</td>
														<td>{{$dt->thoigianthi}} phút</td>
														<td>{{date('d/m/Y', strtotime($dt->ngaythi))}}</td>
														<td>{{$dt->tenkhoi}}</td>
														<td>{{$dt->tenmh}}</td>
														{{-- <td>{{$dt->hoten}}</td> --}}
														<td>{{$dt->socau}} câu</td>
														<td>{{$dt->trangthai}}</td>
														<td><a href="../ctdethi/{{$dt->id_de}}" class="ct">Chi tiết</a></td>
				
														
														<td><a  href="../suadethi/{{$dt->id_de}}"><button   class="btn btnsuach" >Sửa</button></a></td>
														<td><a onclick="return confirm('Bạn có chắc chắn muốn xóa không?')"
															href="xoadethi/{{$dt->id_de}}">
																<button type="button" class="btn btnxoach">Xóa</button>
															</a>
														</td>
														<!-- <%=rows.ID_TK%> để dẫn đến đường link lấy ra mã tài khoản, phải tạo một đường dẫn /id ở app.js	 -->
											</tr>
											<?php endforeach ?>

				                    </tbody>
				                </table>

			                </div>
				        </div>
@stop