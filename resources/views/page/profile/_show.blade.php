<div class="mb-4 overflow-auto rounded-2xl shadow-lg">
    <img src="/imgs/profile.png" alt="Image placeholder" class="rounded-t-2xl w-full">
    <div class="text-center bg-white p-10">
        <img src="{{ Voyager::image(auth()->user()->avatar) }}" class="mx-auto -mt-40 rounded-full shadow-2xl w-1/3">
        <div class="pb-10 pt-4">
            <h2 class="font-bold text-3xl">{{ $user->name }}</h2>
            <p>{{ $user->email }}</p>
        </div>
        <div class="flex justify-around mb-10">
            <div class="text-center">
                <p class="font-bold text-2xl uppercase">Đề đã làm</p>
                <span class="text-3xl text-gray-600">20</span>
            </div><div class="text-center">
                <p class="font-bold text-2xl uppercase">Điểm trung bình</p>
                <span class="text-3xl text-gray-600">8.33</span>
            </div><div class="text-center">
                <p class="font-bold text-2xl uppercase">Xếp loại</p>
                <span class="text-3xl text-gray-600">Khá</span>
            </div>
        </div>
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
                        {{ "$history->num_correct/{$history->exam->num_question}" }}
                    </td>
                    <td class="text-center">
                        {{ $history->score }}
                    </td>
                    <td class="text-center">
                        {{ \App\Models\Result::ACADEMIC_POWER[$history->academic_power]['name'] }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
