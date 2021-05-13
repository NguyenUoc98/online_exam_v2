<!-- Achievements -->
<div class="bg-white mb-4 overflow-hidden rounded-2xl shadow">
    <div class="bg-orange-600">
        <div class="font-black p-10 text-4xl text-white">
            <i class="fa fa-trophy mx-2"></i>
            <span class="mb-0 mx-2 text-white">Lịch sử thi</span>
        </div>
    </div>

    <div class="p-5 text-2xl">
        <div class="card-body overflow-x-auto">
            <table class="table table-bordered">
                <thead class="bg-primary">
                    <tr>
                        <th class="text-white text-center">Môn thi</th>
                        <th class="text-white text-center">Mã đề</th>
                        <th class="text-white text-center">Thời gian thi(phút)</th>
                        <th class="text-white text-center">Số câu đúng</th>
                        <th class="text-white text-center">Điểm</th>
                        <th class="text-white text-center">Xếp loại</th>
                    </tr>
                </thead>
                <tbody class="list">
                @forelse($user->results as $history)
                    <tr>
                        <td scope="row" class="text-center">
                            <span>{{ $history->exam->subject->name }}</span>
                        </td>
                        <td class="text-center">
                            {{ $history->exam->id }}
                        </td>
                        <td class="text-center">
                            {{ $history->exam->time }}
                        </td>
                        <td class="text-center">
                            {{ $history->num_correct }}
                        </td>
                        <td class="text-center">
                            {{ $history->score }}
                        </td>
                        <td class="text-center">
                            {{ \App\Models\Result::ACADEMIC_POWER[$history->academic_power]['name'] }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">Không có dữ liệu</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>