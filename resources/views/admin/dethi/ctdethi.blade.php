@extends('admin.layout.master');
@section('title','Quản Lý Đề Thi');
<script type="text/javascript" src="../../js/pdf.js"></script>

<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.3.js"></script>
<style>
	.chitietdethi{
		/*border: 1px solid #000;*/
		text-align: center;
		margin-top: 0px;
		margin-bottom: 50px;
		width: 700px;
		font-family: "Times New Roman", Times, serif;
	}
	.head h4, h5{
		font-weight: bold;
		margin-top: 20px;
	}
	.under_gach{
		border-bottom: 1.5px solid #000;
		width: 150px;
		margin-left: 100px;
		margin-top: -5px;
	}

	.under_gach2{
		border-bottom: 1.5px solid #000;
		width: 155px;
		margin-left: 220px;
	}

	.dechinhthuc{
		font-size: 15px;
		text-transform: uppercase;
	}
	.tenkythi{
		text-transform: uppercase;
	}
	.head{
		margin-top: 30px;
	}
	.head i{
		font-size: 15px;
	}
	.made{
		padding: 7px 0 7px 0;
		border: 2px solid #000;
		width: 80px;
		font-weight: bold;
		
	}
	.noidungdethi{
		margin-bottom: 30px;
	}
	.cauhoidethi{
		margin-top: 10px;
	}
	.noidungdethi .tieudecauhoi{
		text-align: left;
		margin-left: -23px;
		font-size: 16px;
	}
	.thongtindethi{
		font-weight: bold;
		font-size: 17px;
		margin-left: -45px;
		margin-top: 50px;
	}
	.noidungchitietcauhoi{
		font-size: 16px;
		margin-left: -108px;
	}
	.tendapan{
		font-weight: bold;
		margin-right: 5px;
	}

	.ketthucdethi{
		font-weight: bold;
		font-size: 16px;
		margin-top: 30px;
	}
	
	.noidungdethi, .head{
		margin-left: 20px;
	}
	.dapantrongch{
		text-align: left;
		font-size: 16px;
	}
	.design_cauhoi a{
		color: #fff;
	}
	.design_cauhoi .btn-primary{
		margin-right: 5px;
	}
	span p{
		display: inline;
	}
	.tieudecauhoi p{
		display: inline;
	}
</style>
@section('main')

<div class="design_cauhoi">
               
                    
                    
                   <a href="../../pdf/{{$dethi->id_de}}"> <button type="button" style="background: #213351" class="btn btn-primary">Export PDF</button></a> 
                   <a href="export"><button type="button" disabled="" class="btn btnthem" >Export</button></a>
                  <a href="import"> <button type="button" disabled="" class="btn btnthem" >Import</button></a>
					
              
