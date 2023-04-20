window.modal = {
    open: (modalId) => document.getElementById(modalId).dispatchEvent(new Event('modal-open')),
    close: (modalId) => document.getElementById(modalId).dispatchEvent(new Event('modal-close')),
    toggle: (modalId) => document.getElementById(modalId).dispatchEvent(new Event('modal-toggle'))
}

Livewire.on('modal', (action, target) => {
    switch (action) {
        case 'open':
        case 'show':
            modal.open(target);
            break;

        case 'close':
        case 'hide':
            modal.close(target);
            break;

        case 'toggle':
            modal.toggle(target);
            break;
    }
});
