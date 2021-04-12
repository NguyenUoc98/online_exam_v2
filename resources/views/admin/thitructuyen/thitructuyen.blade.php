<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Thi Trực Tuyến</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">

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
	 		margin-top: 0px;
	 		color: #000;
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
	 		margin-top: 30px;
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
	 	.content1 p{
			display: inline;
		}
		.img_anhcauhoi{
			text-align: center;
			margin-top: -30px;
		}
	 	
	 </style>
</head>

<body>

	<form action="../../ketqua" method="post"  enctype="multipart/form-data">
		<input type="hidden" name="_token()" value="{{csrf_token()}}">
		<div id="quizContainer" class="container giaodienthi">
		<div class="title">KỲ THI {{$dethi->kythi->tenky}}</div>
		<div class="information"><b>Đề: {{$dethi->trangthai}} | <b>Môn: {{$dethi->monthi->tenmh}}</b> | <b>Số câu: {{$dethi->socau}} câu</b> | <b>Thời gian thi: {{$dethi->thoigianthi}} phút</b></b></div>
		<div class="counttime">
			<img src="../../imgs/khung.png"  class="khung_hoa" width="145" height="100" height="" alt="" >
				<p class="gio"><span id="m"  ></span> :
					<span id="s">00</span></p>
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
		
		@foreach($ctdethi as $ct)
			@php  $stt++; @endphp
		<div class="content1">
			<div id="question" class="content">
				<input type="hidden" value="{{$ct->id_cauhoi}}" name="id_cauhoi">
				<input type="hidden" value="{{$ct->id_de}}" name="id_dethi">
				<input type="hidden" value="{{$ct->id_loaich}}" name="id_loai">
				
				{{-- <input type="hidden" value="{{$user}}" name="id_user"> --}}
			{{$stt}} . {!!$ct->noidung!!}
			<div class="img_anhcauhoi"><img src="../../upload/cauhoi/{{$ct->hinhanh}}"  alt="" width="90" height="70"></div>
		</div>

		<label for="" class="option"><input type="radio" name="option" onclick="luudapan()" value="A"><span id="opt">A. {!!$ct->a!!}</span></label>
		<label for="" class="option"><input type="radio" name="option" onclick="luudapan()" value="B"><span id="opt">B. {!!$ct->b!!}</span></label>
		@if($ct->id_loaich!=4)

			<label for="" class="option"><input type="radio" name="option" onclick="luudapan()" value="C"><span id="opt">C. {!!$ct->c!!}</span></label>
			<label for="" class="option"><input type="radio" name="option" onclick="luudapan()" value="D"><span id="opt">D. {!!$ct->d!!}</span></label>
		@endif
		</div>
		
		
		<div class="menu_socau">
			<?php 
				$stt= 0;
				foreach($soluongcau as $sl => $id):$stt++ ?>
				<a href="../thamgiathi/{{$dethi->id_de}}?page={{$stt}}" name="id_CH" class="nutso" value="{{$id}}">
					<p class="socau">{{$stt}}</p></a>
		<?php endforeach ?>

		{{-- @foreach($soluongcau as $sl => $id)
			@for($i=1;$i<=count($soluongcau);$i++)
				<a href="../thamgiathi/{{$dethi->id_de}}?page={{$i}}" class="nutso" value="{{$id}}" ><p class="socau">{{$i}}</p></a>
			@endfor
		@endforeach --}}
			{{-- <p class="phantrang">{!!$ctdethi->links()!!}</p> --}}
		<a href="../../tructuyen/{{$dethi->id_de}}"><button  class="next-btn"  type="button">SUBMIT</button></a>
			@endforeach
	</form>
	
		<script>
			
		var getid = document.getElementsByClassName('id_CH').value;
		 window.onload = function()
		 	{
				  <?php 
				$stt= 0;
				foreach($ctbailam as $ch =>$id_ch):$stt++ ?>
					 if ($ctbailam[$id_ch] == getid[$stt]) {
		               getid[$stt].style.background='red';
		    // {{$ch[1]}}
		            }
				<?php endforeach ?>

		 	};


	function luudapan(){
				// var checkbox = document.getElementsByName("option");
				// for (var i = 0; i < checkbox.length; i++){
    //                 if (checkbox[i].checked === true){
    //                     alert(checkbox[i].value);
    //                 }
    //             }
 			$.ajaxSetup({
			    headers: {
			        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			    }
			});
		    $.ajax({
					url: '../../insertdapan',
					type: 'POST',
					data: {

						'_token': $('input[name=_token]').val(),
						'id_cauhoi': $('input[name=id_cauhoi]').val(),
						'da_chon':$('input[name=option]:checked').val(),
						'id_de': $('input[name=id_dethi]').val(),
						'id_loai': $('input[name=id_loai]').val(),
					}, 
					success: function (data) {
						if((data.errors)){
							alert("Thất bại!");
						}
						// else
						// 	alert("Thành công!");
																	
					}
			});
	}
		

	</script>	
		
</div>
<script type="text/javascript">
	$(document).on('click', '.nutso', function(e){
			e.preventDefault();
			 //console.log($(this).attr('href').split('page=')[1]);
			 var page = $(this).attr('href').split('page=')[1];
			getCtdethi(page);
	});

	$(document).on('click', '.pagination a', function(e){
			e.preventDefault();
			// console.log($(this).attr('href').split('page=')[1]);
			 var page = $(this).attr('href').split('page=')[1];
			getCtdethi(page);
	});

	function getCtdethi(page){

		// console.log('page ' + page);
		
		$.ajax({
			url:'ajax/{{$dethi->id_de}}?page='+page
		}).done(function(data){
			// console.log(data);
			$('.content1').html(data);

			// location.hash= page;
		});
	}
</script>

		
		
	</div>
	

	



	

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