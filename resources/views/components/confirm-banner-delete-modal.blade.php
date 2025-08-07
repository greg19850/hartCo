<div class="modal fade" id="confirm-banner-delete" tabindex="-1" aria-labelledby="confirm-banner-modal-label" aria-hidden="true">
    <form id="deleteBannerForm" class="banner-delete modal-dialog" method="POST" action="{{route('cms.deleteEventBanner' , 'BANNER_ID')}}">
        @csrf
        @method('delete')
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirm-banner-modal-label">Delete Event Banner?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                If you confirm deleting this event banner, all banner details will be lost.
            </div>
            <div class="modal-footer">
                <div class="spinner-banner-delete spinner-border" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
                <button type="button" class="cancel-btn btn btn-secondary ms-3" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="delete-btn btn btn-danger">Confirm</button>
            </div>
        </div>
    </form>
</div>

<script>
    const deleteBannerForm = document.getElementById("deleteBannerForm");
    const deleteBannerBtn = deleteBannerForm.querySelector(".delete-btn");
    const loadingBannerSpinner = deleteBannerForm.querySelector(".spinner-banner-delete");

    // pass banner ID to modal, for deletion
    $('#confirm-banner-delete').on('show.bs.modal', function(e) {

        // get data - id attribute of the clicked element
        const bannerId = $(e.relatedTarget).data('bannerid');

        deleteBannerForm.action = deleteBannerForm.action.replace('BANNER_ID', bannerId);
    });

    // pass banner ID to modal, for deletion
    $('#deleteBannerForm').on('submit', function(e) {
        e.preventDefault()
        loadingBannerSpinner.classList.add("active");
        deleteBannerBtn.disabled = true;
        $(".cancel-btn").attr("disabled", true)

        setTimeout(function() {
            deleteBannerForm.submit();
        }, 1000);
    });

</script>