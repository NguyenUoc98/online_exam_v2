<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Bán Sách</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1">
	<link href="../../css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="../../css/chitiet/lienhe.css" rel="stylesheet" type="text/css">
	<script src="{{ asset('js/jquery3.3.1.min.js') }}"></script>
	<script  src="{{ asset('js/bootstrap.min.js') }}"></script>	
</head>
<body>
	<form name="frm1">
									
		
	
<div class="container" id=" main">
<div class="row giohang" >
						<div class="col-md-4"> <img src="imgs/bg_login.jpg" alt=""  style="border: 1px solid black" class="picture">
						<a href="1.html"><img src="imgs/bg_login.jpg" alt=""  class="picture1"> </a> </div>
						<div class="col-md-5" >
									<h3 ><b ">Đắc Nhân Tâm</b></h3> <br>
									<p><b>Tình trạng:</b> Còn hàng</p>
									<p><b>Giá:</b> <b style="color: #189eff">49.000 ₫</b> Đã có VAT</p>
									<p><b>Tiết kiệm:</b> 36% (27.000 ₫)</p>
									<p><b>Giá thị trường:</b> 76.000 ₫</p>
									<p class="mota">Tác phẩm có sức lan toả vô cùng rộng lớn - dù  bạn đi đến bất cứ đâu, bất kỳ quốc gia nào cũng đều có thể nhìn thấy. Tác phẩm được đánh giá là cuốn sách đầu tiên và hay nhất trong thể loại này, có ảnh hưởng thay đổi cuộc đời đối với hàng triệu người trên thế giới.... </p>
									<p><b>Số Lượng:</b> </p>
									<p><input type="button" value="-" onclick="Tru()"><input type="text" value="1" id="txtSL" class="themsoluong" ><input type="button" value="+" onclick ="Cong()"></p>
									<button type="button"  class="btn warning" id="giohang" data-toggle="modal" data-target="#myModal" >THÊM VÀO GIỎ HÀNG</button>
									  <div class="modal fade" id="myModal" role="dialog" style="">
									    <div class="modal-dialog hiendatmua"  style="width: 630px">
									    
									      <!-- Modal content-->
									      <div class="modal-content">
									        <div class="modal-header">
									          <button type="button"  class="close" data-dismiss="modal">&times;</button>
									          <h4 class="modal-title"><span class="	glyphicon glyphicon-shopping-cart"> </span> Giỏ hàng của bạn (<span id="quantity">1</span> sản phẩm)</h4>
									          <p class="tieudegio"><span class="glyphicon glyphicon-ok" ></span> Bạn vừa thêm <a href="1.html" style="color: #FC7D00" ><u>Đắc Nhân Tâm</u></a>  vào giỏ hàng</p>
									        </div>
									        <div class="modal-body">
									         <div class="row">
									         	<!-- <div class="col-md-2"><img src="img/Kỹ Năng Sống/dacnhantam.png" height="90" width="70" alt="" style="border: 1px solid #EBEBEB; padding: 3px"></div>
									         	<div class="col-md-7" style="font-size: 14px">Đắc Nhân Tâm</div> -->
									         	<!-- <div class="col-md-4"> <input type="button" value="-" onclick="Tru()"><input type="text" value="1" id="txtSL" class="themsoluong" ><input type="button" value="+" onclick ="Cong()"></div> -->
									         	<!-- <div class="col-md-3" align="right" style="color: #189eff; font-weight: bold">
													<div class="row">
														<div class="col-md-12">49.000đ</div></div>
									         		<div class="row"><div class="col-md-12" style="right"><input type="text" value="1" id="txtSL2" class="themsoluong" ></div></div>
									         	</div> -->
									         	<table class="tablethanhtoan" id="tabledeal">
											
													<tr>
														<td>XÓA</td>
														<td>ẢNH SÁCH</td>
														<td>TÊN SÁCH</td>
														<td>GIÁ </td>
														<td>SỐ LƯỢNG</td>
														<td>THÀNH TIỀN</td>
													</tr>
													<tr>
														<td><span class="glyphicon glyphicon-trash" onclick="xoagio()"> </span></td>
														<td><img src="img/Kỹ Năng Sống/dacnhantam.png" alt="" height="90" width="70"></td>
														<td>Đắc Nhân Tâm</td>
														<td><input type="text" id="priceProduct2" value="49" >.000đ</td>
														<td ><input type="button" value="-" onclick="Tru1()"><input type="text" value="1" id="txtSL2" class="themsoluong" onblur=""><input type="button" value="+" onclick ="Cong1()"></td>
														<td><span id="thanhtien">49.000₫</span></td>
													</tr>
													<tr>
														<td colspan="3"  style=" border-right: none">
														<p class="hotline"><b><span class="	glyphicon glyphicon-earphone"></span> HOTLINE: 0967978353</b></p>
														</td>
														<td colspan="3" ><b class="sumprice">TỔNG TIỀN: <span id="tongtiensp">49.000₫</span></b></td>
													</tr>
													<tr>
														<td colspan="3" style="text-align: left;border-right: none"><a href="../trangchu.html"><h5 style=""> <b class="ttucmua" > <span class="	glyphicon glyphicon-arrow-left"></span>&nbsp;TIẾP TỤC MUA HÀNG</b></h5></a></td>
													<td colspan="3"><div class="col-md-12 booksp" align="right"><a href="../giohang2.html"><span class="ttucmua"><span class="glyphicon glyphicon-ok"></span>&nbsp;&nbsp;<b>TIẾN HÀNH ĐẶT HÀNG</b></span></a></div></td>
													</tr>
											
											</table>
									         </div>
									         <!-- <div class="row" style="margin-top: 15px">
									         	<div class="col-md-8"><a href="../sachthanhcong.html" style="color: #000"> <span class="glyphicon glyphicon-chevron-left"></span> &nbsp;Tiếp tục mua hàng</a></div>
									         	<div class="col-md-4" align="right">Tổng tiền:&nbsp; <b style="color: #189eff;font-weight: bold">49.000₫</b></div>
									         </div> -->
									       <!--   <div class="row" style="margin: 30px 0px 10px 0px;text-indent: 20px">
									         	<div class="col-md-12 booksp" align="right"><a href="../giohang2.html"><span class="ttucmua"><span class="glyphicon glyphicon-ok"></span>&nbsp;&nbsp;<b>TIẾN HÀNH ĐẶT HÀNG</b></span></a></div>
									         </div> -->
									        </div>
									        <div class="modal-footer">
									          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									        </div>
									      </div>
									      
									    </div>
									  </div>
								<!-- <p><a href=""><button type="button"  class="btn warning" id="giohang" onclick="themvaogio()"><a href=""></span>&nbsp;</a></button></a></p> -->
							<p style="margin-top: 15px;"><b>Dịch vụ và khuyến mãi</b></p>
								<p><span class="glyphicon glyphicon-ok"></span> &nbsp;Những chương trình khuyến mãi <a href="" style="color: #189eff"  >&nbsp;&nbsp;Chi tiết</a></p>
								<p style="margin-bottom: 30px"><span class="glyphicon glyphicon-ok"></span> &nbsp;20 cuốn sách Quản trị Kinh doanh hay nhất <a href="" style="color: #189eff">&nbsp;&nbsp;Chi tiết</a></p>
								<p><a href="https://www.facebook.com/" class="f"><b>f</b> &nbsp;Facebook</a>
									<a href="https://www.google.com/" class="g"><b>G+</b> &nbsp;Google+</a>
									<a href="https://www.twitter.com/" class="t"><b>t</b> &nbsp;Twitter</a>
									<a href="https://www.linkedin.com/" class="L"><b>in</b> &nbsp;Linkedin</a>

									<!-- <a href="https://www.twitter.com/" class="t"><img src="img/bìa/DBA63958-ABB4-91AA-7765C77F270A4AA7.png" width="15" height="15" alt=""> &nbsp;Twitter</a>
									<a href="https://www.instagram.com/" class="i"><img src="img/bìa/images.png" width="15" height="15" alt=""> &nbsp;Instagram</a></p> -->
							</div>
								<div class="col-md-3 chitiet" > 
								<p><b class="chuhotro">SẢN PHẨM LIÊN QUAN</b></p>
								<p class="h4"></p>
									<div class="row row_chitiet" ><a href="file:///D:/Do_An/Do%20An%202/50%20chi%20ti%E1%BA%BFt%20v%E1%BB%81%20S%C3%A1ch/4.html">
										<div class="col-md-4"><img src="img/Kỹ Năng Sống/doi-ngan-dung-ngu-dai-bia.jpg" alt=""></div>
										<div class="col-md-8">
											Đời Ngắn Đừng Ngủ Dài</a>
											<p><strike>60.000đ</strike></p>
											<p><b>42.000đ</b>&nbsp; <span >-30%</span> &nbsp; </p>
										</div>
									</div>
									<div class="row row_chitiet" ><a href="aisekhackhibanliaxa.html">
										<div class="col-md-4"><img src="img/Kỹ Năng Sống/300__65677_big.jpg" alt=""></div>
										<div class="col-md-8">
											Ai Sẽ Khác Khi Bạn Lìa Xa</a>
											<p><strike>60.000đ</strike></p>
											<p><b>42.000đ</b>&nbsp; <span >-30%</span> &nbsp; </p>
										</div>
									</div>
									<div class="row row_chitiet" ><a href="file:///D:/Do_An/Do%20An%202/50%20chi%20ti%E1%BA%BFt%20v%E1%BB%81%20S%C3%A1ch/3.html">
										<div class="col-md-4"><img src="img/Kỹ Năng Sống/ca_phe_cung_tony_tai_ban_2017_.jpg" alt=""></div>
										<div class="col-md-8">
											Cafe Cùng Tony</a>
											<p><strike>90.000đ</strike></p>
											<p><b>62.099đ</b>&nbsp;<span >-31%</span> &nbsp; </p></a>
										</div>
									</div>
									<div class="row row_chitiet"><a href="file:///D:/Do_An/Do%20An%202/50%20chi%20ti%E1%BA%BFt%20v%E1%BB%81%20S%C3%A1ch/6.html">
										<div class="col-md-4"><img src="img/Kỹ Năng Sống/nhalanhdaokochucdanh.JPG" alt=""></div>
										<div class="col-md-8">
											Nhà Lãnh Đạo Không Chức Danh</a>
											<p><strike>80.000đ</strike></p>
											<p><b>57.600đ</b>&nbsp;<span >-28%</span>&nbsp; </p></a>
										</div>
									</div>
									
					
						</div>
					</div>
	
		<!--đóng cột đầu tiên gồm ảnh, sản phẩm liên quan-->
		<div class="row" >
			<div class="col-md-12">
					<ul class="nav nav-tabs">
					    <li class="active"><a data-toggle="tab" href="#home">GIỚI THIỆU SÁCH</a></li>
					    <li><a data-toggle="tab" href="#menu1">THÔNG TIN CHI TIẾT</a></li>
					    <li><a data-toggle="tab" href="#menu2">ĐÁNH GIÁ SẢN PHẨM</a></li>
					    
					</ul>

					  <div class="tab-content">
						    <div id="home" class="tab-pane fade in active">
						     <div class="sach">
										<h4 ><b>Đắc Nhân Tâm </b></h4>
											<p><b>Đắc Nhân Tâm - Được lòng người</b>, là cuốn sách đưa ra các lời khuyên về cách thức cư xử, ứng xử và giao tiếp với mọi người để đạt được thành công trong cuộc sống. Gần 80 năm kể từ khi ra đời, Đắc Nhân Tâm là cuốn sách gối đầu giường của nhiều thế hệ luôn muốn hoàn thiện chính mình để vươn tới một cuộc sống tốt đẹp và thành công.</p>
											<p><b>Đắc Nhân Tâm</b> cụ thể và chi tiết với những chỉ dẫn để dẫn đạo người, để gây thiện cảm và dẫn dắt người khác,... những hướng dẫn ấy, qua thời gian, có thể không còn thích hợp trong cuộc sống hiện đại nhưng nếu người đọc có thể cảm và hiểu được những thông điệp tác giả muốn truyền đạt thì việc áp dụng nó vào cuộc sống trở nên dễ dàng và hiệu quả.</p>
											
											<p><b>Đắc Nhân Tâm</b>, từ một cuốn sách, hôm nay đã trở thành một danh từ để chỉ một lối sống mà ở đó con người ta cư xử linh hoạt và thấu tình đạt lý. Lý thuyết muôn thuở vẫn là những quy tắc chết, nhưng Nhân Tâm là sống, là biến đổi. Bạn hãy thử đọc "Đắc Nhân tâm" và tự mình chiêm nghiệm những cái đang diễn ra trong đời thực hiện hữu, chắc chắn bạn sẽ có những bài học cho riêng mình.</p>
											<div  align="center">
												<img src="img/bìa/Dac-nhan-tam1.jpg" alt="">
											</div>
											<p><b>Đắc Nhân Tâm</b> là nghệ thuật thu phục lòng người, là làm cho tất cả mọi người yêu mến mình. "Đắc nhân tâm" và cái Tài trong mỗi người chúng ta. "Đắc Nhân Tâm" trong ý nghĩa đó cần được thụ đắc bằng sự hiểu rõ bản thân, thành thật với chính mình, hiểu biết và quan tâm đến những người xung quanh để nhìn ra và khơi gợi những tiềm năng ẩn khuất nơi họ, giúp họ phát triển lên một tầm cao mới. Đây chính là nghệ thuật cao nhất về con người và chính là ý nghĩa sâu sắc nhất đúc kết từ những nguyên tắc vàng của Dale Carnegie.Sách đã được chuyển ngữ sang hầu hết các thứ tiếng trên thế giới và có mặt ở hàng trăm quốc gia. Đây là cuốn sách liên tục đứng đầu danh mục sách bán chạy nhất do thời báo NewYork Times bình chọn suốt 10 năm liền.</p>
											<p>Tác phẩm có sức lan toả vô cùng rộng lớn - dù  bạn đi đến bất cứ đâu, bất kỳ quốc gia nào cũng đều có thể nhìn thấy. Tác phẩm được đánh giá là cuốn sách đầu tiên và hay nhất trong thể loại này, có ảnh hưởng thay đổi cuộc đời đối với hàng triệu người trên thế giới.</p>
										<p>Xin mời bạn đón đọc....</p>
									</div>
						    </div>
						    <div id="menu1" class="tab-pane fade">
						     <div class="table_chitiet">
											<table>
													<tr>
														<td class="td"><p>Tác giả</p></td>
														<td class="td1">Dale Carnegie</td>
													</tr>
													<tr>
														<td class="td"><p>Xuất bản</p></td>
														<td class="td1"> 03-2016</td>
													</tr>
													<tr>
														<td class="td"><p>Nhà xuất bản</p></td>
														<td class="td1">Nhà Xuất Bản Tổng hợp TP.HCM</td>
																	
													</tr>
													<tr>
														<td class="td"><p>Công ty phát hành</p></td>
														<td class="td1"> First News - Trí Việt</td>
													</tr>
													<tr>
														<td class="td"><p>Dạng bìa</p></td>
														<td class="td1">Bìa mềm</td>
													</tr>
													<tr>
														<td class="td"> <p>Kích thước</p></td>
														<td class="td1">14.5 x 20.5 cm</td>
														
													</tr>
													<tr>
														<td class="td">Dịch giả</td>
														<td>Minh Khương, Thiên Trang, Kew Pham</td>
													</tr>
													<tr>
														<td class="td"><p>Số trang</p></td>
														<td class="td1">	320</td>
													</tr>
													<tr>
														<td class="td"><p>Mã sản phẩm</p></td>
														<td class="td1">2436661537384</td>
													</tr>
												</table>
										</div>
						    </div>
						    <div id="menu2" class="tab-pane fade">
						     <div class="row">
						     	<div class="col-md-9">
						     		 <h4>ĐÁNH GIÁ SẢN PHẨM</h4>
						     	</div>
						     	<div class="col-md-3"><input type="button" value=" Viết đánh giá" class="vietcmt" data-toggle="modal" data-target="#danhgia"></div>

						     </div>
						       <div class="media" >
								  <div class="media-left media-top">
								    <img src="img/bìa/timbinhyen1.gif "  class="media-object" width="60px" height="60px">
								  </div>
								  <div class="media-body">
								    <p class="media-heading">Ngoc Thao</p>
								    <p style="font-size: 14px; color: #B3B2B2;">01/05/2018</p>
								    <p style="color: #F9CA0D;margin-top: 10px;margin-bottom: 0px">
								 	<span class="glyphicon glyphicon-star "></span> 
								 	<span class="glyphicon glyphicon-star"></span> 
								 	<span class="glyphicon glyphicon-star"></span> 
								 	<span class="glyphicon glyphicon-star"></span> 
								 	<span class="glyphicon glyphicon-star"></span>
								 	<span class="glyphicon glyphicon-user" style="color: #000"></span>
								 </p>
								    <p>Giao hàng nhanh, giấy đẹp,sách in rất chất lượng và chất lượng nữa. </p>
								  </div>
								</div>
						    </div>

						    
					  </div>
					  
					  		<div class="modal fade" id="danhgia" role="dialog" style="margin-top: 150px">
   								 <div class="modal-dialog modal-sm">
     								 <div class="modal-content">
      									  <div class="modal-header" style="background-color: #189eff ;color: #fff">
         									 <button type="button" class="close" data-dismiss="modal">&times;</button>
         									 <h4 class="modal-title" style="padding-left: 50px">Đánh giá</h4>
         									 
      									  </div>
      									  <div class="modal-body" style="padding-left: 25px">
      									  		<p>
      									  			<span style="padding-left: 50px; color: #EDC022">
      									  				<span class="glyphicon glyphicon-user" style="color: #000"></span>&nbsp;
         									 		<span class="glyphicon glyphicon-star-empty "></span> 
								 					<span class="glyphicon glyphicon-star-empty"></span> 
								 					<span class="glyphicon glyphicon-star-empty"></span> 
								 					<span class="glyphicon glyphicon-star-empty"></span> 
								 					<span class="glyphicon glyphicon-star-empty"></span>
								 					
         									 </span>
      									  		</p>
        										<p><input type="text" placeholder="Nhập tên của bạn"></p>
									         	<p><input type="text" placeholder="nguyenthihoa@gmail.com"></p>
									         	<p><input type="text" placeholder="Tiêu đề"></p>
									         	<p><textarea name="" id="" cols="30" rows="10"  placeholder="Nhập nội dung"></textarea></p>
        								  </div>
        									<div class="modal-footer">
        										<button type="button" class="btn btn-primary" data-dismiss="modal" style="margin-right: 120px">Gửi</button>
         								
        									</div>
      								</div>
   								 </div>
			</div>
		</div>
		</div><br>
		<div class="special">
			<h4 > <b  class="chunoibat">SÁCH NỔI BẬT</b></h4>
			<p class="h4"></p>
				<div class="row sanpham">
					<div class="col-md-3 sp1">
						<a href="file:///D:/Do_An/Do%20An%202/50%20chi%20ti%E1%BA%BFt%20v%E1%BB%81%20S%C3%A1ch/1.html">
								<img src="img/Kỹ Năng Sống/dacnhantam.png" alt="..."   width="165" height="230"></a>
								<h5><a href="file:///D:/Do_An/Do%20An%202/50%20chi%20ti%E1%BA%BFt%20v%E1%BB%81%20S%C3%A1ch/1.html">Đắc Nhân Tâm</a></h5>
								<p><b style="color: #189eff">105.000₫ </b>&nbsp; <span class="giamgia">-30%</span></p>
								 <strike>150.000đ</strike>
								 <p style="color: #F9CA0D;margin-top: 11px;margin-bottom: 0px">
								 	<span class="glyphicon glyphicon-star "></span> 
								 	<span class="glyphicon glyphicon-star"></span> 
								 	<span class="glyphicon glyphicon-star"></span> 
								 	<span class="glyphicon glyphicon-star"></span> 
								 	<span class="glyphicon glyphicon-star"></span> <span style="color: #000"></span>
								 	<span class="glyphicon glyphicon-user" style="color: #000"></span>
								 </p>
								
					</div>
					<div class="col-md-3 sp1">
						<a href="aisekhackhibanliaxa.html">
						<img src="img/Sách Tiếng Việt/Kỹ Năng Sống/300__65677_big.jpg" alt="..."  width="165" height="230"></a>
								<h5 ><a href="aisekhackhibanliaxa.html">Ai Sẽ Khác Khi Bạn Lìa Xa</a></h5>
								<p><b style="color: #189eff">36.000₫ </b>&nbsp; <span class="giamgia">-30%</span></p>
								 <strike>93.000đ</strike>
								 <p style="color: #F9CA0D;margin-top: 11px;margin-bottom: 0px">
								 	<span class="glyphicon glyphicon-star "></span> 
								 	<span class="glyphicon glyphicon-star"></span> 
								 	<span class="glyphicon glyphicon-star"></span> 
								 	<span class="glyphicon glyphicon-star-empty"></span> 
								 	<span class="glyphicon glyphicon-star-empty"></span> <span style="color: #000"></span>
								 	<span class="glyphicon glyphicon-user" style="color: #000"></span>
								 </p>
					</div>		
					<div class="col-md-3 sp1">
						<a href="file:///D:/Do_An/Do%20An%202/50%20chi%20ti%E1%BA%BFt%20v%E1%BB%81%20S%C3%A1ch/45.html">
								<img src="img/thưởng thức-đời sống/nhatky1.gif" alt="..."  width="165" height="230"></a>
							<h5><a href="file:///D:/Do_An/Do%20An%202/50%20chi%20ti%E1%BA%BFt%20v%E1%BB%81%20S%C3%A1ch/45.html">Nhật Ký Học Làm Bánh</a></h5>
								<p><b style="color: #189eff">105.000₫ </b>&nbsp; <span class="giamgia">-30%</span></p>
								 <strike>150.000đ</strike>
								 <p style="color: #F9CA0D;margin-top: 11px;margin-bottom: 0px">
								 	<span class="glyphicon glyphicon-star-empty "></span> 
								 	<span class="glyphicon glyphicon-star-empty"></span> 
								 	<span class="glyphicon glyphicon-star-empty"></span> 
								 	<span class="glyphicon glyphicon-star-empty"></span> 
								 	<span class="glyphicon glyphicon-star-empty"></span> <span style="color: #000"></span>
								 	<span class="glyphicon glyphicon-user" style="color: #000"></span>
								 </p>
								
								
					</div>
					
					<div class="col-md-3 sp1">
						<a href="file:///D:/Do_An/Do%20An%202/50%20chi%20ti%E1%BA%BFt%20v%E1%BB%81%20S%C3%A1ch/19.html">
								<img src="img/Sách Kinh Tế/bimat.gif" alt="..."  width="165" height="230"></a>
								<h5><a href="file:///D:/Do_An/Do%20An%202/50%20chi%20ti%E1%BA%BFt%20v%E1%BB%81%20S%C3%A1ch/19.html">Bí Mật Về Tiền</a></h5>
									<p><b style="color: #189eff">54.000₫ </b>&nbsp; <span class="giamgia">-45%</span></p>
								 <strike>99.000đ</strike>
								 <p style="color: #F9CA0D;margin-top: 11px;margin-bottom: 0px">
								 	<span class="glyphicon glyphicon-star-empty "></span> 
								 	<span class="glyphicon glyphicon-star-empty"></span> 
								 	<span class="glyphicon glyphicon-star-empty"></span> 
								 	<span class="glyphicon glyphicon-star-empty"></span> 
								 	<span class="glyphicon glyphicon-star-empty"></span> <span style="color: #000"></span>
								 	<span class="glyphicon glyphicon-user" style="color: #000"></span>
								 </p>
					</div>
					
				</div>
		</div>

	
</div>
 <!--đóng container-->
</form>


</body>
</html>