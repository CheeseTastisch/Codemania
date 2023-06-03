import Toastify from 'toastify-js'
import '../../css/global/toast.css'

function showToast(text, duration, close, style) {
    if (typeof text === 'object') {
        Toastify({
            text: text.text ?? '?',
            duration: text.duration ?? null,
            close: text.close ?? null,
            gravity: 'top',
            position: 'right',
            stopOnFocus: true,
            className: text.type ?? null,
        }).showToast()
    } else {
        Toastify({
            text: text,
            duration: duration,
            close: close,
            gravity: 'top',
            position: 'right',
            stopOnFocus: true,
            className: style,
        }).showToast()
    }
}

Livewire.on('showToast', (text, duration, close, style) => showToast(text, duration ?? 2500, close ?? false, style ?? 'success'));

window.showToast = showToast
