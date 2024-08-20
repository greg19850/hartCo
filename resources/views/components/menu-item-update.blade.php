<li class="menu-item mb-4">
{{--    @dd($menuItem)--}}
    <div class="row">
        <div class="col">
            <input type="text" name='name[]' class="form-control menu-item-name" value="{{$menuItem->name}}" placeholder="Item name" aria-label="Item name">
        </div>
        <div class="col">
            <input type="text" name='description[]' class="form-control menu-item-description" value="{{$menuItem->ingredients}}"  placeholder="Item description (optional)" aria-label="Item description">
        </div>
        <div class="col">
            <input type="number" name="price[]" step="0.01" class="form-control menu-item-price" value="{{$menuItem->price}}" placeholder="Item price (optional)" aria-label="Item price">
        </div>
        <div class="item-remove col-1">'
            <i class="bi bi-file-minus"></i>
        </div>
        <div class='row'>
            <div class="col-12 form-check mx-3 mt-2">
                <input type="checkbox" name="is_vegan[]" class="form-check-input" value="{{$menuItem->vegan}}" id="veganCheckUpdate"
                @if($menuItem->vegan == 1)
                    checked
                @endif>
                <label class="form-check-label" for="veganCheckUpdate">
                    Vegan?
                </label>
            </div>
        </div>
    </div>
</li>
