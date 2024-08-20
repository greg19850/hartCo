<li class="sub-menu-container mt-2 p-3" id="{{ $subMenu->id }}">

    <div id="single_menu_category" class="single-menu-category">
        @csrf
        @method('delete')
        <div id="content" class="category-content mb-3 pb-2">
            <div class="row mb-2">
                <div class="col-8">
                    {{$subMenu->title}}
                </div>
                @if($subMenu->price)
                    <div class="col-4">
                        £{{$subMenu->price}}
                        @if($subMenu->per_person)
                            <span>pp</span>
                        @endif
                    </div>
                @endif
            </div>
            <div class="row">
                @if($subMenu->description)
                    <div class="col">
                        {{$subMenu->description}}
                    </div>
                @endif
            </div>
        </div>
        <div class="controls">
            @if(!count($subMenu->menuItem))
                <a href="{{route('cms.addMenuItemsForm', ['menuId' => $subMenu->menu_id, 'subMenuId' => $subMenu->id])}}" class="btn edit-category btn-success"><i class="bi bi-plus-square-dotted"></i></a>
            @endif
            <a href="{{route('cms.editMenuCategoryForm', ['menuId' => $subMenu->menu_id, 'subMenuId' => $subMenu->id])}}" class="btn edit-category btn-warning"><i class="bi bi-pencil-square"></i></a>
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#sub-menu-delete-confirm-modal"><i class="bi bi-trash3"></i></button>
        </div>
    </div>
    <div class="menu-items-show">
        <h5>Menu Items:</h5>
        @foreach($subMenu->menuItem as $menuItem)
        <div>
            <div class="d-flex">
                <p class="w-50 fw-bold">
                {{$menuItem->name}}
                    @if($menuItem->vegan)
                    <span>(V)</span>
                    @endif
                </p>

                <p>
                £{{$menuItem->price}}
                </p>
            </div>
            <p>
                {{$menuItem->ingredients}}
            </p>
        </div>
        @endforeach
    </div>
    <x-sub-menu-delete-confirm-modal :subMenu="$subMenu" :deleteText="$subMenuDeleteText"/>
</li>
