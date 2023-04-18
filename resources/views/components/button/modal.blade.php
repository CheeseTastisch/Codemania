<x-button.js
    :id="$id"
    :type="$type"
    :style="$style"
    action="window.modal.{{ $action}}('{{ $modal}}')">
    {{ $slot }}
</x-button.js>
