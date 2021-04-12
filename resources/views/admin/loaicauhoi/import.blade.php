@extends('admin.layout.master');
@section('title','Quản Lý Loại Câu Hỏi');
@section('main')
		<div class="panel panel-default">
                    <div class="panel-heading"><h6 class="panel-title"><i class="fas fa-chalkboard-teacher"></i><b style="font-size: 14px">Chọn file</b></h6></div>
                   				 @if(count($errors)>0)
									<div class="alert alert-danger">
										@foreach($errors->all() as $err)
											<span class="glyphicon glyphicon-remove icon-remove"></span> {{$err}} <br>
										@endforeach
									</div>
			                    @endif
			                	@if(session('thongbao'))
											<div class="alert alert-success">
												<span class="glyphicon glyphicon-ok icon-oke"></span> {{session('thongbao')}}
											</div>
										@endif
                        <form class="block well" action="importloai" method="POST" enctype="multipart/form-data"> 
							<input type="hidden" name="_token" value="{{csrf_token()}}">
							<div class="DapAn">
									<h6><i class="fa fa-edit"></i> &nbsp; &nbsp;  Chọn file</h6>
								<input type="file" class="form-control" name="file" id="txtFile" width="500">
							</div>
                    
							<div class="btnthemch">
								<button id="import" class="btn btnsuach" type="submit">Import</button> &nbsp;
								<button class="btnxoach btn" >Thoát</button>
							
							</div> 
                   		</form>
             </div>
@stop