<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [
    'as'   => 'home',
    'uses' => 'HomeController@index'
]);


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::get('home', [
    'as'   => 'home',
    'uses' => 'HomeController@index'
]);

Route::get('introduce', [
    'as'   => 'introduce',
    'uses' => 'HomeController@introduce'
]);

Route::get('news', [
    'as'   => 'news',
    'uses' => 'HomeController@news'
]);

Route::get('contact', [
    'as'   => 'contact',
    'uses' => 'HomeController@contact',
]);

Route::get('semester/{slug}', [
    'as' => 'semester.show',
    'uses' => 'SemesterController@show'
]);

Route::prefix('exam')->group(function () {
    Route::get('/{id}', [
        'as'   => 'exam.show',
        'uses' => 'ExamController@show'
    ]);
});

Route::post('comment/{id}', [
    'as' => 'comment.store',
    'uses' => 'CommentController@store'
]);


Route::post('/postuser','UserController@postthemuser')->name('postuser');

Route::get('/', function () {
    return view('admin.layout.trangchuAD');
});

Route::get('lichsuthi/{id}','TrangchuController@getlichsuthi');

Route::get('tructuyen/{id}','TrangchuController@getdiemthi');
Route::get('dethi/thamgiathi/{id}','TrangchuController@thamgiathi');
Route::get('dethi/thamgiathi/ajax/{id}','TrangchuController@thamgiathi1');

// Route::get('/','TrangchuController@thamgiathisp');
//  Route::get('ajax/sp','TrangchuController@thamgiathisp1');

// Route::get('mypdf','DethiController@myPDF');

Route::post('insertdapan','TrangchuController@bailamhocsinh');

Route::get('kiemtra/{$id}','TrangchuController@getdiemthi');

Route::get('pdf/{id}','TrangchuController@generatePDF');

Route::post('ketqua','TrangchuController@tinhdiem');

Route::get('sendmail','SendMailController@getmail');
// Route::post('sendmail','SendMailController@send');
Route::post('/sendmail','SendMailController@send');
Route::post('/sendmail_ketqua','SendMailController@send');

Route::get('dangnhap','TrangchuController@getdangnhap');

Route::post('dangnhap','TrangchuController@postdangnhap');
Route::get('dangxuat','TrangchuController@postdangxuat');
Route::get('gvdangxuat','TrangchuController@gvdangxuat');


Route::get('dashbroad_ad','ThongKeController@thongke_ad');
Route::get('giaovien/dash/dashbroad_gv','ThongKeController@thongke_gv');





Route::get('tintuc1', function () {
    return view('admin.tintuc.tintuc1');

});
Route::get('tintuc2', function () {
    return view('admin.tintuc.tintuc2');

});
Route::get('ngoaingu', function () {
    return view('admin.tailieu.ngoaingu');

});

Route::get('chitiet', function () {
    return view('admin.thitructuyen.chitiet');
});




// // Route::get('dethi/thamgiathichung/{id}','TrangchuController@thamgiathichung');
// Route::get('dethi/thamgiathichung/{id}','TrangchuController@thamgiathichung');

// Route::get('/ajax/ctdethi','TrangchuController@thamgiathiajax');






Route::get('search','TrangchuController@getSearch');
Route::get('thithptquocgia','TrangchuController@getthithptquocgia');
Route::get('thihocki','TrangchuController@getthihocky');

// Route::get('trangchu','MenuController@getmenu');

//nhóm các route có chung tiền tố
Route::group(['prefix'=>'admin'], function(){

    Route::group(['prefix'=>'dangnhap'], function(){
        Route::get('dashbroadgv', function () {
            return view('admin.layout.dashbroad_gv');
        });

        Route::get('dashbroadad','GiaoVienController@dashadminn');

    });

    Route::group(['prefix'=>'khoi'], function(){
        Route::get('dskhoi','KhoiController@getKhoi');

        Route::get('themkhoi','KhoiController@themkhoi');

        Route::get('suakhoi/{id}','KhoiController@suakhoi');
        Route::post('suakhoi/{id}','KhoiController@suakhoipost');

        Route::get('xoakhoi/{id}','KhoiController@xoakhoi');
        Route::get('exportkhoi','KhoiController@export');
        Route::get('importkhoi','KhoiController@importkhoi');
        Route::post('importkhoi','KhoiController@import');
    });

    Route::group(['prefix'=>'kythi'], function(){
        Route::get('dskythi','KyThiController@getKythi');

        Route::get('themkythi','KyThiController@themkythi');

        Route::get('xoakythi/{id}','KyThiController@xoakt');

    });

    Route::group(['prefix'=>'giaovien'], function(){
        Route::get('dsgiaovien','GiaoVienController@getgv');

        Route::get('themgiaovien','GiaoVienController@getthemgv');
        Route::post('themgiaovien','GiaoVienController@postthemgv');
        Route::get('suagiaovien/{id}','GiaoVienController@getsuagv');
        Route::post('suagiaovien/{id}','GiaoVienController@postsuagv');
        Route::get('importgiaovien','GiaoVienController@importgv');
        Route::post('importgiaovien','GiaoVienController@import');
        Route::get('xoagiaovien/{id}','GiaoVienController@xoagiaovien');
    });

    Route::group(['prefix'=>'hocsinh'], function(){
        Route::get('dshocsinh','GiaoVienController@getgv');

        Route::get('themgiaovien','GiaoVienController@getthemgv');
        Route::post('themgiaovien','GiaoVienController@postthemgv');
        Route::get('suagiaovien/{id}','GiaoVienController@getsuagv');
        Route::post('suagiaovien/{id}','GiaoVienController@postsuagv');
        Route::get('importgiaovien','GiaoVienController@importgv');
        Route::post('importgiaovien','GiaoVienController@import');
        Route::get('xoagiaovien/{id}','GiaoVienController@xoagiaovien');
    });

    Route::group(['prefix'=>'user'], function(){
        Route::get('dsuser','UserController@getuser');

        Route::get('themuser','UserController@getthemuser');
        Route::post('thempost','UserController@postthemuser');
        Route::get('suauser/{id}','UserController@getsuauser');


        Route::get('xoauser/{id}','UserController@xoauser');
    });
    Route::post('suauser/{id}','UserController@postsuauser');

    Route::group(['prefix'=>'ketqua'], function(){
        Route::get('dsketqua','KetQuaController@ketquathi');
        Route::get('exportPDF','KetQuaController@exportPDF');

    });
    Route::get('exportKetQua','ExcelController@exportKetQua');


});


