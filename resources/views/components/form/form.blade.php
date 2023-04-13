@if($form)
    <form action="#" class="{{ $space }}">
        {{ $slot }}
    </form>
@else
    <div class="{{ $space }}">
        {{ $slot }}
    </div>
@endif
