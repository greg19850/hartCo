<div class="modal fade" id="confirm-event-delete" tabindex="-1" aria-labelledby="confirm-modal-label" aria-hidden="true">
    <form id="deleteEventForm" class="event-delete modal-dialog" method="POST" action="{{route('cms.deleteEvent' , 'EVENT_ID')}}">
        @csrf
        @method('delete')
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirm-modal-label">Delete Event?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                If you confirm deleting this event, all event details will be lost.
            </div>
            <div class="modal-footer">
                <div class="spinner-event-delete spinner-border" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
                <button type="button" class="cancel-btn btn btn-secondary ms-3" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="delete-btn btn btn-danger">Confirm</button>
            </div>
        </div>
    </form>
</div>

<script>
    const deleteEventForm = document.getElementById("deleteEventForm");
    const deleteBtn = deleteEventForm.querySelector(".delete-btn");
    const loadingSpinner = deleteEventForm.querySelector(".spinner-event-delete");

    // pass event ID to modal, for deletion
    $('#confirm-event-delete').on('show.bs.modal', function(e) {

        // get data - id attribute of the clicked element
        const eventId = $(e.relatedTarget).data('eventid');

        deleteEventForm.action = deleteEventForm.action.replace('EVENT_ID', eventId);
    });

    // pass menu ID to modal, for deletion
    $('#deleteEventForm').on('submit', function(e) {
        e.preventDefault()
        loadingSpinner.classList.add("active");
        deleteBtn.disabled = true;
        $(".cancel-btn").attr("disabled", true)

        setTimeout(function() {
            deleteEventForm.submit();
        }, 1000);
    });

</script>