//route cho giáo viên
Route::group(['prefix'=>'giaovien'], function(){


    Route::group(['prefix'=>'loaicauhoi'], function(){
        //giaovien/loaicauhoi/getLoai
        Route::get('dsloai','LoaiCauhoiController@getLoai');
        // Route::get('dash','LoaiCauhoiController@dash');
        Route::get('xoaloai/{id}','LoaiCauhoiController@getxoaloai');

        Route::get('themloai','LoaiCauhoiController@themloai');
        Route::post('thempost','LoaiCauhoiController@postthemloai');




        Route::get('xoaloai/{id}','LoaiCauhoiController@getxoaloai');

        Route::get('export','LoaiCauhoiController@Export'); // ->name('contact.export');
        Route::get('import','LoaiCauhoiController@getImport');
        Route::post('importloai','LoaiCauhoiController@importExcel');
    });
    // Route::get('loaicauhoi/dscauhoi','CauhoiController@getCauhoi');


    Route::post('suapost/{id}','LoaiCauhoiController@postsualoai');
    Route::get('sualoai/{id}','LoaiCauhoiController@sualoai');

    Route::group(['prefix'=>'cauhoi'], function(){
        Route::get('dscauhoi','CauhoiController@getCauhoi');

        Route::get('themcauhoi','CauhoiController@themcauhoi');
        Route::post('themcauhoi','CauhoiController@themcauhoipost');

        Route::post('themdapan','CauhoiController@themdapan');

        Route::get('xoacauhoi/{id}','CauhoiController@xoach');

        Route::get('exportPDF','CauhoiController@exportPDF');
        Route::get('export','ExcelController@ExportCauHoi');
        Route::get('import','CauhoiController@ImportCauHoi');
        Route::post('import','CauhoiController@import');

    });
    Route::get('chitiet/{id}','CauhoiController@getchitiet');
    Route::get('suacauhoi/{id}','CauhoiController@getsuach');
    Route::post('suacauhoi/{id}','CauhoiController@postsuach');

    Route::group(['prefix'=>'mucdo'], function(){
        Route::get('dsmucdo','MucdoController@getMucdo');

        Route::post('themmd','MucdoController@themmucdo');

        // Route::get('suamucdo/{$id}','MucdoController@suamucdo');

        Route::get('xoamucdo/{id}','MucdoController@xoamd');
        Route::get('exportmd','ExcelController@ExportMucDo');
        Route::get('importmd','MucdoController@importmd');
        Route::post('importmd','MucdoController@import');
    });
    Route::post('suamucdo/{id}','MucdoController@postsuamd');

    Route::group(['prefix'=>'dethi'], function(){
        Route::get('dsdethi','DethiController@getDethi');

        Route::get('export','ExcelController@ExportDeThi');

        Route::get('themdethi','DethiController@themdethi');
        Route::post('themdethi','DethiController@thempostdethi');

        Route::get('xoadethi/{id}','DethiController@xoade');

        Route::get('import','DethiController@getImport');
        Route::post('import','DethiController@importExcel');

    });

    Route::get('suadethi/{id}','DethiController@getsuade');
    Route::post('suadethi/{id}','DethiController@postsuade');

    Route::get('ctdethi/{id}','DethiController@getCtdethi');
    Route::post('randomcauhoi','DethiController@randomcauhoi');

    Route::get('suadethi','DethiController@suadethi');

    Route::group(['prefix'=>'ketqua'], function(){
        Route::get('dsketqua','KetQuaController@ketquathi_gv');
        Route::get('exportKetQua','ExcelController@exportKetQua');
        Route::get('exportPDF','KetQuaController@exportPDF');
    });



});



//khai báo đường dẫn có tên controller và gọi đến hàm getController đc viết trong Controller, @ là cú pháp bắt buộc
Route::get('controller','MyController@getController');

//truyền tham số vào controller
//tỉnh tổng stn và sth. stn,sth là tên 2 biến đc nhập trên thanh url và đc truyền vào trong hàm thamsoController trong MyController.php , thực thi câu lệnh tính tổng trong thamsoController()
Route::get('controller/{stn}/{sth}','MyController@thamsoController');

//gọi getView() trong MyController
Route::get('view','MyController@getView');

Route::get('cauhoi','CauhoiController@getCauhoi');
Route::get('themcauhoi','CauhoiController@getThemcauhoi');
Route::get('suacauhoi','CauhoiController@getSuacauhoi');

Route::get('loaicauhoi','MyController@getLoaicauhoi');

// +
