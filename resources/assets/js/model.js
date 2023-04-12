import { Modal} from "flowbite";

const modals = {}

Livewire.on('modal', function (action, target) {
    const modal = target in modals ? modals[target] : modals[target] = new Modal(target, {
        backdrop: $(target).data('modal-backdrop'),
        placement: $(target).data('modal-placement'),
    });

    switch (action) {
        case 'show':
            modal.show();
            break;

        case 'hide':
            modal.hide();
            $('*[modal-backdrop=""]').remove();
            break;
    }
})
