import 'swiper/css'
import Swiper, { Autoplay } from "swiper";

import 'swiper/css/autoplay'

window.swiper = {
    Swiper: Swiper,
    Autoplay: Autoplay,
};

Livewire.on('loadSwiper', (id, data) => {
    const options = {
        modules: [],
        direction: data.direction || 'horizontal',
        loop: data.loop || false,
        grabCursor: data.grabCursor || false,
        spaceBetween: data.spaceBetween || 30,
        slidesPerGroup: data.slidesPerGroup || 1,
    };

    if (data.breakpoints) {
        for (const breakpoint in data.breakpoints) {
            options.breakpoints = {
                [breakpoint]: {
                    slidesPerView: data.breakpoints[breakpoint].slidesPerView || 1,
                }
            }
        }
    }

    if (data.autoplay) {
        options.modules.push(Autoplay);
        options.autoplay = {
            delay: data.autoplay.delay || 3000,
            disableOnInteraction: data.autoplay.disableOnInteraction || false,
        }
    }

    new Swiper(id, options);
})
