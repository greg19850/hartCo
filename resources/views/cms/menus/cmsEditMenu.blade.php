@extends('layouts.cmsLayout')

@section('content')

<div class='edit-menu-card'>
    <h3 class='mb-3'>{{$menu->name}}</h3>
    <hr class="mb-3" />
    <div class='top-panel d-flex mb-5'>
        <form id='img_form' name='img_form' class='img-form' method="POST" action="{{route('cms.updateMenuImg' , $menu->id)}}" enctype="multipart/form-data">
            @csrf
            <div class="card border-0" style="width: 18rem;">
                <img src={{$menu->image}} class="card-img-top" alt="...">
                <div class="card-body p-0">
                    <button type="button" id='edit-img-btn' class="edit-img-btn btn btn-primary mt-4">Edit Menu Photo</button>
                    <div class="edit-menu-img-panel form-group">
                        <input type="file" class="form-control my-2" id="menu_img_edit" name="menu_img_edit" @error('menu_img_edit') is-invalid @enderror>
                        <div class='img-buttons d-flex align-items-center'>
                            <button type="button" class="cancel-edit-img btn btn-secondary me-2">Cancel</button>
                            <button type="submit" class="submit-edited-img btn btn-primary me-2">Update Image</button>
                            <div class="spinner-img-edit spinner-border" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>
                    </div>
                </div>
                @error('menu_img_edit')
                <small class="pt-1" style="color: red">{{ $message }}</small>
                @enderror
            </div>
        </form>
        <form id='menu_details_form' name='menu_details_form' class='edit-menu-details-form d-flex flex-column ps-5' method="POST" action="{{route('cms.updateMenuDetails' , $menu->id)}}">
            @csrf
            <div class="mb-1">
                <label for="edit_menu_name" class="form-label mb-1">Menu Name</label>
                <input type="text" class="form-control py-1" id="edit_menu_name" name='edit_menu_name' value="{{$menu->name}}" @error('edit_menu_name') is-invalid @enderror disabled>
                @error('edit_menu_name')
                <small class="pt-1" style="color: red">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-2">
                <label for="edit_menu_serving_times" class="form-label mb-1">Menu Serving Times</label>
                <input type="text" class="form-control py-1" id="edit_menu_serving_times" name='edit_menu_serving_times' value="{{$menu->serving_time}} " disabled>

            </div>
            <button type="button" class="edit-menu-details-btn btn btn-primary" style="width:150px">Edit</button>
            <div class='menu-edit-details-panel'>
                <button type="button" class="cancel-edit-menu btn btn-secondary me-2" style="width:30%">Cancel</button>
                <button type="submit" class="submit-edit-menu btn btn-primary" style="width:50%">Update Details</button>
            </div>
        </form>
    </div>
    <div class='menu-rules mb-5'>
        <div class='rules-header d-flex justify-content-between align-items-center'>
            <h4 class="mb-0">Menu Rules</h4>
            <a class="btn btn-primary rule-modal-btn p-2" href="{{route('cms.addMenuRulesForm' , $menu->id)}}" style="width:150px">Add Rules</a>
        </div>
        <div class="rules-content">
            @if($rules)
            @foreach($rules as $rule)
            <x-menu-rule :rule="$rule" />
            @endforeach
            @endif
        </div>
    </div>
    <div class="sub-menus mb-5">
        <div class='sub-menu-header d-flex justify-content-between align-items-center'>
            <h4 class="mb-0">Sub Menus</h4>
            <a class="btn btn-primary rule-modal-btn p-2" href="{{route('cms.addSubMenuForm' , $menu->id)}}" style="width:150px">Add Category</a>
        </div>
        <div class="menu-content">
            <ul id="menu_items" class="menu-items-list p-0">
                @if($sub_menus)
                @foreach($sub_menus as $subMenu)
                <x-sub-menu :subMenu="$subMenu" />
                @endforeach
                @endif
            </ul>
        </div>
    </div>
</div>

