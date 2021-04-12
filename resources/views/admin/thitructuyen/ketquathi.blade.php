<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Thi Trực Tuyến</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
<style>
	{
		margin: 0;
		padding: 0;
		
		font-family: sans-serif;
	}
	body{
		/*background-color: #6cf;*/
		background-image: url(../imgs/gbfooter.jpg);
	}

	.title{
		border-bottom: 1px solid #fff;
	}
	.box{
		position: absolute;
		top: 50%;
		left: 50%;
		transform: translate(-50%,-50%);
		width: 400px;
		height: 400px;
		background-color: #0C4461;
		box-sizing: border-box;
		overflow: hidden;
		box-shadow: 0 20px 50px rgba(0,0,0,.5);
		border: 2px solid rgba(0,0,0,.5);
	}
	.box:before{
		content: '';
		position: absolute;
		top: 0;
		left: -100%;
		width: 100%;
		height: 100%;
		background-color: rgba(255,255,255,.1);
		transition: 0.5s;
		pointer-events: none;
	}

	.box:hover:before{
		left: -50px;
		transform:  skewX(-5deg);
	}

	.box .content{
		position: absolute;
		top: 15px;
		left: 15px;
		right: 15px;
		bottom: 15px;
		border: 2px solid #ffeb3b;
		padding: 30px;
		text-align: center;
		box-shadow: 0 5px 10px  rgba(0,0,0,.5);
	}
	
	
	.box .content h1{
		color: #fff;
		font-size: 30px;
		margin: 0 0 10px;
		padding: 0;
	}

	.box .content p{
		color: #fff;
	}

	.box span{
		position: absolute;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		display: block;
		box-sizing: border-box;
	}
	.muctieu1 , .muctieu2,.muctieu3,.muctieu4,.muctieu5{
		color: #fff;
		font-size: 23px;
	}
	.muctieu1{
		/*margin-left: 1330px;*/
		margin-top: -480px;
	}

	.muctieu1{
		position: absolute;
		animation: muctieumot 0.8s forwards;
		animation-delay: 1.2s;
		opacity: 0;
	}

	@-webkit-keyframes muctieumot{
		0%{ right: 0px; opacity: 0;}
		100%{ right: 10px; opacity: 1;}
	}
	.muctieu2{
		/*margin-left: 620px;*/
		margin-top: -410px;
	}

	.muctieu2{
		position: absolute;
		animation: muctieuhai 0.8s forwards;
		animation-delay: 1s;
		opacity: 0;
	}

	@-webkit-keyframes muctieuhai{
		0%{ right: 0px; opacity: 0;}
		100%{ right: 70px; opacity: 1;}
	}
	.muctieu3{
		/*margin-left: 1140px;*/
		margin-top: -300px;
	}

	.muctieu3{
		position: absolute;
		animation: muctieuba 0.6s forwards;
		animation-delay: 0.8s;
		opacity: 0;
	}

	@-webkit-keyframes muctieuba{
		0%{ right: 0px; opacity: 0;}
		100%{ right: 230px; opacity: 1;}
	}

	.muctieu4{
		/*margin-left: 1020px;*/
		margin-top: -200px;
		
	}
	.muctieu4{
		position: absolute;
		animation: muctieubon 0.6s forwards;
		animation-delay: 0.6s;
		opacity: 0;
	}

	@-webkit-keyframes muctieubon{
		0%{ right: 0px; opacity: 0;}
		100%{ right: 310px; opacity: 1;}
	}

	.muctieu5{
		/*margin-left: 980px;*/
		margin-top: -70px;
	}

	.muctieu5{
	position: absolute;
	animation: phaisang 0.8s forwards;
	animation-delay: 0.4s;
	opacity: 0;
}
	@-webkit-keyframes phaisang{
		0%{ right: 0px; opacity: 0;}
		100%{ right: 340px; opacity: 1;}
	}

	
	.box span:nth-child(1){
		transform: rotate(0deg);
	}

	.box span:nth-child(2){
		transform: rotate(90deg);
	}

	.box span:nth-child(3){
		transform: rotate(180deg);
	}

	.box span:nth-child(4){
		transform: rotate(270deg);
	}

	.box span:nth-child(2):before{
		animation-delay: -2s;
	}

	.box span:nth-child(4):before{
		animation-delay: -2s;
	}
	.direction{
		margin-left: 900px;
		margin-top: -560px;
	}
	
	.login{
		color: #000;
		background-color: #ffb606;
		width: 150px;
		padding-left: 30px;
		padding-top: 10px;
		height: 30px;
		font-weight: bold;
		border-radius: 5px;
		margin-left: 660px;
		margin-top: 600px;
	}
	
	a{
		text-decoration: none;

	}

	.box span:before{
		content: '';
		position: absolute;
		width: 100%;
		height: 2px;
		background-color: #00ccff;
		animation: animate 4s linear infinite;
	}

	@keyframes animate{
		0%{
			transform: scaleX(0);
			transform-origin: left;
		}

		50%{
			transform: scaleX(1);
			transform-origin: left;
		}

		50.1%{
			transform: scaleX(1);
			transform-origin: right;
		}

		100%{
			transform: scaleX(0);
			transform-origin: right;
		}
	}
</style>
</head>
<body>
	<input type="hidden" name="_token" value="{{csrf_token()}}">
	<input type="hidden" value="{{$email}}" name="email">
	<div class="box">
		<span>	</span>
		<span>	</span>
		<span>	</span>
		<span>	</span>
		<div class="content">
			<h1 class="title">KẾT QUẢ BÀI THI</h1>
			@foreach($ctde as $ct)
			<p>Thí sinh: {{Auth::user()->name}}</p>
			<p>Kỳ Thi: {{$ct->tenky}}</p>
			<p>Môn Thi: {{$ct->tenmh}}</p>
			<p>Điểm: {{$lamtrondiem}} điểm</p>
			<p>Số câu đúng: {{$dung}}/{{$ct->socau}} câu</p>
			<p>Hoàn thành: {{$lamtrontyle}}/100%</p>
			<p>Thời Gian Thi: {{$ct->thoigianthi}} phút</p>
			<p>

				@if($lamtrondiem <=5)
					" Cần cố gắng hơn nữa!! "
			
				@elseif($lamtrondiem >5 && $lamtrondiem <8)
						" Cần cố gắng! "
				@elseif($lamtrondiem >=8)
					" Làm tốt lắm !!! "
					@endif
		</p>
			
		</div>
	</div>
	<a href="../lichsuthi/{{$ct->id_de}}"><div class="login" > Lịch Sử Bài Làm</div></a>
	@endforeach
	<p class="direction"><img src="../imgs/banner/direction.png" alt="" width="508" height="630"></p>
	<p class="muctieu1">You can do it!</p>
	<p class="muctieu2">Finish your goal!</p>
	<p class="muctieu3">Try more!</p>
	<p class="muctieu4">You did well!</p>
	<p class="muctieu5">Good luck to you!</p>
</body>
<script>
			
			
	// function thongbaoEmail(){
				
 // 			$.ajaxSetup({
	// 		    headers: {
	// 		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	// 		    }
	// 		});
	// 	    $.ajax({
	// 				url: '../../sendmail_ketqua',
	// 				type: 'POST',
	// 				data: {

						
	// 					'email': 'ngocthaohehe@gmail.com',
						
	// 				}, 
	// 				success: function (data) {
	// 					if((data.errors)){
	// 						alert("Thất bại!");
	// 					}
	// 					// else
	// 					// 	alert("Thành công!");
																	
	// 				}
	// 		});
	// }
		

	</script>	
</html>