import "./bootstrap";

const burgerBtn = document.querySelector(".menu-icon");
const closeMenuBtn = document.querySelector(".close-menu-btn ");
const menuOptions = document.querySelectorAll(".menuItem");


const openMenu = () => {
    document.querySelector(".nav-menu").classList.toggle("open");
};
const closeMenu = () => {
    document.querySelector(".nav-menu").classList.toggle("open");
};

burgerBtn.addEventListener("click", openMenu);
closeMenuBtn.addEventListener("click", closeMenu);

menuOptions.forEach((option) => {
    option.addEventListener("click", function () {
        closeMenu();
    });
});

// Embla menus carousel
const emblaNode = document.querySelector('.embla')
const viewportNode = emblaNode.querySelector('.embla__viewport')
const prevBtn = emblaNode.querySelector('.embla__button--prev')
const nextBtn = emblaNode.querySelector('.embla__button--next')

const options = {
    loop: true,
    align: 'start'
}
// const plugins = []

const emblaApi = EmblaCarousel(viewportNode, options)

const addTogglePrevNextBtnsActive = (emblaApi, prevBtn, nextBtn) => {
    const togglePrevNextBtnsState = () => {
        if (emblaApi.canScrollPrev()) prevBtn.removeAttribute('disabled')
        else prevBtn.setAttribute('disabled', 'disabled')

        if (emblaApi.canScrollNext()) nextBtn.removeAttribute('disabled')
        else nextBtn.setAttribute('disabled', 'disabled')
    }

    emblaApi
        .on('select', togglePrevNextBtnsState)
        .on('init', togglePrevNextBtnsState)
        .on('reInit', togglePrevNextBtnsState)

    return () => {
        prevBtn.removeAttribute('disabled')
        nextBtn.removeAttribute('disabled')
    }
}

const addPrevNextBtnsClickHandlers = (emblaApi, prevBtn, nextBtn) => {
    const scrollPrev = () => {
        emblaApi.scrollPrev()
    }
    const scrollNext = () => {
        emblaApi.scrollNext()
    }
    prevBtn.addEventListener('click', scrollPrev, false)
    nextBtn.addEventListener('click', scrollNext, false)

    const removeTogglePrevNextBtnsActive = addTogglePrevNextBtnsActive(
        emblaApi,
        prevBtn,
        nextBtn
    )

    return () => {
        removeTogglePrevNextBtnsActive()
        prevBtn.removeEventListener('click', scrollPrev, false)
        nextBtn.removeEventListener('click', scrollNext, false)
    }
}

const removePrevNextBtnsClickHandlers = addPrevNextBtnsClickHandlers(
    emblaApi,
    prevBtn,
    nextBtn
)

emblaApi.on('destroy', removePrevNextBtnsClickHandlers)


// Embla activities carousel
const emblaActivityNode = document.querySelector('.emblaActivities')
const viewportActivityNode = emblaActivityNode.querySelector('.embla__viewport')
const prevActivityBtn = emblaActivityNode.querySelector('.embla__button--prev')
const nextActivityBtn = emblaActivityNode.querySelector('.embla__button--next')
const dotsNode = emblaActivityNode.querySelector('.embla__dots')

const activityOptions = {
    loop: true,
    align: 'start'
}

const emblaActivityApi = EmblaCarousel(viewportActivityNode, activityOptions);

// Create Dots
const addDotBtnsAndClickHandlers = (emblaApi, dotsNode) => {
    let dotNodes = []

    const addDotBtnsWithClickHandlers = () => {
        dotsNode.innerHTML = emblaApi
            .scrollSnapList()
            .map(() => '<button class="embla__dot" type="button"></button>')
            .join('')

        const scrollTo = (index) => {
            emblaApi.scrollTo(index)
        }

        dotNodes = Array.from(dotsNode.querySelectorAll('.embla__dot'))
        dotNodes.forEach((dotNode, index) => {
            dotNode.addEventListener('click', () => scrollTo(index), false)
        })
    }

    const toggleDotBtnsActive = () => {
        const previous = emblaApi.previousScrollSnap()
        const selected = emblaApi.selectedScrollSnap()
        dotNodes[previous].classList.remove('embla__dot--selected')
        dotNodes[selected].classList.add('embla__dot--selected')
    }

    emblaApi
        .on('init', addDotBtnsWithClickHandlers)
        .on('reInit', addDotBtnsWithClickHandlers)
        .on('init', toggleDotBtnsActive)
        .on('reInit', toggleDotBtnsActive)
        .on('select', toggleDotBtnsActive)

    return () => {
        dotsNode.innerHTML = ''
    }
}

addDotBtnsAndClickHandlers(emblaActivityApi, dotsNode)

