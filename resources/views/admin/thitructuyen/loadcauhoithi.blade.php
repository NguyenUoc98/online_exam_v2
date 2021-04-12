<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	
</head>
<body>
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
			{{$stt}} . {!!$ct->noidung!!}
			{{-- <div class="img_anhcauhoi"><img src="../../upload/cauhoi/{{$ct->hinhanh}}"  alt="" width="90" height="70"></div> --}}
		</div>
		<label for="" class="option"><input type="radio" name="option" onclick="luudapan()" value="A"><span id="opt">A. {!!$ct->a!!}</span></label>
		<label for="" class="option"><input type="radio" name="option" onclick="luudapan()" value="B"><span id="opt">B. {!!$ct->b!!}</span></label>
		@if($ct->id_loaich!=4)

			<label for="" class="option"><input type="radio" name="option" onclick="luudapan()" value="C"><span id="opt">C. {!!$ct->c!!}</span></label>
			<label for="" class="option"><input type="radio" name="option" onclick="luudapan()" value="D"><span id="opt">D. {!!$ct->d!!}</span></label>
		@endif
		</div>
		@endforeach
<script>
			
	function luudapan(){
				// var checkbox = document.getElementsByName("option");
				// for (var i = 0; i < checkbox.length; i++){
    //                 if (checkbox[i].checked === true){
    //                     alert(checkbox[i].value);
    //                 }
    //             }
     // e.preventDefault();
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
</body>
</html>
		