<div class="confirm-modal modal fade" id="confirm-modal" tabindex="-1" aria-labelledby="confirm-modal-label" aria-hidden="true">
    <form id="deleteMenuForm" class="menu-delete modal-dialog" method="POST" action="{{route('cms.deleteMenu' , 'MENU_ID')}}">
        @csrf
        @method('delete')
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirm-modal-label">Delete Menu?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                If you confirm deleting this menu, all details, sub-menus, menu items will be lost.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-danger">Confirm</button>
            </div>
        </div>
    </form>
</div>

<script>
    const deleteMenuForm = document.getElementById("deleteMenuForm");

    // pass menu ID to modal, for deletion
    $('#confirm-modal').on('show.bs.modal', function(e) {

        //get data-id attribute of the clicked element
        const menuId = $(e.relatedTarget).data('menuid');
        console.log(menuId)

        deleteMenuForm.action = deleteMenuForm.action.replace('MENU_ID', menuId);
    });

</script>
