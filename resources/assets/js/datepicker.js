import Datepicker from 'flowbite-datepicker/Datepicker';
import de from 'flowbite-datepicker/locales/de';

Datepicker.locales.de = de.de;

window.addEventListener('DOMContentLoaded', function () {
    $('*[datepicker]').map(function () {
        return {
            datepicker: new Datepicker(this, {
                language: 'de',
                todayBtn: 'linked',
                clearBtn: true,
            }),
            element: this,
        };
    }).each(function () {
        const value = $(this.element).val();
        if(value) {
            const split = value.split('.');
            const day = split[0];
            const month = split[1];
            const year = split[2];
            this.datepicker.setDate(new Date(`${year}-${month}-${day}`));
        }

        $(this.element).on('changeDate', function () {
            this.dispatchEvent(new Event('input'))
        })
    });
});
