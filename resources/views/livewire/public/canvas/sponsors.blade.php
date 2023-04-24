<div class="container mx-auto flex justify-center">
    <div class="flex flex-col space-4">
        @foreach($contestDay->sponsors as $sponsor)
            <div>
                <img src="{{ route('public.file', $sponsor->logo_id) }}">
            </div>
        @endforeach
    </div>
</div>
