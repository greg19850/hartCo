import "./bootstrap";

// up and down arrows to scroll page
const upArrow = document.querySelector(".heart-up-icon");
const downArrow = document.querySelector(".heart-down-icon");

const burgerBtn = document.querySelector(".menu-icon");
const closeMenuBtn = document.querySelector(".close-menu-btn ");

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
