@if($toast = session('toast'))
    <script>
        window.addEventListener('DOMContentLoaded', () => {
            window.showToast(
                '{!! $toast['text'] !!}',
                {{ intval($toast['duration'] ?? 2500) }},
                {{ ($toast['close'] ?? true) ? 'true' : 'false' }},
                '{{ $toast['type'] ?? 'success' }}'
            )
        });
    </script>
@endif
