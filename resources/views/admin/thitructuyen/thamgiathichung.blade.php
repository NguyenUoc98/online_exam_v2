<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Thi Trực Tuyến</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	  <style>
	 	body{
	 		font-family: 'Roboto Slab', serif;
	 		background-color: #6cf;
	 	}
	 	.giaodienthi{
	 		height: 460px;
	 		width: 1000px;
	 		position: absolute;
	 		top: 380px;
	 		left: 50%;
	 		transform: translateX(-50%) translateY(-50%);
	 		background: rgba(255,255,255,0.5);
	 		padding: 20px;
	 		border: 1px solid #08038C;
	 		box-shadow: 0 0 8px 3px #fff;
	 	}
	 	.title{
	 		padding-top: 20px;
	 		text-align: center;
	 		font-size: 29px;
	 		text-transform: uppercase;
	 		color: #08038C;
	 	}
	 	#question{
	 		padding: 20px;
	 		font-size: 22px;
	 		background-color: #08038C;
	 		border-radius: 20px;
	 		margin: 10px 0 10px 0;
	 		color: #f6f6f6;
	 	}
	 	.option{
	 		width: 467px;
	 		display: inline-block;
	 		padding: 10px 0px 10px 15px;
	 		vertical-align: middle;
	 		background: rgba(255,255,255,0.5);
	 		margin: 10px 0px 10px 10px;
	 		color: #000000;
	 		border-radius: 20px;
	 	}
	 	.option:hover{
	 		background: #08038C;
	 		color: #f6f6f6;
	 	}
	 	.next-btn{
	 		border:none;
	 		outline: none;
	 		background: rgba(255,25,255,0.5);
	 		width: 100px;
	 		height: 35px;
	 		border-radius: 20px;
	 		cursor: pointer;
	 		float: right;
	 		margin-right: -160px;
	 		margin-top: -70px;
	 	}
	 	.phantrang{
	 		text-align: right;
	 	}
	 	.panigation li span{
	 		background: rgba(255,25,255,0.5);
	 	}
	 	.next-btn:hover{
	 		background: #08038C;
	 		color: #f6f6f6;
	 	}
	 	.result{
	 		height: 100px;
	 		text-align: center;
	 		font-size: 75px;
	 	}
	 	.option input:checked .option{
	 		background: #08038C;
	 		color: #000;
	 	}
	 	.information{
	 		text-align: center;
	 		margin-top: 5px;
	 	}
	 	.counttime{
	 		width: 140px;
	 		height: 100px;
	 		margin-left: 800px;
	 		margin-top: -80px;
	 	
	 	}
	 	
	 	.gio{
	 		margin-top: -65px;
	 		margin-left: 40px;
	 		font-size: 20px;
	 		color: #08038C;
	 		font-weight: bold;
	 	}
	 	.btnsubmitbaithi{
	 		height: 30px;
	 		margin-top: 10px;
	 		padding-top: 7px;
	 		padding-left: 7px;
	 	}
	 	.menu_socau{
	 		margin-top: 15px;
	 		margin-left: 20px;
	 		width: 754px;
	 		height: 100px;


	 	}
	 	.socau{
	 		text-align: center;
			float: left;
			margin-bottom: 10px;
	 		border: 1px solid #8D94F5;
	 		margin-left: 7px;
	 		width: 28px;
	 		height: 28px;
	 		line-height: 28px;
	 		border-radius: 50%;
	 		background: rgba(255,255,255,0.5);
	 		color: #000;
	 		font-weight: bold
		}
		.socau:hover{
	 		background: #08038C;
	 		color: #f6f6f6;
	 	}

	 	.menu_socau ul li{
	 		list-style: none;
	display: inline;
	 	}
	 </style>
</head>
<body>
	<form action=""  enctype="multipart/form-data">
		<input type="hidden" name="_token()" value="{{csrf_token()}}">
		<div id="quizContainer" class="container giaodienthi">
		<div class="title">KỲ THI {{$dethi->kythi->tenky}}</div>
		<div class="information"><b>Đề: {{$dethi->trangthai}} | <b>Môn: {{$dethi->monthi->tenmh}}</b> | <b>Số câu: {{$dethi->socau}} câu</b> | <b>Thời gian thi: {{$dethi->thoigianthi}} phút</b></b></div>
		<div class="counttime">
			<img src="../../imgs/khung.png"  class="khung_hoa" width="145" height="100" height="" alt="" >
				<p class="gio"><span id="m"  ></span> :
					<span id="s">00</span></p>
		</div>
		@foreach($ctdethi as $ct)
		<div id="question" class="content">
			1. {{$ct->noidung}}
		</div>
		<label for="" class="option"><input type="radio" name="option" value="1"><span id="opt1">A. {{$ct->a}}</span></label>
		<label for="" class="option"><input type="radio" name="option" value="2"><span id="opt2">B. {{$ct->b}}</span></label>
		<label for="" class="option"><input type="radio" name="option" value="3"><span id="opt3">C. {{$ct->c}}</span></label>
		<label for="" class="option"><input type="radio" name="option" value="4"><span id="opt4">D. {{$ct->d}}</span></label>
		@endforeach
		{{-- {!!$ctdethi->links()!!} --}}
		<div class="menu_socau">
				
			{{-- 
			<a href=""><p class="socau">1</p></a>
			<a href=""><p class="socau">1</p></a> --}}
			<p class="phantrang">{!!$ctdethi->links()!!}</p>
		<button  class="next-btn" >Submit</button>
			
		<ul>
			<li></li>

		</ul>
			
		</div>
<script type="text/javascript">
	$(document).on('click', 'a', function(e){
			e.preventDefault();
			var page = $(this).attr('href').split('page=')[1];
			getCtdethi(page);
	});

	function getCtdethi(page){
		$ajax({
			url:'dethi/thamgiathi/{id}?page='+page
		}).done(function(data){
			$('.content').html(data);
		});
	}
</script>

		
		{{-- <div id="nextButton" onclick="loadNextQuestion();" class="next-btn btnsubmitbaithi">Submit</div> --}}
	</div>
	</form>
	
	



	

<script language="javascript">
 	var m = "{{$dethi->thoigianthi}}";
					
	var s = 00; // Giây
	var timeout = null; // Timeout
				 
	function stop(){
			clearTimeout(timeout);
	}
	function start()
	{
					 
	if (s === -1){
				m -= 1;
				s = 59;
		}
					
	if (m == -1){
		clearTimeout(timeout);
		// alert('Hết giờ');
		window.location.assign("http://localhost:1412/thitructuyen/public/ketqua"); 
							
		return false;
	}
				 
	document.getElementById('m').innerText = m.toString();
	document.getElementById('s').innerText = s.toString();
				 
						
	timeout = setTimeout(function(){
					s--;
					start();
			}, 1000);
	}
	start();
				
	</script>
</body>
</html>