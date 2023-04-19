<x-button.big.js
    :id="$id"
    :type="$type"
    :style="$style"
    :full-width="$fullWidth"
    action="window.modal.{{ $action}}('{{ $modal}}')">
    {{ $slot }}
</x-button.big.js>
