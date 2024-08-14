<li id="{{ $category->id }}">
    <form id="single_menu_category" name="single_menu_category" class="single-menu-category mt-2 p-3" method="POST" action="{{route('cms.deleteMenuCategory', ['menuId' => $category->menu_id, 'categoryId' => $category->id])}}">
        @csrf
        @method('delete')
        <div id="content" class="category-content">
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
            <a href="{{route('cms.editMenuCategoryForm', ['menuId' => $category->menu_id, 'categoryId' => $category->id])}}" class="btn edit-category btn-warning"><i class="bi bi-pencil-square"></i></a>
            <button type="submit" class="btn remove-category btn-danger"><i class="bi bi-trash3"></i></button>
        </div>
    </form>
</li>
