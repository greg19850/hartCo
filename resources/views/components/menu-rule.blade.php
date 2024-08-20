<div id="{{ $rule->position }}">
    <div id="single_menu_rule" class="single-menu-rule mt-2 p-3">
        @csrf
        @method('delete')
        <div id="content" class="rule-content d-flex align-items-center">
            <!-- <div class="handle me-3"><i class="bi bi-arrows-expand"></i></div> -->
            {!!$rule->body!!}
        </div>
        <div class="controls">
            <a href="{{route('cms.editMenuRulesForm', ['menuId' => $rule->menu_id, 'ruleId' => $rule->id])}}" class="btn edit-rule btn-warning"><i class="bi bi-pencil-square"></i></a>
{{--            <button type="submit" class="btn remove-rule btn-danger"><i class="bi bi-trash3"></i></button>--}}
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#rule-delete-confirm-modal"><i class="bi bi-trash3"></i></button>
        </div>
    </div>
    <x-rule-delete-confirm-modal :rule="$rule" :deleteText="$ruleDeleteText"/>
</div>
{{--data-menuid={{$menu->id}}--}}
