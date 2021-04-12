@extends('admin.layout.dashadmin');
@section('title','Quản Lý Khối');
@section('main')
		<div class="panel panel-default">
                    <div class="panel-heading"><h6 class="panel-title"><i class="fas fa-chalkboard-teacher"></i><b style="font-size: 14px">Chọn file</b></h6></div>
                   
                        <form class="block well" action="importkhoi" method="POST" enctype="multipart/form-data"> 
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