</div>


 			<div style="padding-bottom: 25px;text-align:right;margin-top: -20px"></div>
			<div class="container">
			
			<ul class="nav nav-tabs">
			  <li class="active"><a data-toggle="tab" href="#home">Xem chi tiết</a></li>
			  	<li>
			  		@if(count($ctdethi) ==0)
						<a data-toggle="tab" href="#menu1">Tạo chi tiết đề thi</a>
					@endif
				</li>
			 
			</ul>
		  <div>
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
		  </div>
			<div class="tab-content">
			  <div id="home" class="tab-pane fade in active">
				<!-- <h3>Tạo chi tiết đề thi</h3> -->
				<div class="container chitietdethi" id="HTMLtoPDF">
						<div class="row head">
						<div class="row">
								<div class="col-md-1"></div>
							<div class="col-md-4">
								<h4 >SỞ GIÁO DỤC VÀ ĐÀO TẠO</h4><p class="under_gach"></p>
									<h5 class="dechinhthuc">ĐỀ {{$dethi->trangthai}}</h5>
									<i>Ngày thi: {{date('d/m/Y', strtotime($dethi->ngaythi))}}</i>
							</div>
							<div class="col-md-6">
								<h4 class="tenkythi">KỲ THI THPT QUỐC GIA {{$dethi->khoi->tenkhoi}}</h4>
								<h5 class="dechinhthuc">MÔN: {{$dethi->monthi->tenmh}}</h5>
								
								<i>Thời gian làm bài: {{$dethi->thoigianthi}} phút</i>
								<p class="under_gach2"></p>
							</div>
							<div class="col-md-2"></div>
						</div>

						<div class="row">
							<div class="col-md-8 thongtindethi ">Đề thi gồm {{$dethi->socau}} câu (Từ câu hỏi 1 đến câu hỏi {{$dethi->socau}})</div>
							<div class="col-md-2 made">MÃ ĐỀ: {{$dethi->id_de}}</div>
							<div class="col-md-2"></div>
						</div>
						</div>
						<div class="row noidungdethi">
							{{-- duyệt mãng ctđề thi --}}
					@for($i =0; $i<count($ctdethi);$i++)	
						<div class="cauhoidethi">
							<div class="row">
								<div class="col-md-2"></div>
								<div class="col-md-10 tieudecauhoi">
									
				                    	 
										
									<b>Câu {{ $i+1}}:</b> {!!$ctdethi[$i]->noidung!!}
								</div>
							</div>
							<div class="row noidungchitietcauhoi">
								<div class="col-md-2"></div>
								<div class="col-md-2">
									<span class="tendapan">A.</span><span>{!!$ctdethi[$i]->a!!}</span>
								</div>
								<div class="col-md-2">
									<span class="tendapan">B.</span><span>{!!$ctdethi[$i]->b!!}</span>
								</div>
								@if($ctdethi[$i]->id_loaich!=4)
									<div class="col-md-2">
									<span class="tendapan">C.</span><span>{!!$ctdethi[$i]->c!!}</span>
									</div>
									<div class="col-md-2">
										<span class="tendapan">D.</span><span>{!!$ctdethi[$i]->d!!}</span>
									</div>
								@endif
								<div class="col-md-2"></div>
							</div>
							<div class="col-md-2"></div>
							<div class="col-md-10 dapantrongch"> <b>Đáp án: </b>
							 @foreach($dapan as $item)
							{{--  lây ra id_cau hỏi của từng câu so sánh với tất cả các id câu hoi trong dap án --}}
							{{-- nếu trùng id_câu hỏi thì in ra đap an --}}
							    @if($ctdethi[$i]->id_cauhoi == $item->id_cauhoi)
							    {{$item->noidung}}
							    @endif
							 @endforeach 
							</div>
						</div>

					@endfor

						<div class="row ketthucdethi">
							<div class="col-md-12">---------- HẾT ----------</div>
							<div class="col-md-12">Thí sinh không được sử dụng tài liệu. Cán bộ coi thi không giải thích gì thêm.</div>
						</div>
						</div>
					</div>
				</div>
			
			  <div id="menu1" class="tab-pane fade">
				<!-- <h3>Xem chi tiết</h3> -->

								@if(count($ctdethi) ==0)
				<form action="../randomcauhoi" method="post">
					<input type="hidden" name="_token" value="{{csrf_token()}}">
					<input type="hidden" name="idmonhoc" value="{{$dethi->id_mh}}">
					<input type="hidden" name="idkhoi" value="{{$dethi->id_khoi}}">
					<input type="hidden" name="idExam" value="{{$dethi->id_de}}">
					<input type="hidden" name="socauhoi" value="{{$dethi->socau}}">
					<table class="table" style="font-size: 13px">
							
								<tr>
									<td colspan="4"><h6 class="panel-title"><i class="fas fa-chalkboard-teacher"></i><b >Chọn mức độ</b></h6></td>
									
								</tr>
								
								
								{{-- @foreach($mucdo as $md)
								@endforeach --}}
								<tr>
									<td></td><td></td><td></td><td></td>
									
										<td >
											<span id="tenmucdo" style="border: 1px solid #B1A8A8;padding: 7px; font-weight: bold;">Nhận biết</span>
										</td>
									
									
									<td colspan="2">
										<input type="text" class="from-control"  placeholder="  Số câu"  name="socau_md1" style="border-radius: 5px; height: 35px; width: 250px; border: 1px solid #4B4949" /> / {{count($mdnhanbiet)}} câu
										<br>
										
									</td>
									<td></td>
								</tr>
								<tr>
									<td></td><td></td><td></td><td></td>
									
										<td >
											<span id="tenmucdo" style="border: 1px solid #B1A8A8;padding: 7px; font-weight: bold;">Thông hiểu</span>
										</td>
									
									
									<td colspan="2">
										<input type="text" class="from-control"  placeholder="  Số câu"  name="socau_md2" style="border-radius: 5px; height: 35px; width: 250px; border: 1px solid #4B4949" /> / {{count($thonghieu)}} câu
										<br>
										
									</td>
									<td></td>
								</tr>
								<tr>
									<td></td><td></td><td></td><td></td>
									
										<td >
											<span id="tenmucdo" style="border: 1px solid #B1A8A8;padding: 7px; font-weight: bold;">Vận dụng</span>
										</td>
									
									
									<td colspan="2">
										<input type="text" class="from-control"  placeholder="  Số câu"  name="socau_md3" style="border-radius: 5px; height: 35px; width: 250px; border: 1px solid #4B4949" /> / {{count($mdvandung)}} câu
										<br>
										
									</td>
									<td></td>
								</tr>
								
								<tr><td colspan="8"></td></tr>
								{{-- <tr style="font-weight: bold">
									<td></td><td></td><td></td><td></td>
									<td colspan="4">
										<p class="tongso">Số câu hỏi đã chọn / tổng số : &nbsp; <span  style="color: red"><span id="so"></span> / <span id="tongso1">{{$dethi->socau}}</span> câu</span> &nbsp;&nbsp;&nbsp;
										
									</span>
									</td>
								</tr> --}}
						
						</table>
						<div  style="text-align:right;padding-right: 560px; padding-bottom: 20px">
								<button  type="submit" style="	background-color: #213351;color:#fff; " class="btn btn-primary" >Random</button> &nbsp;
								<button type="reset" style="background-color: red; color: #fff;border: 1px solid red" class="btn btn-primary">Thoát</button>
							
						</div>
						{{-- <script>
							$('#random').click(function(e) {
										e.preventDefault(); 
											  // sai rồi. thua
														$.ajax({
															url: '/ctdethi',
															type: 'POST',
															data: (MUCDO)=>{
																let data = {};
																MUCDO.map((e,i) =>{
																	data.e[ID_MUCDO] = $(`#mucdo${i}`).val() 
																})
																return data 
															}, // An object with the key 'submit' and value 'true;
															success: function (result) {
																alert("Bạn đã thêm thành công!");
															
															}
													});
							
									});
											 
						</script> --}}
						</div>
				</form>
				@endif
				
    
			  </div>
			 
			</div>
		  </div>
		<script>
			function HTMLtoPDF(){
var pdf = new jsPDF('p', 'pt', 'letter');
source = $('#HTMLtoPDF')[0];
specialElementHandlers = {
	'#bypassme': function(element, renderer){
		return true
	}
}
margins = {
    top: 50,
    left: 60,
    width: 545
  };
pdf.fromHTML(
  	source // HTML string or DOM elem ref.
  	, margins.left // x coord
  	, margins.top // y coord
  	, {
  		'width': margins.width // max width of content on PDF
  		, 'elementHandlers': specialElementHandlers
  	},
  	function (dispose) {
  	  // dispose: object with X, Y of the last line add to the PDF
  	  //          this allow the insertion of new lines after html
        pdf.save('html2pdf.pdf');
      }
  )		
}
		</script>	              
@stop