<li id="{{ $rule->position }}">
    <form id="single_menu_rule" name="single_menu_rule" class="single-menu-rule mt-2 p-3" method="POST" action="{{route('cms.deleteMenuRules', ['menuId' => $rule->menu_id, 'ruleId' => $rule->id])}}">
        @csrf
        @method('delete')
        <div id="content" class="rule-content d-flex align-items-center">
            <div class="handle me-3"><i class="bi bi-arrows-expand"></i></div>
            @php echo $rule->body; @endphp
        </div>
        <div class="controls">
            <a href="{{route('cms.editMenuRulesForm', ['menuId' => $rule->menu_id, 'ruleId' => $rule->id])}}" class="btn edit-rule btn-warning"><i class="bi bi-pencil-square"></i></a>
            <button type="submit" class="btn remove-rule btn-danger"><i class="bi bi-trash3"></i></button>
        </div>
    </form>
</li>
