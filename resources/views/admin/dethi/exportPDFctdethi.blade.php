<!DOCTYPE html>
<html>
<head>
	<title>EXAMIN</title>

	
	<style>
	.chitietdethi{
		/*border: 1px solid #000;*/
		text-align: center;
		margin-top: 20px;
		margin-bottom: 50px;
		width: 700px;
		/*font-family: "Times New Roman", Times, serif;*/
		border: 1px solid #000;
	}
	.head h4, h5{
		font-weight: bold;
	}
	.under_gach{
		border-bottom: 1.5px solid #000;
		width: 150px;
		margin-left: 30px;
		margin-top: -5px;
	}

	.under_gach2{
		border-bottom: 1.5px solid #000;
		width: 155px;
		margin-left: 130px;
	}
	.coso{
		margin-left: -400px;
	}
	.coso2{
		margin-left: 270px;
		margin-top: -140px;
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
		margin-top: -30px;
		margin-left: 500px;
		
	}
	.noidungdethi{
		margin-bottom: 30px;
	}
	.cauhoidethi{
		margin-top: 10px;
	}
	.noidungdethi .tieudecauhoi{
		text-align: left;
		margin-left: 43px;
		font-size: 16px;
	}
	.thongtindethi{
		font-weight: bold;
		font-size: 17px;
		margin-left: -255px;
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
		margin-left: 45px;
	}
	.noidungchitietcauhoi div{
		display: inline;
		margin-right: 30px;
		margin-top: 10px;
		margin-bottom: 10px;
	}
	span p{
		display: inline;
	}
	.tieudecauhoi p{
		display: inline;
	}
	.classthongtin{
		margin-top: -20px;
	}
</style>
</head>
<body>
	<div class="container-fluid">
		<div class="container chitietdethi" id="HTMLtoPDF">
						<div class="row head">
						<div class="row">
								<div class="col-md-1"></div>
							<div class="col-md-4 coso">
								<h4 class="">SỞ GIÁO DỤC VÀ ĐÀO TẠO</h4><p class="under_gach"></p>
									<h5 class="dechinhthuc">ĐỀ {{$dethi->trangthai}}</h5>
									<i>Ngày thi: {{date('d/m/Y', strtotime($dethi->ngaythi))}}</i>
							</div>
							<div class="col-md-6 coso2">
								<h4 class="tenkythi">KỲ THI THPT QUỐC GIA {{$dethi->khoi->tenkhoi}}</h4>
								<h5 class="dechinhthuc">MÔN: {{$dethi->monthi->tenmh}}</h5>
								
								<i>Thời gian làm bài: {{$dethi->thoigianthi}} phút</i>
								<p class="under_gach2"></p>
							</div>
							<div class="col-md-2"></div>
						</div>

						<div class="row classthongtin">
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
							<div class="col-md-10 dapantrongch"> <b>Answer: </b>
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
							<div class="col-md-12">---------- END ----------</div>
							<div class="col-md-12">Thí sinh không được sử dụng tài liệu. Cán bộ coi thi không giải thích gì thêm.</div>
						</div>
						</div>
					</div>
	</div>
</body>
</html>