<script>
    document.addEventListener('DOMContentLoaded', function() {
        $('.faq-container').each(function () {
            const elements = $(this).children()
                .map(function () {
                    const control = $(this).find('*[data-target]')
                    const target = $(`${control.data('target')}`)

                    return {
                        control: control,
                        target: target,
                        fullHeight: target.height(),
                        stepHeight: target.height() / 100,
                        height: 0,
                        open: false,
                        indicator: control.children()[1]
                    }
                })

            elements.each(function () {
                console.log(this)

                const object = this
                object.target.css('height', 0)

                $(object.control).on('click', function () {
                    if (object.open) {
                        object.indicator.classList.remove('rotate-180')

                        const interval = setInterval(function () {
                            object.height -= object.stepHeight
                            object.target.css('height', object.height)

                            if (object.height <= 0) {
                                object.target.css('height', 0)
                                object.height = 0
                                object.open = false

                                clearInterval(interval)
                            }
                        }, 1)
                    } else {
                        object.indicator.classList.add('rotate-180')

                        const openObject = elements.filter(function () {
                            return this.open
                        })[0];

                        if (openObject !== undefined) {
                            openObject.indicator.classList.remove('rotate-180')
                        }

                        const interval = setInterval(function () {
                            object.height += object.stepHeight
                            object.target.css('height', object.height)

                            if (openObject !== undefined) {
                                openObject.height -= openObject.stepHeight
                                openObject.target.css('height', openObject.height)
                            }

                            if (object.height >= object.fullHeight || (openObject !== undefined && openObject.height <= 0)) {
                                object.target.css('height', object.fullHeight)
                                object.height = object.fullHeight
                                object.open = true

                                if (openObject !== undefined) {
                                    openObject.target.css('height', 0)
                                    openObject.height = 0
                                    openObject.open = false
                                }

                                clearInterval(interval)
                            }
                        }, 1)
                    }
                })
            });
        });
    });
</script>
