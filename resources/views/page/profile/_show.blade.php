<div class="mb-4 overflow-auto rounded-2xl shadow-lg">
    <img src="/imgs/profile.png" alt="Image placeholder" class="rounded-t-2xl w-full">
    <div class="text-center bg-white">
        <img src="{{ Voyager::image(auth()->user()->avatar) }}" class="mx-auto -mt-40 rounded-full shadow-2xl w-1/3">
        <div class="pb-10 pt-4">
            <h2 class="font-bold text-3xl">{{ $user->name }}</h2>
            <p>{{ $user->email }}</p>
{{--            <a class="btn btn-danger mt-2 px-16" href="#edit-user" id="btn-show-edit-acc">--}}
{{--                Cập nhật tài khoản--}}
{{--            </a>--}}
        </div>
    </div>
</div>

{{--<script>--}}
{{--    $('#btn-show-edit-acc').click(function() {--}}
{{--        $('#edit-user').removeClass('hidden');--}}
{{--    });--}}
{{--</script>--}}
