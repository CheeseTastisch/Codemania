import Toastify from 'toastify-js'

function showToast(text, duration, close, style) {
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

Livewire.on('showToast', (text, duration, close, style) => showToast(text, duration ?? 2500, close ?? false, style ?? 'success'));

window.showToast = showToast
