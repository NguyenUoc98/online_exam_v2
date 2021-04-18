<div>
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5">
        @forelse($exams as $exam)
            <a href="{{ route('exam.show', $exam->id) }}" class="hover:text-black lg:px-5 mb-5 md:px-3 px-1 xl-px-10">
                <div class="dethi h-full hover:shadow-2xl mx-auto overflow-hidden">
                    <img src="{{ Voyager::image($exam->subject->image) }}" class="h-64 lg:h-96 w-full">
                    <div class="bg-white h-full p-4">
                        <p class="font-bold text-4xl">{{ $exam->subject->name }}</p>
                        <p class="title">Đề thi {{ $semester->name }}
                            gồm {{ $exam->num_question }} câu, thời gian
                            thi {{ $exam->time }} phút</p>
                        <p class="danhgia">
                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                class="fas fa-star"></i><i class="fas fa-star"></i><i
                                class="far fa-star"></i>
                            <i class="fas fa-users hscmt"></i> 134
                        </p>
                    </div>
                </div>
            </a>
        @empty
            <div class="bg-gray-200 col-span-5 flex h-60 items-center justify-center mt-2 w-full">
                Không có nội dung
            </div>
        @endforelse
    </div>
    <div class="text-center">
        {{ $exams->links() }}
    </div>
</div>

