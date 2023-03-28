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

window.showToast = showToast
