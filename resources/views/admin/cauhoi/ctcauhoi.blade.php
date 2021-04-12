@extends('admin.layout.master');
@section('title','Ngân Hàng Câu Hỏi');
@section('main')
            <div class="panel panel-default khung">
                    <div class="panel-heading"><h6 class="panel-title"><i class="fas fa-chalkboard-teacher"></i><b class="tbl"> THÔNG TIN CÂU HỎI</b></h6></div>
                    <!-- <div class="datatable"> -->
            </div>

			

<div class="container">
			
			<ul class="nav nav-tabs">
			  <li class="active"><a data-toggle="tab" href="#home">Tạo chi tiết câu hỏi</a></li>
			  <li><a data-toggle="tab" href="#menu1">Xem chi tiết</a></li>
			 
			</ul>
		  
			<div class="tab-content">
			  <div id="home" class="tab-pane fade in active">
				<!-- <h3>Tạo chi tiết đề thi</h3> -->
				<form action="../cauhoi/themdapan" method="post" enctype="multipart/form-data">
					<input type="hidden" name="_token" value="{{csrf_token()}}">
					<table class="table" style="font-size: 13px">
							<tr>
								<td colspan="1"></td>
								<td colspan="7"><b>Câu hỏi :</b> {!! $cauhoi->noidung !!}</td>
								
							</tr>
							<tr>
								<td></td>
								<td><b>Đáp án A:</b> {!! $cauhoi->a !!}</td>
								<td><b>Đáp án B:</b> {!! $cauhoi->b !!}</td>
								@if($cauhoi->loaich->id_loaich!=4)
								<td><span id="truefalse"><b>Đáp án C:</b> {!! $cauhoi->c !!}</span></td>
								<td><span id="truefalse2"><b>Đáp án D:</b> {!! $cauhoi->d !!}</span></td>
								<td colspan="2"></td>
								@endif
							</tr>

							<tr>
								<input type="hidden" value="{{$cauhoi->loaich->id_loaich}}" id="loaich">
								<td colspan="1"></td>
								<td colspan="7"><b>Loại câu hỏi : <span style="color: red">{!! $cauhoi->loaich->tenloai !!}</span></b></td>
								
							</tr>
							
								<tr>
									<td colspan="8"><h6 class="panel-title"><i class="fas fa-chalkboard-teacher"></i><b >Đáp án đúng</b></h6></td>
									
								</tr>
								<input type="hidden" value="{{$cauhoi->id_cauhoi}}" name="id_cauhoi">
									
								<tr>
									<td colspan="1"></td>
									@if($cauhoi->loaich->id_loaich==1 || $cauhoi->loaich->id_loaich==3)
									<td >
										<span id="tenmucdo" style="border: 1px solid #B1A8A8;padding: 7px; font-weight:bold;" >A</span> 
										<input type="radio" class="custom-control-input" value="A" name="chon[]"   class="select">
									</td>
									<td >
										<span id="tenmucdo" style="border: 1px solid #B1A8A8;padding: 7px; font-weight:bold;">B</span> 
										<input type="radio" class="custom-control-input" id="" value="B" name="chon[]"   class="select">
									</td>
									<td >
										<span id="truefalse3">
											<span id="tenmucdo" style="border: 1px solid #B1A8A8;padding: 7px; font-weight:bold;">C</span> 
											<input type="radio" class="custom-control-input" id="" value="C" name="chon[]"  class="select">
										</span>
									</td>
									<td >
										<span id="truefalse4">
											<span id="tenmucdo" style="border: 1px solid #B1A8A8;padding: 7px; font-weight:bold;">D</span> 
											<input type="radio" class="custom-control-input" id="" value="D" name="chon[]"  class="select">
										</td>
									@else 
									@if($cauhoi->loaich->id_loaich==4)
									     <td >
										<span id="tenmucdo" style="border: 1px solid #B1A8A8;padding: 7px; font-weight:bold;" >A</span> 
										<input type="radio" class="custom-control-input" value="A" name="chon[]" class="select">
									</td>
									<td >
										<span id="tenmucdo" style="border: 1px solid #B1A8A8;padding: 7px; font-weight:bold;">B</span> 
										<input type="radio" class="custom-control-input" id="" value="B" name="chon[]"   class="select">
									</td>
									@else
									@if($cauhoi->loaich->id_loaich==2)
                                     <td >
										<span id="tenmucdo" style="border: 1px solid #B1A8A8;padding: 7px; font-weight:bold;" >A</span> 
										<input type="checkbox" class="custom-control-input" value="A" name="chon[]"   class="select">
									</td>
									<td >
										<span id="tenmucdo" style="border: 1px solid #B1A8A8;padding: 7px; font-weight:bold;">B</span> 
										<input type="checkbox" class="custom-control-input" id="" value="B" name="chon[]"   class="select">
									</td>
									<td >
										<span id="truefalse3">
											<span id="tenmucdo" style="border: 1px solid #B1A8A8;padding: 7px; font-weight:bold;">C</span> 
											<input type="checkbox" class="custom-control-input" id="" value="C" name="chon[]"  class="select" >
										</span>
									</td>
									<td >
										<span id="truefalse4">
											<span id="tenmucdo" style="border: 1px solid #B1A8A8;padding: 7px; font-weight:bold;">D</span> 
											<input type="checkbox" class="custom-control-input" id="" value="D" name="chon[]"  class="select">
										</td>
										<td colspan="3"></td>
									 @endif
									 @endif
									@endif
									</span>
									
								
								</tr>
								
								
							
						
						</table>
						<br>
						<div  style="text-align:right;padding-right: 560px; margin-bottom: 60px">
								@if(!isset($dapan_tontai[0]) || $dapan_tontai[0]== 'null')
								<button  type="submit" style="	background-color: #213351;color:#fff; " class="btn btn-primary" >Thêm</button>
								<button type="reset" style="background-color: red; color: #fff;border: 1px solid red" class="btn btn-primary">Thoát</button>
								@endif &nbsp;
								
							
						</div>
						
			</div>
	
			
		</form>
			
			  <div id="menu1" class="tab-pane fade">
				<!-- <h3>Xem chi tiết</h3> -->
				
			 	<div class="container">
			 		<div class="row abc">
							<div class="col-md-3"></div>
							<div class="col-md-6" style="margin-top: 40px;margin-bottom: 40px;">
								<table  class="table table-bordered ctbtl" >
			    					
			      
										<tr class="tbl">
											<td class="style_row" id="style" ><i class="fa fa-edit"></i> &nbsp; &nbsp;Tên Loại Câu Hỏi</td>
											<td>{{$cauhoi->loaich->tenloai}}</td>  
										</tr>

										<tr class="tbl">
											<td class="style_row " id="style"><i class="fa fa-edit"></i> &nbsp; &nbsp;Tên Mức độ</td>
											<td>{{$cauhoi->mucdo->tenmd}}</td>
										</tr>
										<tr class="tbl">
											<td class="style_row" id="style"><i class="fa fa-edit"></i> &nbsp; &nbsp;Tên Khối</td>
											<td>{{$cauhoi->khoi->tenkhoi}}</td>
										</tr>
										<tr class="tbl">
											<td class="style_row" id="style"><i class="fa fa-edit"></i> &nbsp; &nbsp;Tên Môn Thi</td>
											<td>{{$cauhoi->monthi->tenmh}}
											
											</td>
										</tr>
										<tr class="tbl">
											<td class="style_row" id="style"><i class="fa fa-edit"></i> &nbsp; &nbsp;Nội Dung</td>
											<td>{!! $cauhoi->noidung !!}
											<div><img src="../../upload/cauhoi/{{$cauhoi->hinhanh}}"  alt=""></div>
											</td>
										</tr>
										<tr class="tbl">
											<td class="style_row" id="style">
												<i class="fa fa-edit"></i> &nbsp; &nbsp;Đáp Án A</td>
											<td>{!! $cauhoi->a !!}
											
											</td>
										</tr>
										<tr class="tbl">
											<td class="style_row" id="style">
												<i class="fa fa-edit"></i> &nbsp; &nbsp;Đáp Án B</td>
											<td>{!! $cauhoi->b !!}
											
											</td>
										</tr>
										@if($cauhoi->loaich->id_loaich!=4)
											<tr class="tbl">
											<td class="style_row" id="style">
												<i class="fa fa-edit"></i> &nbsp; &nbsp;Đáp Án C</td>
											<td>{!! $cauhoi->c !!}
											
											</td>
										</tr>
										<tr class="tbl">
											<td class="style_row" id="style"><i class="fa fa-edit"></i> &nbsp; &nbsp;Đáp Án D</td>
											<td>{!! $cauhoi->d !!}
											
											</td>
										</tr>
										@endif

										<tr class="tbl">
											<td class="style_row" id="style"><i class="fa fa-edit"></i> &nbsp; &nbsp;Đáp Án Đúng</td>
											<td>
												@foreach($dapan as $da )
														<span>
															&nbsp; &nbsp;<span id="dad">{{ $da['noidung'] }}</span> &nbsp; &nbsp;
														</span>
													@endforeach
											</td>
										</tr>


			   			
  								</table>  
							</div>
							<div class="col-md-3"></div>
						</div>

						<div class="row"></div>
			 	</div>
			</div>

	<script>

		
		
	function hienthi(){
			var idloai = document.getElementById('loaich').value;
		
			if(idloai!=4){
				document.getElementById('truefalse2').style.display= 'block';
				document.getElementById('truefalse').style.display= 'block';
				
				// document.getElementById('truefalse3').style.display= 'none';
				// document.getElementById('truefalse4').style.display= 'none';
			}
			
			else if(idloai==4){
				document.getElementById('truefalse').style.display= 'none';
			document.getElementById('truefalse2').style.display= 'none';
				
		}

		hienthi();
	</script>				  
</div>
  
@stop



