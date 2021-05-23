<div class="container lg:px-64 mt-20">
    <div class="loiich mb-1">
        <div class="camnhan mx-auto text-4xl md:w-1/3">
            <h3>BẢNG XẾP HẠNG</h3>
        </div>
    </div>
    <div class="overflow-x-scroll md:overflow-hidden">
        <table class="mt-10 table table-bordered">
            <thead class="bg-orange-400 text-2xl text-white">
            <th class="text-center">THỨ HẠNG</th>
            <th class="text-center" style="min-width: 195px;">HỌ VÀ TÊN</th>
            <th class="text-center">TỔNG ĐỀ ĐÃ LÀM</th>
            <th class="text-center">ĐIỂM TRUNG BÌNH</th>
            <th class="text-center">XẾP LOẠI</th>
            </thead>
            <tbody>
            @foreach($rankResults as $key => $result)
                @php
                    $user = \App\User::find($result['user_id']);
                    $academic_power = 0;
                    foreach (\App\Models\Result::ACADEMIC_POWER as $key1=> $item) {
                        if ($result['point'] > $item['min'] && $result['point'] <= $item['max']) {
                            $academic_power = $key1;
                            break;
                        }
                    }
                @endphp
                <tr class="bg-white">
                    <td class="text-center">{{ $key + 1 }}</td>
                    <td class="flex items-center">
                        <img class="h-16 mr-4 rounded-full" src="{{ Voyager::image($user->avatar) }}"> {{ $user->name }}
                    </td>
                    <td class="text-center">{{ $user->results()->groupBy('exam_id')->count() }}</td>
                    <td class="text-center">{{ $result['point'] }}</td>
                    <td class="text-center">{{ \App\Models\Result::ACADEMIC_POWER[$academic_power]['name'] }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="text-right">
        {{ $rankResults->links() }}
    </div>
</div>
