@extends('layouts.cmsLayout')

@section('content')

    <div class='edit-menu-card'>
        <h4 class='mb-3'>{{$menu->name}}</h4>
        <hr class="mb-3"/>
        <div class='top-panel d-flex mb-2'>
            <form id='img_form' name='img_form' class='img-form' method="POST"
                  action="{{route('cms.updateMenuPoster' , $menu->id)}}" enctype="multipart/form-data">
                @csrf
                <div class="card border-0" style="width: 18rem;">
                    <img src={{$menu->image}} class="card-img-top" alt="...">
                    <div class="card-body p-0">
                        <button type="button" id='edit-img-btn' class="edit-img-btn btn btn-primary mt-4">Edit Menu
                            Poster
                        </button>
                        <div class="edit-menu-poster-panel form-group">
                            <input type="file" class="form-control my-2" id="menu_poster_edit" name="menu_poster_edit"
                                   @error('menu_poster_edit') is-invalid @enderror>
                            <div class='img-buttons d-flex align-items-center'>
                                <button type="button" class="cancel-edit-img btn btn-secondary me-2">Cancel</button>
                                <button type="submit" class="submit-edited-img btn btn-primary me-2">Update Image
                                </button>
                                <div class="spinner-img-edit spinner-border" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @error('menu_poster_edit')
                    <small class="pt-1" style="color: red">{{ $message }}</small>
                    @enderror
                </div>
            </form>
            <form id='menu_details_form' name='menu_details_form' class='edit-menu-details-form d-flex flex-column ps-5'
                  method="POST" action="{{route('cms.updateMenuDetails' , $menu->id)}}">
                @csrf
                <div class="mb-1">
                    <label for="edit_menu_name" class="form-label mb-1">Menu Name</label>
                    <input type="text" class="form-control py-1" id="edit_menu_name" name='edit_menu_name'
                           value="{{$menu->name}}" @error('edit_menu_name') is-invalid @enderror disabled>
                    @error('edit_menu_name')
                    <small class="pt-1" style="color: red">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="edit_menu_serving_times" class="form-label mb-1">Menu Serving Times</label>
                    <input type="text" class="form-control py-1" id="edit_menu_serving_times"
                           name='edit_menu_serving_times' value="{{$menu->serving_time}} " disabled>

                </div>
                <button type="button" class="edit-menu-details-btn btn btn-primary" style="width:150px">Edit</button>
                <div class='menu-edit-details-panel'>
                    <button type="button" class="cancel-edit-menu btn btn-secondary me-2" style="width:30%">Cancel
                    </button>
                    <button type="submit" class="submit-edit-menu btn btn-primary" style="width:50%">Update Details
                    </button>
                </div>
            </form>
        </div>
        <div class="menu-image-container py-4 mb-5">
            <div class='rules-header d-flex justify-content-between align-items-center mb-2'>
                <h5 class="mb-0"></h5>
                <form id="menuImageForm" action="{{route('cms.selectImageAsMenu', $menu->id)}}" method="POST">
                    @csrf
                    <div class="custom-control custom-switch">
                        <label class="custom-control-label" for="menuImageToggle">use Image?</label>
                        <label class="switch">
                            <input type="checkbox" id="menuImageToggle"
                                   name="show_menu_image" {{ $menu->show_menu_image ? 'checked' : '' }}>
                            <span class="slider round"></span>
                        </label>
                    </div>
                </form>
            </div>
            <form id='menu_img_form' name='menu_img_form' class='menu-img-form' method="POST"
                  action="{{route('cms.updateMenuImage' , $menu->id)}}" enctype="multipart/form-data">
                @csrf
                <div class="image-container">
                    @if($menu->menu_image)
                        <img src={{$menu->menu_image}} class="card-img-top" alt="...">
                    @else
                        <p>Add Menu Image</p>
                    @endif
                </div>
                <input type="file" class="menu-image form-control my-3" id="menu_image" name="menu_image"
                       @error('menu_image') is-invalid @enderror>
                <div class="d-flex align-items-center mt-3">
                    <button type="submit" id='menu_image_btn' class="menu-image-btn btn btn-primary">Update Menu
                        Image
                    </button>
                    <div class="spinner-menu-image spinner-border ms-4" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>

                @error('menu_image')
                <small class="pt-1" style="color: red">{{ $message }}</small>
                @enderror
            </form>
        </div>
        @if(!$menu->show_menu_image)
            <div class='menu-rules mb-5'>
                <div class='rules-header d-flex justify-content-between align-items-center'>
                    <h5 class="mb-0">Menu Rules</h5>
                    <a class="btn btn-primary rule-modal-btn p-2" href="{{route('cms.addMenuRulesForm' , $menu->id)}}"
                       style="width:150px">Add Rules</a>
                </div>
                <div class="rules-content">
                    @if($rules)
                        @foreach($rules as $rule)
                            <x-menu-rule :rule="$rule"/>
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="sub-menus mb-5">
                <div class='sub-menu-header d-flex justify-content-between align-items-center'>
                    <h5 class="mb-0">Sub Menus</h5>
                    <a class="btn btn-primary rule-modal-btn p-2" href="{{route('cms.addSubMenuForm' , $menu->id)}}"
                       style="width:150px">Add Category</a>
                </div>
                <div class="menu-content">
                    <ul id="menu_items" class="menu-items-list p-0">
                        @if($sub_menus)
                            @foreach($sub_menus as $subMenu)
                                <x-sub-menu :subMenu="$subMenu"/>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
        @endif
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
        const editImagePanel = document.querySelector(".edit-menu-poster-panel");
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


            setTimeout(function () {
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

            setTimeout(function () {
                editMenuDetailsForm.submit();
            }, 1000);
        }

        showMenuEditPanelBtn.addEventListener('click', showMenuPanel)
        editMenuDetailsCancelBtn.addEventListener('click', closeMenuPanel)
        editMenuDetailsForm.addEventListener('submit', submitMenuDetailsForm)

        // Submit Menu image

        //upload updated image

        const menuImageForm = document.getElementById('menu_img_form')
        const menuImageSpinner = document.querySelector('.spinner-menu-image')
        const menuImageButton = document.querySelector('.menu_image_btn')

        const submitMenuImage = (e) => {
            e.preventDefault();

            console.log('works')
            menuImageSpinner.classList.add("active");
            menu_image_btn.disabled = true;

            setTimeout(function () {
                menuImageForm.submit();
            }, 500);
        }

        menuImageForm.addEventListener('submit', submitMenuImage)
    </script>
@endsection
