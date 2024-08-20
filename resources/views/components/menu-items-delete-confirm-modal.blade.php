<div class="menu-items-delete-confirm-modal modal fade" id="menu-items-delete-confirm-modal" tabindex="-1" aria-labelledby="menu-items-delete-confirm-modal-label" aria-hidden="true">
    <form id="menuItemsDeleteForm" class="menu-items-delete modal-dialog" method="POST" action="{{route('cms.resetMenuItems', ['menuId' => $subMenu->menu_id, 'subMenuId' => $subMenu->id])}}">
        @csrf
        @method('delete')
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="menu-items-delete-confirm-modal-label">Delete Menu?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{$deleteText}}
            </div>
            <div class="modal-footer">
                <div class="spinner-menu-items-delete spinner-border" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
                <button type="button" class="cancel-menu-items-btn btn btn-secondary ms-3" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="menu-items-delete-btn btn btn-danger">Confirm</button>
            </div>
        </div>
    </form>
</div>

<script>
    const deleteMenuItemsForm = document.getElementById("menuItemsDeleteForm");
    const deleteMenuItemsuBtn = deleteMenuItemsForm.querySelector(".menu-items-delete-btn");
    const loadingSubMenuSpinner = deleteMenuItemsForm.querySelector(".spinner-menu-items-delete");

    // pass menu ID to modal, for deletion
    $('#subMenuDeleteForm').on('submit', function(e) {
        e.preventDefault()
        loadingSubMenuSpinner.classList.add("active");
        deleteSubMenuBtn.disabled = true;
        $(".cancel-menu-items-btn").attr("disabled", true)

        setTimeout(function() {
            deleteSubMenuForm.submit();
        }, 1000);
    });

</script>