const addActivityTogglePrevNextBtnsActive = (emblaApi, prevBtn, nextBtn) => {
    const togglePrevNextBtnsState = () => {
        if (emblaApi.canScrollPrev()) prevBtn.removeAttribute('disabled')
        else prevBtn.setAttribute('disabled', 'disabled')

        if (emblaApi.canScrollNext()) nextBtn.removeAttribute('disabled')
        else nextBtn.setAttribute('disabled', 'disabled')
    }

    emblaApi
        .on('select', togglePrevNextBtnsState)
        .on('init', togglePrevNextBtnsState)
        .on('reInit', togglePrevNextBtnsState)

    return () => {
        prevBtn.removeAttribute('disabled')
        nextBtn.removeAttribute('disabled')
    }
}

const addActivityPrevNextBtnsClickHandlers = (emblaApi, prevBtn, nextBtn) => {
    const scrollPrev = () => {
        autoScrollPlugin.stop();
        emblaApi.scrollPrev();
        setTimeout(() => {
            autoScrollPlugin.play();
        }, 1000);
    }
    const scrollNext = () => {
        autoScrollPlugin.stop();
        emblaApi.scrollNext();
        setTimeout(() => {
            autoScrollPlugin.play();
        }, 1000);
    }
    prevBtn.addEventListener('click', scrollPrev, false)
    nextBtn.addEventListener('click', scrollNext, false)

    const removeActivityTogglePrevNextBtnsActive = addActivityTogglePrevNextBtnsActive(
        emblaApi,
        prevBtn,
        nextBtn
    )

    return () => {
        removeActivityTogglePrevNextBtnsActive()
        prevBtn.removeEventListener('click', scrollPrev, false)
        nextBtn.removeEventListener('click', scrollNext, false)
    }
}

const removeActivityPrevNextBtnsClickHandlers = addActivityPrevNextBtnsClickHandlers(
    emblaActivityApi,
    prevActivityBtn,
    nextActivityBtn,
)
const removeDotBtnsAndClickHandlers = addDotBtnsAndClickHandlers(
    emblaApi,
    dotsNode
)

emblaActivityApi.on('destroy', removeActivityPrevNextBtnsClickHandlers)
emblaActivityApi.on('destroy', removeDotBtnsAndClickHandlers)



// Embla events carousel
const emblaEventNode = document.querySelector('.emblaEvents')
const viewportEventNode = emblaEventNode.querySelector('.embla__viewport')
const prevEventBtn = emblaEventNode.querySelector('.embla__button--prev')
const nextEventBtn = emblaEventNode.querySelector('.embla__button--next')

const eventOptions = {
    loop: true,
    align: 'start'
}
const plugins = [EmblaCarouselAutoScroll({
    stopOnMouseEnter: true,
    stopOnInteraction: false,
    speed: 1,
    breakpoints: {
        '(max-width: 768px)': {
            speed: 1
        }
    }
})]

const emblaEventApi = EmblaCarousel(viewportEventNode, eventOptions, plugins);
const autoScrollPlugin = plugins[0];


const addEventTogglePrevNextBtnsActive = (emblaApi, prevBtn, nextBtn) => {
    const togglePrevNextBtnsState = () => {
        if (emblaApi.canScrollPrev()) prevBtn.removeAttribute('disabled')
        else prevBtn.setAttribute('disabled', 'disabled')

        if (emblaApi.canScrollNext()) nextBtn.removeAttribute('disabled')
        else nextBtn.setAttribute('disabled', 'disabled')
    }

    emblaApi
        .on('select', togglePrevNextBtnsState)
        .on('init', togglePrevNextBtnsState)
        .on('reInit', togglePrevNextBtnsState)

    return () => {
        prevBtn.removeAttribute('disabled')
        nextBtn.removeAttribute('disabled')
    }
}

const addEventPrevNextBtnsClickHandlers = (emblaApi, prevBtn, nextBtn) => {
    const scrollPrev = () => {
        autoScrollPlugin.stop();
        emblaApi.scrollPrev();
        setTimeout(() => {
            autoScrollPlugin.play();
        }, 1000);
    }
    const scrollNext = () => {
        autoScrollPlugin.stop();
        emblaApi.scrollNext();
        setTimeout(() => {
            autoScrollPlugin.play();
        }, 1000);
    }
    prevBtn.addEventListener('click', scrollPrev, false)
    nextBtn.addEventListener('click', scrollNext, false)

    const removeEventTogglePrevNextBtnsActive = addEventTogglePrevNextBtnsActive(
        emblaApi,
        prevBtn,
        nextBtn
    )

    return () => {
        removeEventTogglePrevNextBtnsActive()
        prevBtn.removeEventListener('click', scrollPrev, false)
        nextBtn.removeEventListener('click', scrollNext, false)
    }
}

const removeEventPrevNextBtnsClickHandlers = addEventPrevNextBtnsClickHandlers(
    emblaEventApi,
    prevEventBtn,
    nextEventBtn,
)

emblaEventApi.on('destroy', removeEventPrevNextBtnsClickHandlers)

