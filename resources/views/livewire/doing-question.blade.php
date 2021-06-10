<div>
    @foreach($questions as $question)
        <div class="content1 mt-12">
            <div id="question" class="content">
                <div>{{ $questions->currentPage() }} . {!! $question->content !!}</div>
            </div>

            <div class="grid grid-cols-2">
                @foreach($question->answers as $key=>$answer)
                    @php
                        $sellected = auth()->user()->answer($exam->id, $question->id)->first();
                        $answerSelected = $sellected ? $sellected->answer_selected : -1;
                    @endphp
                <label class="option m-1 @if($answerSelected == $answer->id) choosed @endif"
                       wire:click="$emit('selectAnswer', {{ $question->id }}, {{ $answer->id }})">
                    <span id="opt">{{ chr(65 + $key) }}. {!! $answer->answer !!}</span>
                </label>
                @endforeach
            </div>
        </div>

        <div class="md:flex justify-between items-center">
            {{ $questions->links() }}

            <div class="text-center @if($questions->currentPage() != $questions->lastPage()) hidden  @endif">
                <form id="doing_submit" action="{{ route('exam.save-result') }}" method="POST">
                    @csrf
                    <input type="hidden" name="exam_id" value="{{$exam->id}}">
                    <button type="submit"
                        class="bg-green-500 font-bold px-10 py-3 rounded-full text-white">
                        NỘP BÀI
                    </button>
                </form>
            </div>
        </div>
    @endforeach
</div>