<!-- jsDelivr :: Sortable :: Latest (https://www.jsdelivr.com/package/npm/sortablejs) -->
<script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-sortablejs@latest/jquery-sortable.js"></script>
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


    // editing/uploading menu image - buttons
    const editImagePanel = document.querySelector(".edit-menu-img-panel");
    const showEditImgBtn = document.getElementById("edit-img-btn");
    const hideEditImgPanelBtn = document.querySelector(".cancel-edit-img");

    const imageForm = document.getElementById("img_form");
    const submitImageBtn = document.querySelector(".submit-edited-img");
    const loadingSpinner = document.querySelector(".spinner-img-edit");

    //edit menu image - panel functions
    const hideImgEditPanel = () => {
        showEditImgBtn.classList.remove('hidden')
        editImagePanel.classList.remove('active')
    };

    const showEditImagePanel = (e) => {
        e.target.classList.add('hidden')
        editImagePanel.classList.add('active')

    };

    //upload updated image
    const submitImage = (e) => {
        e.preventDefault();

        loadingSpinner.classList.add("active");
        hideEditImgPanelBtn.disabled = true;
        submitImageBtn.disabled = true;


        setTimeout(function() {
            imageForm.submit();
        }, 500);
    }

    showEditImgBtn.addEventListener("click", showEditImagePanel);
    hideEditImgPanelBtn.addEventListener("click", hideImgEditPanel);
    imageForm.addEventListener('submit', submitImage)


    // Show panel for editing menu info, and submit updated details
    const showMenuEditPanelBtn = document.querySelector('.edit-menu-details-btn')
    const menuEditPanel = document.querySelector('.menu-edit-details-panel')
    const editMenuDetailsForm = document.querySelector('.edit-menu-details-form')
    const inputs = editMenuDetailsForm.querySelectorAll('.form-control')
    const editMenuDetailsCancelBtn = document.querySelector('.cancel-edit-menu')
    const editMenuDetailsSubmitBtn = document.querySelector('.submit-edit-menu')

    @if(count($errors) > 0)
    showMenuEditPanelBtn.classList.add('hidden')
    menuEditPanel.classList.add('active')

    inputs.forEach(input => input.disabled = false)
    @endif

    const showMenuPanel = (e) => {
        e.target.classList.add('hidden')
        menuEditPanel.classList.add('active')

        inputs.forEach(input => input.disabled = false)
    }

    const closeMenuPanel = (e) => {
        showMenuEditPanelBtn.classList.remove('hidden')
        menuEditPanel.classList.remove('active')

        inputs.forEach(input => input.disabled = true)
    }

    const submitMenuDetailsForm = (e) => {
        e.preventDefault()

        editMenuDetailsSubmitBtn.disabled = true;
        editMenuDetailsCancelBtn.disabled = true;

        setTimeout(function() {
            editMenuDetailsForm.submit();
        }, 1000);
    }

    showMenuEditPanelBtn.addEventListener('click', showMenuPanel)
    editMenuDetailsCancelBtn.addEventListener('click', closeMenuPanel)
    editMenuDetailsForm.addEventListener('submit', submitMenuDetailsForm)

    // sort rules
    /* const sortRulesList = document.getElementById('sort_rules')
    Sortable.create(sortRulesList, {
        animation: 150
        , handle: '.handle'
        , ghostClass: 'blue-background-class'
    });
    */


    /* $(document).ready(function() {
        $("#sort_rules").sortable({
            animation: 150
            , handle: '.handle'
            , opacity: 0.6
            , cursor: 'move'
            , tolerance: 'pointer'
            , revert: true
            , items: 'li'
            , placeholder: 'state'
            , forcePlaceholderSize: true
            , ghostClass: 'blue-background-class'
            , onUpdate: function(evt, ui) {
                $.ajax({
                    url: "/cms/menus/update_rules"
                    , method: 'POST'
                    , data: {
                        'order': $("#sort_rules").sortable('toArray')
                    , }
                    , cache: false
                    , processData: false,

                });
            }
        });
    }); */
</script>
@endsection
