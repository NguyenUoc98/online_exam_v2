@extends('admin.layout.master');
@section('title','Ngân Hàng Câu Hỏi');
@section('main')

<div class="design_cauhoi">
               
    <a href="themcauhoi">
        <button  class="btn btnthem" >Thêm</button>
    </a>
    <a href="exportPDF"> <button type="button" style="background: #213351" class="btn btn-primary">Export PDF</button></a> 
    <a href="export"><button style="background: #213351" class="btn btn-primary" >Export Excel</button></a>
    <a href="import"> <button style="background: #213351" class="btn btn-primary" >Import Excel</button></a>
					            
</div>



<div class="panel panel-default">
			                <div class="panel-heading">
			                	<h6 class="panel-title"><i class="fas fa-chalkboard-teacher"></i>NGÂN HÀNG CÂU HỎI</h6></div>
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
 <table class="table tbl">

				                    <thead>
				                        <tr >
											<th>STT</th>
											<th>Loại câu hỏi</th>
											<th>Nội dung</th>
											<th>A</th>
				                             <th>B</th>
				                            <th>C</th>
											<th>D</th>
											<th>Chi tiết</th>
				                           <th>Sửa</th>
				                           <th>Xóa</th>
				                        </tr>
				                    </thead>
				                    <tbody>
				                    	<?php 
				                    	$stt= 1;
				                    	 foreach($cauhoi as $ch ):$stt ?>
										<tr>
											<td>{{ $stt++ }}</td>
														<td>{{$ch->tenloai}}</td>
														{{-- <td>{{$ch->mucdo->tenmd}}</td>
														<td>{{$ch->khoi->tenkhoi}}</td>
														<td>{{$ch->monthi->tenmh}}</td> --}}
														<td>{!! $ch->noidung !!}
															<div><img src="../../upload/cauhoi/{{$ch->hinhanh}}"  alt=""></div>
														</td>
														<td>{!! $ch->a !!}</td>
														<td>{!! $ch->b !!}</td>
														<td>{!! $ch->c !!}</td>
														<td>{!! $ch->d !!}</td>
														
														<td><a href="../chitiet/{{$ch->id_cauhoi}}" class="ct">Chi tiết</a></td>
														<td><a  href="../suacauhoi/{{$ch->id_cauhoi}}"><button   class="btn btnsuach" >Sửa</button></a></td>
														<td><a onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" href="xoacauhoi/{{$ch->id_cauhoi}}"><button type="button" class="btn btnxoach" >Xóa</button></a></td>
														<!-- <%=rows.ID_TK%> để dẫn đến đường link lấy ra mã tài khoản, phải tạo một đường dẫn /id ở app.js	 -->
											</tr>
											<?php endforeach ?>

				                    </tbody>
				                </table>

			                </div>
				        </div>
@stop