MutationObserver  = window.MutationObserver || window.WebKitMutationObserver;

const observer = new MutationObserver(function() {
    $('*[data-time]').each(function() {
        const element = $(this);
        const startTime = element.data('time');

        setTimeout(function() {
            if (element.data('time') === startTime) element.remove();
        }, 3000);
    });
});

observer.observe(document, {
    attributes: true,
    subtree: true
});
