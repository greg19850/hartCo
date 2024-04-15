@extends('cmsLayout')

@section('content')
<div class="menus-page">
    <div class="header d-flex justify-content-between align-items-center">
        <h4>Menu Panel</h4>
        <button class="btn btn-primary group-modal-btn p-2" data-bs-toggle="modal" data-bs-target="#add-menu-modal">Add Menu</button>
    </div>
    <hr />
    <div class="menus-container py-3">
        @if(count($menus) === 0)
        <p>No Menus Available. After Creating Menu, it will be available here.</p>
        @else
        @foreach($menus as $menu)
        <div>
            @dd($menus)
        </div>
        @endforeach
        @endif
    </div>

    <div class="modal fade" id="add-menu-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="add-menu-modal-label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="add-menu-modal-label">Add New Menu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="create-menu-form" name="create-menu-form" method="POST" action="{{url('cms/menus/create_menu')}}">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="menu_name" class="form-label">Menu Name:</label>
                            <input type="text" class="form-control" id="menu_name" name="menu_name" placeholder="Enter Menu Name" @error('menu_name') is-invalid @enderror>
                            @error('menu_name')
                            <small class="pt-1" style="color: red">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="spinner-border" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <button type="button" class="cancel-btn btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="create-menu-btn btn btn-primary">Create Menu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
