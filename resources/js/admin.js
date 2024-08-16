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
                    <div class='row'>
                        <div class="col-12 form-check mx-3 mt-2">
                            <input type="checkbox" name="is_vegan[]" class="form-check-input" type="checkbox" value="1"  id="veganCheck">
                            <label class="form-check-label" for="veganCheck">
                            Vegan?
                            </label>
                        </div>
                    </div>
                </div>
            </li>`;
    $('.menu-items-list').append(newMenuItem);

    if ($('.menu-items-list').children('li').length >= 1) {
        $('.submit-menu-items').show();
        $('.submit-menu-items').prop('disabled', true);
    }

    processMenuItems();
});


//  Remove items from menu items list
$('.menu-items-list').on('click', '.item-remove', function () {
    $(this).closest('li').remove();

    if ($('.menu-items-list').children('li').length === 0) {
        $('.submit-menu-items').hide();
    }

    processMenuItems();
});


// check if isVegan checkbox is checked and add appropriate value before posting form
$("#menu-items-form").submit(function () {

    var this_master = $(this);

    this_master.find('input[type="checkbox"]').each(function () {
        var checkbox_this = $(this);


        if (checkbox_this.is(":checked") == true) {
            checkbox_this.attr('value', '1');
        } else {
            checkbox_this.prop('checked', true);
            //DONT' ITS JUST CHECK THE CHECKBOX TO SUBMIT FORM DATA
            checkbox_this.attr('value', '0');
        }
    })
})


// Activate submit form button for menu items, based on all menu items names being filled out, or disable button if at least one name field is empty
function processMenuItems() {
    let allFilled = true;

    $('.menu-item-name').each(function() {
        if ($(this).val().trim() === '') {
            allFilled = false;
            $('.submit-menu-items').prop('disabled', true);
        }
    });

    if (allFilled) {
        $('.submit-menu-items').prop('disabled', false);
    }
}

processMenuItems();
$('.menu-items-list').on('input', '.menu-item-name', function() {
    processMenuItems();
});
