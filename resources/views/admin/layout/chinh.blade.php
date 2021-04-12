<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<p class="gio"><span id="m"  ></span> :
					<span id="s">00</span></p>



					@yield('than')
<script language="javascript">
 	var m = "45";
					
	var s = 00; // Giây
	var timeout = null; // Timeout
				 
	function stop(){
			clearTimeout(timeout);
	}
	function start()
	{
					 
	if (s === -1){
				m -= 1;
				s = 59;
		}
					
	if (m == -1){
		clearTimeout(timeout);
		// alert('Hết giờ');
		window.location.assign("http://localhost:1412/thitructuyen/public/ketqua"); 
							
		return false;
	}
				 
	document.getElementById('m').innerText = m.toString();
	document.getElementById('s').innerText = s.toString();
				 
						
	timeout = setTimeout(function(){
					s--;
					start();
			}, 1000);
	}
	start();
				
	</script>
</body>
</html>