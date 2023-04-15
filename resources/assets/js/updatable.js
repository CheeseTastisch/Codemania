// MutationObserver  = window.MutationObserver || window.WebKitMutationObserver;
//
// const observer = new MutationObserver(function() {
//     $('*[data-time]').each(function() {
//         const element = $(this);
//         const startTime = element.data('time');
//
//         setTimeout(function() {
//             if (element.data('time') === startTime) element.remove();
//         }, 3000);
//     });
// });
//
// observer.observe(document, {
//     attributes: true,
//     subtree: true
// });
document.addEventListener('DOMContentLoaded', function () {
    onDomChange(function (list) {
        for (const mutation of list) {
            for (const added of mutation.addedNodes) {
                if (!(added instanceof Element)) continue

                const nodes = [added, ...added.querySelectorAll('*')]

                for (const node of nodes) {
                    if ('time' in node.dataset && !('scheduled' in node.dataset)) {
                        node.dataset.scheduled = true;
                        setTimeout(function () {
                            node.remove();
                        }, 3000);
                    }
                }
            }
        }
    });
})
