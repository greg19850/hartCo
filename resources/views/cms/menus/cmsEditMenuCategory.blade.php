@extends('layouts.cmsLayout')

@section('content')
{{--    @dd($subMenu);--}}
    <div class='edit-sub-menu-form'>
        <form id='edit_sub_menu_form' name='edit_sub_menu_form' class="edit-sub-menu-form" method="POST" action="{{route('cms.updateSubMenu' , ['menuId' => $subMenu->menu_id, 'subMenuId' => $subMenu->id])}}">
            @csrf
            <div class="edit-sub-menu-header d-flex align-items-center justify-content-between">
                <h1 class="title fs-5">Menu Category</h1>
                <a href="{{route('cms.editMenu', ['menuId' => $subMenu->menu_id])}}" class="btn btn-warning">Return to menu screen</a>
            </div>
            <hr/>
            <div class="row mb-3">
                <div class="col">
                    <label for="name" class="form-label">Category name</label>
                    <input type="text" class="form-control" name='name' aria-label="Category name" value={{$subMenu->title}} @error('name') is-invalid @enderror>
                    @error('name')
                    <small class="pt-1" style="color: red">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col row">
                    <div class="col-auto">
                        <label for="price" class="form-label">Category price (optional)</label>
                        <input type="number" step="0.01" class="form-control" name='price' value={{$subMenu->price}} aria-label="Category price">
                    </div>
                    <div class="col-auto form-check">
                        <input class="pp-check" type="checkbox" id="pp_check" name="pp_check"
                            @if($subMenu->per_person)
                                checked
                            @endif>
                        <label class="form-check-label" for="pp_check">
                            Per person?
                        </label>
                    </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="description" class="form-label">Category description (optional)</label>
                        <textarea class="form-control" id="description" name='description' rows="3">{{$subMenu->description}}</textarea>
                    </div>
                </div>
                <button type="submit" class="btn d-block submit-rule-btn btn-primary ms-auto">Update Menu Category</button>
        </form>
        <form id='edit_menu_items' name='edit_menu_items' class="edit-menu_items" method="POST" action="{{route('cms.updateMenuItems' , ['menuId' => $subMenu->menu_id, 'subMenuId' => $subMenu->id])}}">
            @csrf
            <div class="edit-menu-items-header">
                <h1 class="title fs-5">Menu Items</h1>
            </div>
            <hr/>
            <ul class="menu-items-list">
            @foreach($subMenu->menuItem as $menuItem)
            <x-menu-item-update :menuItem="$menuItem" />
            @endforeach
            </ul>
            <div class="menu-items-controls d-flex align-items-center justify-content-between mb-3">
                <button type="button" class="btn btn-success add-menu-item-btn">Add next item</button>
                <button id="menu-items-form" type="submit" class="btn btn-primary submit-update-menu-items w-25">Update Menu Items</button>
            </div>
            <a href="{{route('cms.editMenu', ['menuId' => $subMenu->menu_id])}}" class="btn clear-menu-items-list btn-danger d-block ms-auto w-25">Reset Items List</a>
        </form>
    </div>
    <script>
        // success / error push notifications
        toastr.options = {
            'closeButton': true,
            'timeOut': 1500,
            'positionClass': 'toast-bottom-right'
        }

        @if(session('success'))
        toastr.success("{{Session::get('success')}}");
        @endif

        @if(session('error'))
        toastr.error("{{Session::get('error')}}");
       @endif
    </script>
@endsection
