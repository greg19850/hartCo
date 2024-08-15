<li id="{{ $category->id }}">
    <form id="single_menu_category" name="single_menu_category" class="single-menu-category mt-2 p-3" method="POST" action="{{route('cms.deleteMenuCategory', ['menuId' => $category->menu_id, 'categoryId' => $category->id])}}">
        @csrf
        @method('delete')
        <div id="content" class="category-content d-flex align-items-center">
            <div>
                {{$category->title}}
            </div>
            @if($category->description)
            <div>
                {{$category->description}}
            </div>
            @endif
        </div>
        <div class="controls">
            <a href="{{route('cms.addMenuItemsForm', ['menuId' => $category->menu_id, 'subMenuId' => $category->id])}}" class="btn edit-category btn-success"><i class="bi bi-plus-square-dotted"></i></a>
            <a href="{{route('cms.editMenuCategoryForm', ['menuId' => $category->menu_id, 'categoryId' => $category->id])}}" class="btn edit-category btn-warning"><i class="bi bi-pencil-square"></i></a>
            <button type="submit" class="btn remove-category btn-danger"><i class="bi bi-trash3"></i></button>

        </div>
    </form>
</li>