<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Thi Trực Tuyến</title>
	<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
<script type="text/javascript" src="{{asset('js/jquery/1.10.1/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>

<link href="{{asset('css/fontawesome/css/all.css')}}" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link href="{{asset('css/lichsubaithi.css')}}" rel="stylesheet" type="text/css">
</head>
<body>
	<div class="container-fluid">
		<div class="scroll">
			<p class="up" onclick="scrollup()"><i class="fas fa-angle-double-up"></i></p>
			<p class="down" onclick="scrolldown()"><i class="fas fa-angle-double-down"></i></p>
		</div>
		<div class="container main_lichsu">
			<div class="header_lichsu">
				@foreach($ctdethi as $ct)
				<p>ĐÁP ÁN BÀI THI</p>
				<h3 style="text-transform: uppercase;"><b>KỲ THI {{$ct->tenky}}</b></h3>
					
					<div class="information"><b>Đề: {{$ct->trangthai}} | <b>Môn: {{$ct->tenmh}}</b> | <b>Số câu: {{$ct->socau}} câu</b> | <b>Thời gian thi: {{$ct->thoigianthi}} phút</b></b></div>
				@endforeach
			</div>

			@php 
			$stt=0;
			if(isset($_GET['page'])){
				$a =$_GET['page'];
			}
			else{
				$a=1;

			}

			$stt= ($a-1);
			@endphp
		@foreach($ctdethi2 as $ct)
			@php  $stt++; @endphp
		<div class="content1">
			<div id="question" class="content">
				<input type="hidden" value="{{$ct->id_cauhoi}}" name="id_cauhoi">
				<input type="hidden" value="{{$ct->id_de}}" name="id_dethi">
				{{-- <input type="hidden" value="{{$user}}" name="id_user"> --}}
				{{$stt}} . {!!$ct->noidung!!}
			</div>

			@if(!isset($dapanchon[$ct->id_cauhoi]) && $dapandung[$ct->id_cauhoi] == 'A') 
				<label  style="background: red" class="option">
					<input type="radio" name="option" value="A"><span id="opt"> A. {!!$ct->a!!}</span>
				</label>
			
			@elseif(isset($dapanchon[$ct->id_cauhoi]) && $dapandung[$ct->id_cauhoi] == 'A' )
				<label  style="background: #00FF5A" class="option">
					<input type="radio" checked="true" name="option"  value="A"><span id="opt"> A. {!!$ct->a!!}</span>
				</label>
			@else
				<label class="option">
					<input type="radio"  name="option"  value="A"><span id="opt"> A. {!!$ct->a!!}</span>
				</label>
			@endif
			
			@if(!isset($dapanchon[$ct->id_cauhoi]) && $dapandung[$ct->id_cauhoi] == 'B') 
				<label style="background: red" class="option">
					<input type="radio" name="option" value="B"><span id="opt"> B. {!!$ct->b!!}</span>
				</label>
			
			@elseif(isset($dapanchon[$ct->id_cauhoi]) && $dapandung[$ct->id_cauhoi] == 'B')
				<label style="background: #00FF5A"  class="option">
					<input type="radio"  name="option" checked="true" value="B"><span id="opt"> B. {!!$ct->b!!}</span>
				</label>
			@else
				<label class="option">
					<input type="radio" name="option" value="B"><span id="opt"> B. {!!$ct->b!!}</span>
				</label>
			@endif
			
			@if($ct->id_loaich!=4)

				@if(!isset($dapanchon[$ct->id_cauhoi]) && $dapandung[$ct->id_cauhoi] == 'C') 
				<label style="background: red" class="option">
					<input type="radio" name="option" value="C"><span id="opt"> C. {!!$ct->c!!}</span>
				</label>
			
			@elseif(isset($dapanchon[$ct->id_cauhoi]) && $dapandung[$ct->id_cauhoi] == 'C')
				<label style="background: #00FF5A"  class="option">
					<input type="radio" name="option"  checked="true" value="C"><span id="opt"> C. {!!$ct->c!!}</span>
				</label>
			@else
				<label class="option">
					<input type="radio" name="option" value="C"><span id="opt"> C. {!!$ct->c!!}</span>
				</label>
			@endif



				@if(!isset($dapanchon[$ct->id_cauhoi])&& $dapandung[$ct->id_cauhoi] == 'D') 
				<label  style="background: red" class="option"><input type="radio" name="option"  value="D"><span id="opt"> D. {!!$ct->d!!}</span></label>
			
			@elseif(isset($dapanchon[$ct->id_cauhoi]) && $dapandung[$ct->id_cauhoi] == 'D')
				<label  style="background: #00FF5A"  class="option">
					<input type="radio" name="option"  checked="true" value="D"><span id="opt"> D. {!!$ct->d!!}</span>
				</label>
			@else
				<label class="option">
					<input type="radio" name="option" value="D"><span id="opt"> D. {!!$ct->d!!}</span>
				</label>
			@endif


			@endif
		</div>


	



		@endforeach




		</div>
		
	</div>
	<script>
		function scrollup(){
			window.scrollBy({
				top:-300,
				left:0,
				behavior: 'smooth'
			});
		}

		function scrolldown(){
			window.scrollBy({
				top:300,
				left:0,
				behavior: 'smooth'
			});
		}
		
	</script>
</body>
</html>