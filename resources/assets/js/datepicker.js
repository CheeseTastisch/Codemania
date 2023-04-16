import Datepicker from 'flowbite-datepicker/Datepicker';
import de from 'flowbite-datepicker/locales/de';

Datepicker.locales.de = de.de;

function createPicker(element) {
    element.dataset.create = 'true';

    const datepicker = new Datepicker(element, {
        language: 'de',
        todayBtn: 'linked',
        clearBtn: true,
        todayHighlight: true,
    });

    const value = element.value;
    if(value) {
        const split = value.split('.');
        const day = split[0];
        const month = split[1];
        const year = split[2];
        datepicker.setDate(new Date(`${year}-${month}-${day}`));
    }

    element.addEventListener('changeDate', function () {
        element.dispatchEvent(new Event('input'))
    });
}

window.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('*[datepicker]').forEach((element) => createPicker(element));

    onDomChange(function(list) {
        for (const mutation of list) {
            for (const added of mutation.addedNodes) {
                if (!(added instanceof Element)) continue

                const nodes = [added, ...added.querySelectorAll('*')]

                for (const node of nodes) {
                    if (node.hasAttribute('datepicker') && !node.dataset.create) createPicker(node)
                }
            }
        }
    });
});
