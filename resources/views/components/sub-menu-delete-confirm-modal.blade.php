<div class="sub-menu-delete-confirm-modal modal fade" id="sub-menu-delete-confirm-modal" tabindex="-1" aria-labelledby="sub-menu-delete-confirm-modal-label" aria-hidden="true">
    <form id="subMenuDeleteForm" class="menu-delete modal-dialog" method="POST" action="{{route('cms.deleteMenuCategory', ['menuId' => $subMenu->menu_id, 'subMenuId' => $subMenu->id])}}">
        @csrf
        @method('delete')
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="sub-menu-delete-confirm-modal-label">Delete Menu?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{$deleteText}}
            </div>
            <div class="modal-footer">
                <div class="spinner-sub-menu-delete spinner-border" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
                <button type="button" class="cancel-sub-menu-btn btn btn-secondary ms-3" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="sub-menu-delete-btn btn btn-danger">Confirm</button>
            </div>
        </div>
    </form>
</div>

<script>
    const deleteSubMenuForm = document.getElementById("subMenuDeleteForm");
    const deleteSubMenuBtn = deleteSubMenuForm.querySelector(".sub-menu-delete-btn");
    const loadingSubMenuSpinner = deleteSubMenuForm.querySelector(".spinner-sub-menu-delete");

    // pass menu ID to modal, for deletion
    $('#subMenuDeleteForm').on('submit', function(e) {
        e.preventDefault()
        loadingSubMenuSpinner.classList.add("active");
        deleteSubMenuBtn.disabled = true;
        $(".cancel-sub-menu-btn").attr("disabled", true)

        setTimeout(function() {
            deleteSubMenuForm.submit();
        }, 1000);
    });

</script>
