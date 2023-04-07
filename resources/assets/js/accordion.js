class Accordion {

    /**
     * @type {boolean}
     */
    inAnimation = false;

    /**
     * @type {jQuery}
     */
    container;

    /**
     * @type {AccordionItem[]}
     */
    elements = [];

    /**
     * @param {jQuery} container
     * @param {String?} open
     */
    constructor(container, open = null) {
        const self = this
        this.container = container

        this.elements = this.container.children()
            .map(function () {
                const control = $(this).find('*[data-target]')
                const target = $(`${control.data('target')}`)
                const height = target.height() + parseFloat(target.css('padding-top')) + parseFloat(target.css('padding-bottom'))
                const paddingTop = parseFloat(target.css('padding-top'))
                const paddingBottom = parseFloat(target.css('padding-bottom'))

                return new AccordionItem(
                    self,
                    control,
                    target,
                    new AccordionValues(height, paddingBottom, paddingTop),
                    new AccordionValues(height / 100, paddingBottom / 100, paddingTop / 100),
                    $(control.children()[1]),
                    open === control.data('target')
                )
            }).toArray()
    }

    /**
     * @param {AccordionItem} item
     */
    open(item) {
        if (this.inAnimation) return

        this.inAnimation = true
        const closeItem = this.elements.filter((e) => e !== item && e.open)[0]

        item.startOpen()
        if (closeItem) closeItem.startClose()

        const interval = setInterval(() => {
            item.openStep()
            if (closeItem) closeItem.closeStep()

            if (item.isOpenComplete() || (closeItem && closeItem.isCloseComplete())) {
                clearInterval(interval)
                this.inAnimation = false

                if (closeItem) closeItem.completeClose()
                item.completeOpen()
            }
        }, 1)
    }

    /**
     * @param {AccordionItem} item
     */
    close(item) {
        if (this.inAnimation) return

        this.inAnimation = true
        item.startClose()

        const interval = setInterval(() => {
            item.closeStep()

            if (item.isCloseComplete()) {
                clearInterval(interval)
                this.inAnimation = false
                item.completeClose()
            }
        }, 1)
    }

    /**
     * @param {jQuery} container
     */
    add(container) {
        const control = container.find('*[data-target]')
        const target = $(`${control.data('target')}`)
        const height = target.height() + parseFloat(target.css('padding-top')) + parseFloat(target.css('padding-bottom'))
        const paddingTop = parseFloat(target.css('padding-top'))
        const paddingBottom = parseFloat(target.css('padding-bottom'))

        const item = new AccordionItem(
            this,
            control,
            target,
            new AccordionValues(height, paddingBottom, paddingTop),
            new AccordionValues(height / 100, paddingBottom / 100, paddingTop / 100),
            $(control.children()[1]),
            false
        )

        this.elements.push(item)
    }

    /**
     * @param {AccordionItem} item
     */
    remove(item) {
        this.elements = this.elements.filter((e) => e !== item)
    }

}

class AccordionItem {

    /**
     * @type Accordion
     */
    parent;

    /**
     * @type {jQuery}
     */
    control;

    /**
     * @type {jQuery}
     */
    target;

    /**
     * @type {AccordionValues}
     */
    extended;

    /**
     * @type {AccordionValues}
     */
    steps;

    /**
     * @type {AccordionValues}
     */
    current;

    /**
     * @type {boolean}
     */
    open;

    /**
     * @type {jQuery}
     */
    indicator;

    constructor(parent, control, target, extended, steps, indicator, startOpen) {
        this.parent = parent
        this.control = control
        this.target = target
        this.extended = extended
        this.steps = steps
        this.current = open ? extended.clone() : new AccordionValues(0, 0, 0)
        this.open = startOpen
        this.indicator = indicator

        if (startOpen) {
            this.startOpen()
            this.completeOpen()
        } else {
            this.startClose()
            this.completeClose()
        }

        this.control.on('click', () => {
            if (this.open) this.parent.close(this)
            else this.parent.open(this)
        })

    }

    startOpen() {
        this.indicator.addClass('rotate-180')
    }

    openStep() {
        this.current.height += this.steps.height
        this.current.paddingTop += this.steps.paddingTop
        this.current.paddingBottom += this.steps.paddingBottom

        this._update()
    }

    completeOpen() {
        this.current.height = this.extended.height
        this.current.paddingTop = this.extended.paddingTop
        this.current.paddingBottom = this.extended.paddingBottom
        this.open = true

        this._update()
    }

    isOpenComplete() {
        return this.current.height >= this.extended.height
    }

    startClose() {
        this.indicator.removeClass('rotate-180')
    }

    closeStep() {
        this.current.height -= this.steps.height
        this.current.paddingTop -= this.steps.paddingTop
        this.current.paddingBottom -= this.steps.paddingBottom

        this._update()
    }

    completeClose() {
        this.current.height = 0
        this.current.paddingTop = 0
        this.current.paddingBottom = 0
        this.open = false

        this._update()
    }

    isCloseComplete() {
        return this.current.height <= 0
    }

    _update() {
        this.target.css('height', this.current.height)
        this.target.css('padding-top', this.current.paddingTop)
        this.target.css('padding-bottom', this.current.paddingBottom)
    }

}

class AccordionValues {

    /**
     * @type {number}
     */
    height;

    /**
     * @type {number}
     */
    paddingTop;

    /**
     * @type {number}
     */
    paddingBottom;

    constructor(height, paddingTop, paddingBottom) {
        this.height = height
        this.paddingTop = paddingTop
        this.paddingBottom = paddingBottom
    }

    clone() {
        return new AccordionValues(this.height, this.paddingTop, this.paddingBottom)
    }

}

document.addEventListener('DOMContentLoaded', function () {
    if ($('.html-editor').length > 0) return;

    window.accordions = $('.accordion-container').map(function () {
        return new Accordion($(this))
    }).toArray()
});

onHtmlEditorLoaded(() => {
    window.accordions = $('.accordion-container').map(function () {
        new Accordion($(this))
    }).toArray()
})

function getAccordionById(id) {
    return window.accordions.filter((e) => e.container.attr('id') === id)[0]
}

Livewire.on('accordion', (action, ...data) => {
    const accordion = getAccordionById(data[0])

    switch (action) {
        case 'open':
            accordion.open(accordion.elements.filter((e) => e.control.data('target') === data[1])[0])
            break
        case 'close':
            accordion.close(accordion.elements.filter((e) => e.control.data('target') === data[1])[0])
            break
        case 'add':
            accordion.add($(data[1]))
            break
        case 'remove':
            accordion.remove(accordion.elements.filter((e) => e.control.data('target') === data[1])[0])
            break
    }
})
