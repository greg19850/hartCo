import "./bootstrap";

// up and down arrows to scroll page
const upArrow = document.querySelector(".heart-up-icon");
const downArrow = document.querySelector(".heart-down-icon");

const burgerBtn = document.querySelector(".menu-icon");
const closeMenuBtn = document.querySelector(".close-menu-btn ");
const menuOptions = document.querySelectorAll(".menuItem");

const showArrow = () => {
    if (window.scrollY >= window.innerHeight) {
        upArrow.classList.add("active");
    } else {
        upArrow.classList.remove("active");
    }
};

const openMenu = () => {
    document.querySelector(".nav-menu").classList.toggle("open");
};
const closeMenu = () => {
    document.querySelector(".nav-menu").classList.toggle("open");
};

const scrollBeyondBanner = () => {
    console.log(window.innerHeight);
    window.scrollBy(0, window.innerHeight);
};
const scrollToTop = () => {
    window.scrollBy(0, -window.scrollY);
};

document.addEventListener("scroll", showArrow);
downArrow.addEventListener("click", scrollBeyondBanner);
upArrow.addEventListener("click", scrollToTop);

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


// Embla events carousel
const emblaEventNode = document.querySelector('.emblaEvents')
const viewportEventNode = emblaEventNode.querySelector('.embla__viewport')
const prevEventBtn = emblaEventNode.querySelector('.embla__button--prev')
const nextEventBtn = emblaEventNode.querySelector('.embla__button--next')

const eventOptions = {
    loop: true,
}
// const plugins = [EmblaCarouselAutoScroll({
//     stopOnMouseEnter: true,
//     // stopOnInteraction: false,
//     speed: 1,
//     breakpoints: {
//         '(max-width: 768px)': {
//             speed: 1
//         }
//     }
// })]

const emblaEventApi = EmblaCarousel(viewportEventNode, eventOptions)

const addTogglePrevNextBtnsActiveEvent = (emblaApi, prevBtn, nextBtn) => {
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

const addPrevNextBtnsClickHandlersEvent = (emblaApi, prevBtn, nextBtn) => {
    const scrollPrev = () => {
        emblaApi.scrollPrev()
    }
    const scrollNext = () => {
        emblaApi.scrollNext()
    }
    prevBtn.addEventListener('click', scrollPrev, false)
    nextBtn.addEventListener('click', scrollNext, false)

    const removeTogglePrevNextBtnsActive = addTogglePrevNextBtnsActiveEvent(
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

const removePrevNextBtnsClickHandlersEvent = addPrevNextBtnsClickHandlersEvent(
    emblaEventApi,
    prevEventBtn,
    nextEventBtn
)

emblaEventApi.on('destroy', removePrevNextBtnsClickHandlersEvent)

// Creating map options
var mapOptions = {
    center: [52.289340, -1.537646],
    zoom: 18
}


// Creating a map object
var map = new L.map('map', mapOptions);

// Creating a Layer object
var layer = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');

// Adding layer to the map
map.addLayer(layer);

// Icon options
var iconOptions = {
    iconUrl: '/images/hart logo.png',
    iconSize: [30, 30]
}

// Creating a custom icon
var customIcon = L.icon(iconOptions);

// Options for the marker
var markerOptions = {
    icon: customIcon
}

// Creating marker
var marker = new L.Marker([52.289368, -1.537606], markerOptions);

marker.bindPopup('Hart + Co').openPopup();

// Adding marker to the map
marker.addTo(map);

