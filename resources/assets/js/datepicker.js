import Datepicker from 'flowbite-datepicker/Datepicker';
import de from 'flowbite-datepicker/locales/de';

Datepicker.locales.de = de.de;

window.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('*[datepicker]').forEach(function (element) {
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
    });
});
