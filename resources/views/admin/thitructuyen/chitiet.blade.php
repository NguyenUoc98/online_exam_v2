@extends('admin.layout.index')
@section('body')

	
	<div class="container" id="main">
		<div class="row giohang" >
			@foreach($dethi as $dt)
					<div class="col-md-4">
						<img src="../imgs/monhoc/{{ $dt->hinhanh}}"  class="picture">
					</div>
				
					<div class="col-md-5 " >
					<h3 class="thongtinctde" style="text-transform: uppercase;"><b ">ĐỀ {{ $dt->tenky}}</b></h3>
					<p><b>Môn thi:</b> {{ $dt->tenmh}}</p>
					<p><b>Số câu:</b>  {{ $dt->thoigianthi}} câu</p>
					<p><b>Thời gian thi:</b> {{ $dt->socau}} phút</p>
					<p><b>Khối:</b> {{ $dt->tenkhoi}}</p>
					<p class="note"><b>Chú ý khi tham gia</b></p>
					<p><span class="glyphicon glyphicon-ok"></span> &nbsp;Hệ thống bắt đầu tính giờ làm bài thi</p>
					<p class="review">
						<span class="glyphicon glyphicon-ok"> </span> Phải chọn đáp án trả lời để tiếp tục bài thi
					</p>
					<p class="review">
						<span class="glyphicon glyphicon-ok"> </span> Hệ thống tự động kết thúc bài, tính điểm khi hết giờ làm bài
					</p>
					<p class="review">
						<span class="glyphicon glyphicon-ok"> </span> Xem lịch sử bài thi
					</p>
					@if(Auth::check())
						<marquee behavior="alternate"  width="10%">>></marquee>
						<a href="thamgiathi/{{ $dt->id_de}}"><button type="button"  class="btn warning" id="giohang" >THAM GIA NGAY</button></a>
						<marquee behavior="alternate" width="10%"><< </marquee>
					@endif
					
					<p>	
						<span class="f"><b><i class="fas fa-eye"></i></b> &nbsp;View: 217</span>
						<span class="g"><b><i class="fas fa-clipboard-check"></i></b> &nbsp;Taken: 1200</span>
						<span class="L"><b>20</b> &nbsp;votes</span>
					</p>
									
				</div>
				@endforeach


				
								<div class="col-md-3 chitiet" > 
								<p><b class="chuhotro">Đề Thi Liên Quan</b></p>
								<p class="h4"></p>
									@foreach($delienquan as $delq)
										<div class="row row_chitiet" >
											<div class="col-md-4">
												<a href="{{$delq->id_de}}">
													<img src="../imgs/monhoc/{{ $delq->hinhanh }}" alt="">
												</a>
											</div>
											<div class="col-md-8">
												<a href="{{$delq->id_de}}">Đề {{ $delq->tenky }}</a>
												<p class="canmonthi"><b>Môn thi:</b> {{ $delq->tenmh }}</p>
												<p><b>Thời gian:</b> {{ $delq->thoigianthi }} phút</p>
											</div>
										</div>
									@endforeach
									
									
					
						</div>
					</div>
	
		<!--đóng cột đầu tiên gồm ảnh, sản phẩm liên quan-->
		<div class="row thembinhluan" >
			<div class="col-md-12">
					<ul class="nav nav-tabs">
					    <li><a data-toggle="tab" href="#menu2">THẢO LUẬN</a></li>
					</ul>

					  <div class="tab-content">
						    <div id="home" class="tab-pane fade in active">
						     	 <div class="row">
							     	<div class="col-md-9">
							     		 <h4 class="chuthaoluan">Thảo Luận</h4>
							     	</div>
							     {{-- 	<div class="col-md-3"><input type="button" value=" Thêm ý kiến" class="vietcmt" data-toggle="modal" data-target="#danhgia"></div> --}}

						     	</div>
						    @foreach($binhluan as $bl)
								<div class="col-md-1"></div>
							    <div class="col-md-11">
							    	<div class="media" >
									  <div class="media-left media-top">
									    <img src="../imgs/banner/2.jpg"  class="media-object" width="60px" height="60px">
									  </div>
									  <div class="media-body">
									    <p class="media-heading" style="text-transform: capitalize;"><b>{{$bl->name}}</b></p>
									    <p style="font-size: 13px; color: #B3B2B2;">{{$bl->created_at}}</p>
									    <p style="color: #F9CA0D;margin-top: 10px;margin-bottom: 0px">
									 	
									 	
									 </p>
									    <p>{{$bl->noidung}} </p><br>
									  </div>
									</div>
							    </div>
						    @endforeach
						  </div>
					@if(Auth::check())
							 
						<form method="post" action="../thembinhluan/{{$id_de}}" >
							<input type="hidden" name="_token" value="{{ csrf_token()}}">    
								<div class="row">
									@if(count($errors)>0)
								<div class="alert alert-danger">
									@foreach($errors->all() as $err)
										<span class="glyphicon glyphicon-remove icon-remove"></span> {{$err}} <br>
									@endforeach
								</div>
		                    @endif

									<div class="col-md-1"></div>
									<div class="col-md-7">
										<div>
										 	<p>Viết thảo luận... <span class="glyphicon glyphicon-pencil"></span></p>
										 	
										 	<p >
										 		<textarea name="noidung" placeholder="Nhập nội dung thảo luận" id="" cols="90" rows="5"></textarea>
										 	</p>
										 	
										</div>  
									</div>
									<div class="col-md-4" >
										<p style="margin-top: 40px;"><input type="submit" class="btn btn-primary"></p>
									</div>
							 	
								</div> 
						</form>  
					@endif
					  </div>
					  		{{-- model đánh giá ý kiến --}}
					  		{{-- <div class="modal fade" id="danhgia" role="dialog" style="margin-top: 150px">
   								 <div class="modal-dialog modal-sm">
     								 <div class="modal-content">
      									  <div class="modal-header" style="background-color: #189eff ;color: #fff">
         									 <button type="button" class="close" data-dismiss="modal">&times;</button>
         									 <h4 class="modal-title" style="padding-left: 50px">Đánh giá</h4>
         									 
      									  </div>
      									  <div class="modal-body" style="padding-left: 25px">
      									  		<p>
      									  			<span style="padding-left: 50px; color: #EDC022">
      									  				<span class="glyphicon glyphicon-user" style="color: #000"></span>&nbsp;
         									 		<span class="glyphicon glyphicon-star-empty "></span> 
								 					<span class="glyphicon glyphicon-star-empty"></span> 
								 					<span class="glyphicon glyphicon-star-empty"></span> 
								 					<span class="glyphicon glyphicon-star-empty"></span> 
								 					<span class="glyphicon glyphicon-star-empty"></span>
								 					
         									 </span>
      									  		</p>
        										<p>Nooij dung</p>
									         	<p><textarea name="" id="" cols="30" rows="10"  placeholder="Nhập nội dung"></textarea></p>
        								  </div>
        									<div class="modal-footer">
        										<button type="button" class="btn btn-primary" data-dismiss="modal" style="margin-right: 120px">Gửi</button>
         								
        									</div>
      								</div>
   								 </div>
							</div> --}}
		</div>
		</div>

	</div>
@stop