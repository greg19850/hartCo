@extends('layouts.cmsLayout')

@section('content')
<input type="hidden" id="menu_rule_body" class="menu-rule-body" value="{{ $rule->body }}">
<form id='edit_rules_form' name='edit_rules_form' class="edit-rules-form" method="POST" action="{{route('cms.updateMenuRules' , ['menuId' => $menuId, 'ruleId' => $rule->id])}}">
    @csrf
    <div class="">
        <div class="edit-rule-header">
            <h1 class="title fs-5">Update Menu Rules</h1>
        </div>
        <hr />
        <div class="form-group pb-2" @error('rule_data') is-invalid @enderror>
            <textarea id="summernoteEdit" name="rule_data"></textarea>
        </div>

        <div class="edit-rule-footer d-flex align-items-center justify-content-between">
            <div class="px-2">
                @error('rule_data')
                <small class="pt-1" style="color: red">{{ $message }}</small>
                @enderror
            </div>
            <div class="controls d-flex align-items-center">
                <div class="spinner-rule spinner-border me-3" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
                <a href="{{route('cms.editMenu', $menuId)}}" class="btn cancel-btn btn-secondary me-3">Cancel</a>
                <button type="submit" class="btn submit-rule-btn btn-primary">Update Rules</button>
            </div>
        </div>
    </div>
</form>

<script>
    $(document).ready(function() {
        let ruleBody = $('#menu_rule_body').val();

        $('#summernoteEdit').summernote({
            placeholder: 'Write your menu rules here',
            tabsize: 2,
            height: 200,
            lineHeights: ['0.2', '0.5', '1.0', '1.2', '1.5', '2.0', '3.0'],
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontname', ['fontname']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']], , ['table', ['table']],
                ['insert', ['link']],
                ['height', ['height']],
                ['view', ['help']]
            ]
        });

        $("#summernoteEdit").summernote('code', ruleBody);
    });



    const form = document.getElementById('edit_rules_form')
    const spinner = document.querySelector('.spinner-rule')
    const submitBtn = document.querySelector('.submit-rule-btn')
    const cancelRuleBtn = document.querySelector('.cancel-btn')

    const updateRules = (e) => {
        e.preventDefault()

        spinner.classList.add('active')
        submitBtn.disabled = true
        cancelRuleBtn.disabled = true

        //let markupStr = $('#summernote').summernote('code');

        setTimeout(function() {
            form.submit();
        }, 500);

    }

    form.addEventListener('submit', updateRules)
</script>
@endsection