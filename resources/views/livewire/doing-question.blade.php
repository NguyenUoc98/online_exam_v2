<div>
    @foreach($questions as $question)
        <div class="content1 mt-12">
            <div id="question" class="content">
                <div>{{ $questions->currentPage() }} . {!! $question->content !!}</div>
            </div>

            <div class="grid grid-cols-2">
                <label class="option m-1 @if($answerSelected == 'A') choosed @endif"
                       wire:click="$emit('selectAnswer', {{ $question->id }}, 'A')">
                    <span id="opt">A. {!! $question->answer_a !!}</span>
                </label>
                <label class="option m-1 @if($answerSelected == 'B') choosed @endif"
                       wire:click="$emit('selectAnswer', {{ $question->id }}, 'B')">
                    <span id="opt">B. {!! $question->answer_b !!}</span>
                </label>
                @if($question->typeQuestion->id != 4)
                    <label class="option m-1 @if($answerSelected == 'C') choosed @endif"
                           wire:click="$emit('selectAnswer', {{ $question->id }}, 'C')">
                        <span id="opt">C. {!! $question->answer_c !!}</span>
                    </label>
                    <label class="option m-1 @if($answerSelected == 'D') choosed @endif"
                           wire:click="$emit('selectAnswer', {{ $question->id }}, 'D')">
                        <span id="opt">D. {!! $question->answer_d !!}</span>
                    </label>
                @endif
            </div>
        </div>

        <div class="md:flex justify-between items-center">
            {{ $questions->links() }}

            @if($questions->currentPage() == $questions->lastPage())
                <div class="text-center">
                    <a href="{{ route('exam.result', $exam->id) }}"
                       class="bg-green-500 font-bold px-10 py-3 rounded-full text-white">
                        NỘP BÀI
                    </a>
                </div>
            @endif
        </div>
    @endforeach
</div>
