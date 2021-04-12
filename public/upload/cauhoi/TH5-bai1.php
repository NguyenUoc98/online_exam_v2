<?php
include('ketnoi.php');
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table  align="center" width="700px" >
	<a href="#"><button type="button" >Thêm</button></a>
    <thead style="background-color:grey"> 
		<tr>
			
			<th scope="col">Mã hãng</th>
			<th scope="col">Tên hãng</th>
			<th scope="col">Số điện thoại</th>
			<th scope="col">Email</th>								
			<th scope="col">Chức năng</th>
		</tr>
	</thead>
	<tbody  align="center" >
	<?php 
						$sql = 'SELECT * FROM hangsua';
						$result = $conn->query($sql);
						if($result->num_rows>0)
						{
							while($row=$result->fetch_assoc())
							{
								echo '
								<tr>
								<td>'.$row['Ma_Hang_Sua'].'</td>
								<td>'.$row['Ten_Hang_Sua'].'</td>
								<td>'.$row['Dia_Chi'].'</td>                    	
								<td>'.$row['Dien_Thoai'].'</td>
								<td>'.$row['Email'].'</td>
								
								<td>
								<a class="btn btn-info btn-sm" data-toggle="-update" data-target="#myModal-update" href=""><span class="fa fa-pencil"></span></a>
								</a>
								<a class="btn btn-danger btn-sm" href="xoaNV.php?id_delete='.$row['Ma_Hang_Sua'].'"><span class="fa fa-trash"></a>
								</td>
								</tr>

								';
							}
						}
						?>		
					</tbody>				
							
						</tbody>




    </table>
</body>
</html>
