<table>
     <thead>
        <tr >
            <th>STT</th>
                    <th>Mã đề</th>
                     <th>Tên kỳ thi</th>
                     <th>Thời gian thi</th>
                     <th>Ngày thi</th>
                     <th>Tên khối</th>
                     <th>Tên môn</th>
                     <th>Tên giáo viên</th>
                     <th>Số câu</th>
                     <th>Ngày ra đề</th>
                     <th>Trạng thái</th>                    
                </tr>
        
    </thead>
    <tbody>
    @foreach($data as $dt)
        <tr>
            <td>{{$dt->id_de}}</td>
            <td>{{$dt->id_de}}</td>
            <td>{{$dt->kythi->tenky}}</td>
            <td>{{$dt->thoigianthi}} phút</td>
            <td>{{$dt->ngaythi}}</td>
            <td>{{$dt->khoi->tenkhoi}}</td>
            <td>{{$dt->monthi->tenmh}}</td>
            <td>{{$dt->giaovien->hoten}}</td>
            <td>{{$dt->socau}} câu</td>
            <td>{{$dt->ngayrade}}</td>
            <td>{{$dt->trangthai}}</td>
        </tr>
    @endforeach
    </tbody>
</table>