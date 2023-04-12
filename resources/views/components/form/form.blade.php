@if($form)
    <form action="#" class="{{ $margin }} {{ $space }}">
        {{ $slot }}
    </form>
@else
    <div class="{{ $margin }} {{ $space }}">
        {{ $slot }}
    </div>
@endif
