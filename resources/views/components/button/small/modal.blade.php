<x-button.small.js
    :id="$id"
    :type="$type"
    :style="$style"
    action="window.modal.{{ $action}}('{{ $modal}}')">
    {{ $slot }}
</x-button.small.js>
