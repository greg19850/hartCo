const createMenuForm = document.getElementById("create-menu-form");
const formSubmitBtn = document.querySelector(".create-menu-btn");
const formCancelBtn = document.querySelector(".cancel-btn");
const loadingSpinner = document.querySelector(".spinner-border");
const addMenuModal = document.getElementById("add-menu-modal");
const menuNameInput = document.getElementById("menu_name");

const progressForm = (e) => {
    e.preventDefault();

    formSubmitBtn.disabled = true;
    formCancelBtn.disabled = true;
    loadingSpinner.classList.add("active");

    setTimeout(function () {
        createMenuForm.submit();
        formSubmitBtn.disabled = false;
        formCancelBtn.disabled = false;
        menuNameInput.value = "";
        loadingSpinner.classList.remove("active");
        const modalInstance = bootstrap.Modal.getOrCreateInstance(addMenuModal); // Get or create modal instance
        modalInstance.hide(); // Enable the submit button
    }, 2000);
};

createMenuForm.addEventListener("submit", progressForm);
