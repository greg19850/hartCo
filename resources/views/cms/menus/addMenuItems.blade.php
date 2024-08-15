@extends('layouts.cmsLayout')

@section('content')
<div class="menu-items-container">
    <h4>{{$subMenu->title}} menu items</h4>
    <p>please add menu items</p>
    <form>
        <ul class="menu-items-list">

        </ul>
        <button class="btn btn-success add-menu-item-btn">Add next item</button>
    </form>
</div>
@endsection