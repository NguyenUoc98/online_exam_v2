@extends('admin.layout.index')
@section('body')
	
			<div class="container-fluid bgsearch">
				<div class="container thiTHPTQG">
				<div class="row main_test" >
					<div class="col-md-12">
						<div class="col-md-12 tieudetintuc">
						
								<h3> Kết Quả Tìm Kiếm</h3>
						</div>
						
						<p>Tìm thấy {{ count($dethi) }} đề thi </p>
						  <div class="tab-content">
							    <div id="home" class="tab-pane fade in active">
							     <div class="row hinhanh">
							     		@foreach($dethi as $dt2)
							     			<a href="dethi/{{$dt2->id_de}}" style="color: #000">
								     		<div class="col-md-3 dethi">
									     		<img src="imgs/monhoc/{{ $dt2->hinhanh}}" width="199" height="150" alt="">
									     		<p class="tenmon">{{ $dt2->tenmh}}</p>
									     		<p class="title">Đề thi {{ $dt2->tenky}} gồm {{ $dt2->socau}} câu, thời gian thi {{ $dt2->thoigianthi}} phút</p>
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
					<a href="#"><span><i class="fas fa-angle-double-left"></i></span></a>
					<a href="#"><span>1</span></a>
					<a href="#"><span><i class="fas fa-angle-double-right"></i></span></a>
			</div>

		</div>
			</div>
@stop