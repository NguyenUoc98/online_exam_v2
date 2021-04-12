@extends('admin.layout.chinh');

@section('than')

	<div class="container">
		<div class="content">

			
			@foreach($khoi as $kh)
			<h3>{{$kh->tenkhoi}}</h3>
			@endforeach
		</div>

		{!!$khoi->links()!!}

		<script type="text/javascript">
	$(document).on('click', '.pagination a', function(e){
			e.preventDefault();
			// console.log($(this).attr('href').split('page=')[1]);
			var page = $(this).attr('href').split('page=')[1];
			getCtdethi(page);
	});

	function getCtdethi(page){

		//console.log('page ' + page);
		$.ajax({
			url:'ajax/sp?page='+page
		}).done(function(data){
			// console.log(data);
			$('.content').html(data);
			// location.hash= page;
		});
	}
</script>
@stop