import { Modal} from "flowbite";

Livewire.on('modal', function (action, target) {
    const modal = new Modal(document.querySelector(target));

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
