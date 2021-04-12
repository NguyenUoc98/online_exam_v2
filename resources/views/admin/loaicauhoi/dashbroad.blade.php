@extends('admin.layout.master');
@section('title','Ngân Hàng Câu Hỏi');
@section('main')

<!-- Page content -->
	 	<div class="page-content">

	<!-- Info blocks -->
			<ul class="info-blocks">
                    <div class="movedown"></div>
				<li class="bg-primary">
					<div class="top-info">
						<a href="#">Exam</a>
						
					</div>
					<a href="#"><i class="icon-pencil"></i></a>
					<span class="bottom-info bg-danger">200</span>
				</li>
				
				
				<li class="bg-success">
					<div class="top-info">
						<a href="#">Students</a>
						
					</div>
					<a href="#"><i class="fas fa-user-graduate"></i> </a>
					<span class="bottom-info bg-primary">Ready for!</span>
                </li>
                <li class="bg-danger">
					<div class="top-info">
						<a href="#">Questions</a>
						
					</div>
					<a href="#"><i class="fas fa-question"></i></a>
					<span class="bottom-info bg-primary">2.000</span>
				</li>
				<li class="bg-info">
					<div class="top-info">
						<a href="#">Level question</a>
						
					</div>
					<a href="#"><i class="fas fa-book"></i></a>
					<span class="bottom-info bg-primary">12</span>
				</li>
				<li class="bg-warning">
					<div class="top-info">
						<a href="#">Test</a>
						
					</div> 
					<a href="#"><i class="fab fa-buromobelexperte"></i></a>
					<span class="bottom-info bg-primary">40</span>
				</li><br><br>
			
				
					<li class="bg-info">
					<div class="top-info">
						<a href="#">Export</a>
						
					</div>
					<a href="#"><i class="fas fa-arrow-up"></i></a>
					<span class="bottom-info bg-primary">12</span>
				</li>
				<li class="bg-success">
						<div class="top-info">
							<a href="#">Tyoe Question</a>
							
						</div>
						<a href="#"><i class="fas fa-question-circle"></i> </a>
						<span class="bottom-info bg-primary">Ready for!</span>
					</li>
				<li class="bg-warning">
					<div class="top-info">
						<a href="#">Import</a>
						
					</div>
					<a href="#"><i class="fas fa-arrow-down"></i></a>
					<span class="bottom-info bg-primary">40</span>
				</li>
				<li class="bg-primary">
					<div class="top-info">
						<a href="#">Setting</a>
					
					</div>
					<a href="#"><i class="icon-cogs"></i></a>
					<span class="bottom-info bg-danger">4</span>
				</li>
				<li class="bg-danger">
						<div class="top-info">
							<a href="#">Result</a>
							
						</div>
						<a href="#"><i class="fas fa-book"></i></a>
						<span class="bottom-info bg-primary">2.000</span>
					</li>
			</ul>
			<!-- /info blocks -->


			

			<div id="container" style="width: 1000px; height: 600px;margin: 0 auto;padding-top: 90px; padding-bottom: 100px;"></div>



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
            'GD-QP'
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
        name: 'Điểm dưới 1',
        data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]

    }, {
        name: 'Điểm dưới 5',
        data: [83.6, 78.8, 98.5, 93.4, 106.0, 84.5, 105.0, 104.3, 91.2, 83.5, 106.6, 92.3]

    }, {
        name: 'Điểm 7,8',
        data: [48.9, 38.8, 39.3, 41.4, 47.0, 48.3, 59.0, 59.6, 52.4, 65.2, 59.3, 51.2]

    }, {
        name: 'Điểm 10',
        data: [42.4, 33.2, 34.5, 39.7, 52.6, 75.5, 57.4, 60.4, 47.6, 39.1, 46.8, 51.1]

    }]
});
		</script>







					<!-- Simple contact form -->
				
            	</div>

            	


           

	     


		</div>
		<!-- /page content -->
		  
@stop