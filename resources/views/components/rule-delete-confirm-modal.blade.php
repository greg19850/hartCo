<div class="rule-delete-confirm-modal modal fade" id="rule-delete-confirm-modal" tabindex="-1" aria-labelledby="rule-delete-confirm-modal-label" aria-hidden="true">
    <form id="ruleDeleteForm" class="menu-delete modal-dialog" method="POST" action="{{route('cms.deleteMenuRules', ['menuId' => $rule->menu_id, 'ruleId' => $rule->id])}}">
        @csrf
        @method('delete')
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="rule-delete-confirm-modal-label">Delete Menu?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{$deleteText}}
            </div>
            <div class="modal-footer">
                <div class="spinner-rule-delete spinner-border" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
                <button type="button" class="cancel-rule-btn btn btn-secondary ms-3" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="rule-delete-btn btn btn-danger">Confirm</button>
            </div>
        </div>
    </form>
</div>

<script>
    const deleteRuleForm = document.getElementById("ruleDeleteForm");
    const deleteRuleBtn = deleteRuleForm.querySelector(".rule-delete-btn");
    // const cancelBtn = deleteMenuForm.querySelector(".delete-btn");
    const loadingRuleSpinner = deleteRuleForm.querySelector(".spinner-rule-delete");

    // pass menu ID to modal, for deletion
    $('#ruleDeleteForm').on('submit', function(e) {
        e.preventDefault()
        loadingRuleSpinner.classList.add("active");
        deleteRuleBtn.disabled = true;
        $(".cancel-rule-btn").attr("disabled", true)

        setTimeout(function() {
            deleteRuleForm.submit();
        }, 1000);
    });

</script>
