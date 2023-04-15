MutationObserver  = window.MutationObserver || window.WebKitMutationObserver;

const listeners = [];

const observer = new MutationObserver(function(mutation, observer) {
    listeners.forEach(listener => listener(mutation, observer));
});

observer.observe(document, {
    attributes: true,
    subtree: true,
    childList: true,
    characterData: true,
    attributeOldValue: true,
    characterDataOldValue: true
});

window.onDomChange = function(listener) {
    listeners.push(listener);
};
