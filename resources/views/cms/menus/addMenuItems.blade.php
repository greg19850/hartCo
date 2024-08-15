@extends('layouts.cmsLayout')

@section('content')
<div class="menu-items-container">
    <h4>{{$subMenu->title}} menu items</h4>
    <p>please add menu items below</p>
    <form id="menu-items-form" class="menu-items-form mt-2" method="POST" action="{{route('cms.addMenuItems', ['menuId' => $menu->id, 'subMenuId' => $subMenu->id])}}">
        @csrf
        <ul class="menu-items-list">
            <!-- Items appended in js script -->
        </ul>
        <div class="menu-items-controls d-flex align-items-center justify-content-between">
            <button type="button" class="btn btn-success add-menu-item-btn">Add next item</button>
            <button type="submit" class="btn btn-primary submit-menu-items">Submit Form</button>
        </div>
    </form>
</div>
@endsection