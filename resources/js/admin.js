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
if (createMenuForm) {
    createMenuForm.addEventListener("submit", progressForm);
}

// Hide menu items submit button
$('.submit-menu-items').hide();

// Adding menu items to list
$(".add-menu-item-btn").on('click', function () {
    let newMenuItem = `
            <li class="menu-item mb-4">
                <div class="row">
                    <div class="col">
                        <input type="text" name='name[]' class="form-control menu-item-name" placeholder="Item name" aria-label="Item name">
                    </div>
                    <div class="col">
                        <input type="text" name='description[]' class="form-control menu-item-description" placeholder="Item description (optional)" aria-label="Item description">
                    </div>
                    <div class="col">
                        <input type="number" name="price[]" step="0.01" class="form-control menu-item-price" placeholder="Item price (optional)" aria-label="Item price">
                    </div>
                    <div class="item-remove col-1">
                        <i class="bi bi-file-minus"></i>
                    </div>
                    <div class="col-12 form-check mx-3 mt-2">
                        <input type="checkbox" name="is_vegan[]" class="form-check-input" type="checkbox" id="veganCheck">
                        <label class="form-check-label" for="veganCheck">
                            Vegan?
                        </label>
                    </div>
                </div>
            </li>`;
    $('.menu-items-list').append(newMenuItem);

    if ($('.menu-items-list').children('li').length >= 1) {
        $('.submit-menu-items').show();
    }
});


//  Remove items from menu items list
$('.menu-items-list').on('click', '.item-remove', function () {
    $(this).closest('li').remove();

    if ($('.menu-items-list').children('li').length === 0) {
        $('.submit-menu-items').hide();
    }
});

