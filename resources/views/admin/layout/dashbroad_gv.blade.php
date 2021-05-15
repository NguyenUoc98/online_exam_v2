@extends('admin.layout.master');
@section('title','Quản Lý Kỳ Thi');
@section('main')

	<!-- Page header -->
			


		


			<!-- Info blocks -->
			<ul class="info-blocks">
				
				
					<li class="bg-primary ">
						<div class="top-info">
							<a href="#">Dashbroad</a>
							
						</div>
						<a href="#"><i class="icon-pencil"></i></a>
						<span class="bottom-info bg-danger">200</span>
						{{-- <div class="anhmomo"></div> --}}
					</li>
				<a href="{{url('giaovien/loaicauhoi/dsloai')}}">
							<li class="bg-danger">
								<div class="top-info">
									<a href="{{url('giaovien/loaicauhoi/dsloai')}}">Type Of Quesions</a>
									
								</div>
								<a href="{{url('giaovien/loaicauhoi/dsloai')}}"><a href="#"><i class="fas fa-chalkboard-teacher"></i> </a>
								<span class="bottom-info bg-primary">{{count($loaich)}}</span>
								
							</li>
				</a>
				<a href="{{url('giaovien/hocsinh/dshocsinh')}}">
					<li class="bg-info export">
					<div class="top-info">
						<a href="{{url('giaovien/hocsinh/dshocsinh')}}">Students</a>
						
					</div>
					<a href="{{url('giaovien/hocsinh/dshocsinh')}}"><i class="fas fa-user-graduate"></i></a>
					<span class="bottom-info bg-primary">{{count($hocsinh)}}</span>
					{{-- <div class="anhmomo7"></div> --}}
				</li>
			</a>
				
				<a href="{{url('giaovien/loaicauhoi/dsloai')}}">
				<li class="bg-warning">
					<div class="top-info">
						<a href="{{url('giaovien/loaicauhoi/dsloai')}}">Levels</a>
						
					</div> 
					<a href="{{url('giaovien/loaicauhoi/dsloai')}}"><i class="fab fa-buromobelexperte"></i></a>
					<span class="bottom-info bg-primary">{{count($mucdo)}}</span>
					{{-- <div class="anhmomo4"></div> --}}
				</li><br><br>
			</a>
			<a href="{{url('giaovien/dethi/dsdethi')}}">
				<li class="bg-success exam">
					<div class="top-info">
						<a href="{{url('giaovien/dethi/dsdethi')}}">Exams</a>
						
					</div>
					<a href="{{url('giaovien/dethi/dsdethi')}}"><i class="fas fa-file-signature"></i></a>
					<span class="bottom-info bg-primary">{{count($dethi)}}</span>
					{{-- <div class="anhmomo5"></div> --}}
				</li>
			</a>
			
			<a href="{{url('giaovien/monthi/dsmonthi')}}">
				<li class="bg-warning import">
					<div class="top-info">
						<a href="{{url('giaovien/monthi/dsmonthi')}}">Subjects</a>
						
					</div>
					<a href="{{url('giaovien/monthi/dsmonthi')}}"><i class="fas fa-book"></i></a>
					<span class="bottom-info bg-primary">{{count($monthi)}}</span>
					{{-- <div class="anhmomo8"></div> --}}
				</li>
			</a>
			<a href="{{url('giaovien/cauhoi/dscauhoi')}}">
					<li class="bg-success">
						<div class="top-info">
							<a href="{{url('giaovien/cauhoi/dscauhoi')}}">Quesions</a>
							
						</div>
						<a href="{{url('giaovien/cauhoi/dscauhoi')}}"><i class="fas fa-question"></i> </a>
						<span class="bottom-info bg-primary">{{count($cauhoi)}}</span>
						{{-- <div class="anhmomo2"></div> --}}
					</li>
				</a>
				<li class="bg-primary setting">
					<div class="top-info">
						<a href="#">Setting</a>
					
					</div>
					<a href="#"><i class="icon-cogs"></i></a>
					<span class="bottom-info bg-danger">4</span>
					{{-- <div class="anhmomo9"></div> --}}
				</li>
			</ul>
			<!-- /info blocks -->


			

			<div id="container" style="width: 1000px; height: 600px;margin: 0 auto;padding-top: 30px; padding-bottom: 100px;"></div>



		<script type="text/javascript">

Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Biểu Đồ Thống Kê'
    },
    subtitle: {
        text: 'Lượt thống kê mới nhất'
    },
    xAxis: {
        categories: [
            'Toán',
            'Ngữ văn',
            'Ngoại ngữ',
            'Vật lý',
            'Hóa học',
            'Sinh học',
            'GDCD',
            'Tin học',
            'Địa lý',
            'Lịch sử',
            'Công nghệ',
            
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Thí sinh'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} hs</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Điểm Liệt',
        data: [{{count($diemlietmh1)}},{{count($diemlietmh2)}},{{count($diemlietmh3)}},{{count($diemlietmh4)}},{{count($diemlietmh5)}},{{count($diemlietmh6)}},{{count($diemlietmh7)}},{{count($diemlietmh8)}},{{count($diemlietmh9)}}, {{count($diemlietmh10)}},{{count($diemlietmh11)}}]

    }, {
        name: 'Điểm TB',
        data: [{{count($diemtbmh1)}},{{count($diemtbmh2)}},{{count($diemtbmh3)}},{{count($diemtbmh4)}},{{count($diemtbmh5)}},{{count($diemtbmh6)}},{{count($diemtbmh7)}}, {{count($diemtbmh8)}},{{count($diemtbmh9)}}, {{count($diemtbmh10)}},{{count($diemtbmh11)}}]

    }, {
        name: 'Điểm Khá',
        data: [{{count($diemkhamh1)}},{{count($diemkhamh2)}}, {{count($diemkhamh3)}},{{count($diemkhamh4)}}, {{count($diemkhamh5)}}, {{count($diemkhamh6)}}, {{count($diemkhamh7)}}, {{count($diemkhamh8)}}, {{count($diemkhamh9)}}, {{count($diemkhamh10)}}, {{count($diemkhamh11)}}]

    }, {
        name: 'Điểm Giỏi',
        data: [{{count($diemgioimh1)}},{{count($diemgioimh2)}},{{count($diemgioimh3)}},{{count($diemgioimh4)}}, {{count($diemgioimh5)}}, {{count($diemgioimh6)}}, {{count($diemgioimh7)}}, {{count($diemgioimh8)}}, {{count($diemgioimh9)}}, {{count($diemgioimh10)}}, {{count($diemgioimh11)}}]

    }]
});
		</script>







				

            	


@stop