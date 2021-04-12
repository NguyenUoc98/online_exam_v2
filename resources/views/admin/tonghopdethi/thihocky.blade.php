@extends('admin.layout.index');
@section('body')
	<div class="container thiTHPTQG">
				<div class="row main_test" >
					<div class="col-md-12">
						<div class="col-md-12 tieudetintuc">
						
								<h3> Ôn Thi Học Kỳ</h3>
						</div>
						

						  <div class="tab-content">
							    <div id="home" class="tab-pane fade in active">
							     <div class="row hinhanh">
							     	
							     	  @foreach($dethi as $dt)
							     		<a href="dethi/{{$dt->id_de}}" style="color: #000">
							     			<div class="col-md-3 dethi ">
									     		<img src="imgs/monhoc/{{ $dt->hinhanh}}" width="199" height="150" alt="">
									     		<p class="tenmon">{{ $dt->tenmh}}</p>
									     		<p class="title">Đề thi {{ $dt->tenky}} gồm {{ $dt->socau}} câu, thời gian thi 
									     			{{ $dt->thoigianthi}} phút</p>
									     		<p class="danhgia">
									     			
									     				<i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i>
									     			

									     			<i class="fas fa-users hscmt"></i> 134
									     		</p>
								     		</div>
							     		</a>
							     		 @endforeach

							     </div>
							     
							    </div>
						</div>
						  
						  		
				</div>
			</div>

			<div class="phantrangtintuc">
					<a href="tintuc"><span><i class="fas fa-angle-double-left"></i></span></a>
					<a href="tintuc"><span>1</span></a>
					<a href="tintuc"><span><i class="fas fa-angle-double-right"></i></span></a>
			</div>

		</div>
@stop