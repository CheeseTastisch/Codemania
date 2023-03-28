import Datepicker from 'flowbite-datepicker/Datepicker';

document.querySelectorAll('*[datepicker]').forEach((el) => {
    new Datepicker(el, {
        format: 'dd. mm. yyyy',
    });
});
