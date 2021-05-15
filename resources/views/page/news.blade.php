@extends('layouts.master');
@section('body')
        <div class="container-fluid tintuc">
        <div class="container">
            <div class="row">
                <div class="col-md-12 tieudetintuc">

                    <h3> TIN TỨC VÀ SỰ KIỆN</h3>
                </div>
            </div>

            <div class="row tintuc_first">
                <div class="col-md-2 col_ngaydang">
                    <span class="ngaydang">December 14, 2019</span>
                </div>
                <div class="col-md-1">
                    <img src="{{ asset('imgs/lienket_tt.png') }}" alt="" class="anh_lienket">
                </div>
                <div class="col-md-4">
                    <a href="tintuc1"><img src="{{ asset('imgs/banner/tintuc4.jpg') }}" class="img_tintuc" alt=""></a>
                </div>
                <div class="col-md-5 trichdoan">
                    <a href="tintuc1" style="color: #000"><h4>“Thiên nga đen: Xác suất cực nhỏ, tác động cực lớn” - Cuốn
                            sách thay đổi cách</h4></a>
                    <p>Chúng tôi thích làm việc theo ý thích của mình và được biết đến vì sự yêu thích gần như là ám ảnh
                        với những thói quen. Nhưng chuyện gì cũng có lí do của nó. Thói quen giúp chúng tôi hoàn thành
                        mục tiêu, giữ được động lực, hạn chế những khoảng thời gian chết và cũng...</p>

                    <p class="time_cmt"><i class="far fa-eye"></i> 123 &nbsp;&nbsp; <i class="far fa-comment"></i> 123
                        &nbsp;&nbsp; <i class="far fa-file-alt"></i> 1234</p>
                </div>
            </div>

            <div class="row tintuc_first">
                <div class="col-md-2 col_ngaydang">
                    <span class="ngaydang">December 14, 2019</span>
                </div>
                <div class="col-md-1">
                    <img src="{{ asset('imgs/lienket_tt.png') }}" alt="" class="anh_lienket">
                </div>
                <div class="col-md-4">
                    <a href="tintuc2"><img src="{{ asset('imgs/banner/tintuc6.jpg') }}" class="img_tintuc" alt=""></a>
                </div>
                <div class="col-md-5 trichdoan">
                    <a href="tintuc2" style="color: #000"><h4>Để thuyết trình như TED: 3 cuốn sách nên đọc và tìm hiểu
                            sâu</h4></a>
                    <p>Bí Quyết Diễn Thuyết Trước Đám Đông “Chuẩn” TED "Không có một phương pháp duy nhất nào để hùng
                        biện giỏi". Bởi thế giới tri thức quá rộng lớn và các diễn giả, khán giả thì rất đa dạng. Bất kỳ
                        nỗ lực nào nhằm áp dụng một công thức duy nhất cũng thường phản tác dụng. Người nghe sẽ nhận ra
                        điều này và cảm thấy mình đang bị thao túng...</p>

                    <p class="time_cmt"><i class="far fa-eye"></i> 123 &nbsp;&nbsp; <i class="far fa-comment"></i> 123
                        &nbsp;&nbsp; <i class="far fa-file-alt"></i> 1234</p>
                </div>
            </div>

            <div class="phantrangtintuc">
                <a href="tintuc"><span><i class="fas fa-angle-double-left"></i></span></a>
                <a href="tintuc"><span>1</span></a>
                <a href="tintuc"><span><i class="fas fa-angle-double-right"></i></span></a>
            </div>
        </div>
    </div>

@stop
