const createMenuForm = document.getElementById("create-menu-form");
const formSubmitBtn = document.querySelector(".create-menu-btn");
const formCancelBtn = document.querySelector(".cancel-btn");
const loadingSpinner = document.querySelector(".spinner-add-menu");
const addMenuModal = document.getElementById("add-menu-modal");
const menuNameInput = document.getElementById("menu_name");

const progressForm = (e) => {
    e.preventDefault();

    formSubmitBtn.disabled = true;
    formCancelBtn.disabled = true;
    loadingSpinner.classList.add("active");

    setTimeout(function () {
        createMenuForm.submit();
    }, 1000);
};

createMenuForm.addEventListener("submit", progressForm);
