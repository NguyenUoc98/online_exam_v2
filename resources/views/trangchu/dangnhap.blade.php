<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Thi Trực Tuyến</title>
	<link rel="stylesheet" href="../public/css/test.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
</head>
<body>
	<div class="menu">
		<div class="name"> <a href="trangchu"><img src="https://upload.wikimedia.org/wikipedia/commons/a/a3/Emblem_of_Vietnam.svg" alt=""> <!-- <i class="fas fa-graduation-cap"></i> -->Hệ thống thi trắc nghiệm trường THPT Nam Khoái Châu</a></div>
	</div>
	<div class="div">
		<img src="../public/imgs/totnghiep.png" alt="" class="imgtotnghiep">
	</div>
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

	<div class="than4">
		
		<div class=" khung4">
			<div class="col-md-12 title">
				Đăng nhập
			</div>

			<div class="col-md-12 ic">
				@if(count($errors)>0)
					<p>{{ $errors}}</p>
				@endif
				<br>
				@if($message = Session::get('success'))
				<input type="button" class="btn btn=primary" value="{{ $message }}">
				@endif
				<div class="signin">
					<form action="sendmail" method="post" enctype="multipart/form-data">
						<input type="hidden" name="_token" value="{{csrf_token()}}">
						<div class= "nhappass">
							<span class="glyphicon glyphicon-lock"></span>&nbsp;Name&nbsp;  
							<input type="text"  name="name"  class="ip2" id ="txtPass" > 
						</div>
						<div>
							<span class="glyphicon glyphicon-user"></span>&nbsp;Email&nbsp;  
							<input type="email" name="email"  class="ip1" id="txtEmail" >
						</div><br>
						<div>
							<span class="glyphicon glyphicon-user"></span>&nbsp;Nội dung&nbsp;  
							<textarea name="message" cols="20" rows="5"></textarea>
						</div>
						

						<div class="btndangnhap">
							<input type="submit" value = "Gửi ">
						</div>

					</form>
				</div>
			</div>
			
		</div>
		

	</div>

	<div class="footer">	
		<p class="system">	Trung tâm công nghệ thông tin và quản trị mạng</p>
		<p class= "dchi"><i class="fas fa-home"></i> &nbsp;Xã Nhân Hòa, Huyện Mỹ Hào, Tỉnh Hưng Yên - Trường Đại học Sư phạm Kỹ thuật Hưng Yên</p>
		<p class ="dchi"><span class="glyphicon glyphicon-earphone"></span>&nbsp; 0967978353 -  <i class="far fa-envelope-open"> </i>&nbsp; lethingocthaohy@gmail.com</p>
	</div>
</body>
</html>
