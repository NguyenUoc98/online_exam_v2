<div class="mb-4 overflow-auto rounded-2xl shadow-lg">
    <img src="/imgs/profile.png" alt="Image placeholder" class="rounded-t-2xl w-full">
    <div class="text-center bg-white p-10">
        <img src="{{ Voyager::image(auth()->user()->avatar) }}" class="mx-auto -mt-40 rounded-full shadow-2xl w-1/3">
        <div class="pb-10 pt-4 mb-10 border-b">
            <h2 class="font-bold text-3xl">{{ $user->name }}</h2>
            <p>{{ $user->email }}</p>
        </div>

        @php
            $academic_power = 0;
            $point = $histories->avg('score');
            $rank = $user->getRank();
            foreach (\App\Models\Result::ACADEMIC_POWER as $key => $item) {
                if ($point > $item['min'] && $point <= $item['max']) {
                    $academic_power = $key;
                    break;
                }
            }
        @endphp

        @if($rank['rank'] < 11)
            @if($rank['rank'] == 1)
                <img class="pb-2 mx-auto" style="width:250px" src="/imgs/ranks/10.png">
            @elseif($rank['rank'] == 2)
                <img class="pb-2 mx-auto" style="width:250px" src="/imgs/ranks/20.png">
            @elseif($rank['rank'] == 3)
                <img class="pb-2 mx-auto" style="width:250px" src="/imgs/ranks/30.png">
            @else
                <img class="pb-2 mx-auto" style="width:250px" src="/imgs/ranks/top-10.jpg">
            @endif
            <h2 class="text-center text-5xl text-danger px-10 pb-10">Chúc mừng bạn đã đạt top #{{ $rank['rank'] }}</h2>
        @elseif($rank['rank'] >= $rank['total'] / 2 - 1)
            <img class="pb-2 mx-auto" style="width:250px" src="/imgs/ranks/top-bot.jpg">
            <h4 class="text-center text-2xl text-danger px-10 pb-10">Bạn đang thuộc nửa dưới bảng xếp hạng.<br>Cố gắng lên nhé!</h4>
        @else
            <img class="pb-2 mx-auto" style="width:250px" src="/imgs/ranks/top-on.jpg">
            <h4 class="text-center text-2xl text-danger px-10 pb-10">Bạn đang thuộc nửa trên bảng xếp hạng.<br>Tiếp tục cố gắng hơn nữa nhé!</h4>
        @endif

        <table class="table table-bordered">
            <thead>
                <th class="text-center bg-primary text-white">Tiêu chí</th>
                <th class="text-center bg-primary text-white">Số lượng</th>
            </thead>
            @foreach(\App\Models\Result::ACADEMIC_POWER as $key=>$academicPower)
                <tr>
                    <th>Xếp loại {{ strtolower($academicPower['name']) }}</th>
                    <td class="text-center">{{ $academics[$key] ?? 0 }}</td>
                </tr>
            @endforeach
            <tr>
                <th >Tổng đề đã làm</th>
                <td class="text-center">{{ $histories->groupBy('exam_id')->count() }}</td>
            </tr>
            <tr>
                <th >Điểm trung bình</th>
                <td class="text-center">{{ $point }}</td>
            </tr>
            <tr>
                <th >Xếp loại</th>
                <td class="text-center">{{ \App\Models\Result::ACADEMIC_POWER[$academic_power]['name'] }}</td>
            </tr>
            <tr>
                <th >Xếp hạng</th>
                <td class="text-center">{{ "{$rank['rank']}/{$rank['total']}" }}</td>
            </tr>
        </table>
    </div>
</div>
