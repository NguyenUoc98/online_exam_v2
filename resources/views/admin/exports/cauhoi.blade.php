<table>
     <thead>
        <tr >
            <th>STT</th>
                   <tr >
                        <th>STT</th>
                        <th>Loại câu hỏi</th>
                        <th>Tên mức độ</th>
                        <th>Tên khối</th>
                        <th>Tên môn thi</th>
                        <th>Nội dung</th>
                        <th>A</th>
                        <th>B</th>
                        <th>C</th>
                        <th>D</th>
                        <th>Chi tiết</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                                                     
                </tr>
        
    </thead>
    <tbody>
    @foreach($data as $dt)
        <tr>
            <td>{{$dt->id_cauhoi}}</td>
            <td>{{$dt->loaich->tenloai}}</td>
            <td>{{$dt->mucdo->tenmd}}</td>
            <td>{{$dt->khoi->tenkhoi}}</td>
            <td>{{$dt->monthi->tenmh}}</td>
            <td>{{$dt->noidung}}</td>
            <td>{{$dt->a}}</td>
            <td>{{$dt->b}}</td>
            <td>{{$dt->c}}</td>
            <td>{{$dt->d}}</td>
        </tr>
    @endforeach
    </tbody>
</table>