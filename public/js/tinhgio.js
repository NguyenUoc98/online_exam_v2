var m = "{{$dethi->thoigianthi}}";
					
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
				 
	document.getElementById('m').innerHTML = m.toString();
	document.getElementById('s').innerHTML = s.toString();
				 
						
	timeout = setTimeout(function(){
					s--;
					start();
			}, 1000);
	}
	start();