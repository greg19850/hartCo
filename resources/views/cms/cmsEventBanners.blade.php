@extends('layouts.cmsLayout')

@section('content')
    <div class="cms-event-banners accordion accordion-flush" id="accordion-flush-banner">
        <div class="accordion-item mb-4">
            <div class="banner-header accordion-header mb-3">
                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                    data-bs-target="#flush-collapse-banner" aria-expanded="false" aria-controls="flush-collapse-banner">
                    Create New Event Banner
                </button>
            </div>
            <div id="flush-collapse-banner" class="accordion-collapse collapse show" aria-labelledby="flush-heading-banner"
                data-bs-parent="#accordion-flush-banner">
                <form id='banner_form' name='banner_form' class='banner-form mb-3 px-3' method="POST"
                    action="{{ route('cms.addEventBanner') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-3">
                        <div class="col-7">
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="banner_title" class="form-label">Banner Title (Admin Reference)</label>
                                    <input type="text" name="title" class="form-control" id="banner_title"
                                        value="{{ old('title') }}" aria-label="Banner Title"
                                        @error('title') is-invalid @enderror>
                                    @error('title')
                                        <small class="pt-1" style="color: red; float: right">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="banner_image" class="form-label">Event Poster</label>
                                    <input type="file" name="image" class="form-control" id="banner_image"
                                        aria-label="Event Poster" @error('image') is-invalid @enderror>
                                    @error('image')
                                        <small class="pt-1" style="color: red; float: right">{{ $message }}</small>
                                    @enderror
                                    <small class="form-text text-muted">Upload the complete event poster with all event
                                        details</small>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="banner_date" class="form-label">Event Date</label>
                                    <input type="date" name="event_date" class="form-control" id="banner_date"
                                        value="{{ old('event_date') }}" aria-label="Event Date" min="{{ date('Y-m-d') }}"
                                        @error('event_date') is-invalid @enderror>
                                    @error('event_date')
                                        <small class="pt-1" style="color: red; float: right">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="banner_link" class="form-label">Ticket Link (optional)</label>
                                    <input type="url" name="link" class="form-control" id="banner_link"
                                        value="{{ old('link') }}" placeholder="https://example.com"
                                        aria-label="Ticket Link" pattern="https://.*" @error('link') is-invalid @enderror>
                                    @error('link')
                                        <small class="pt-1" style="color: red; float: right">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="banner-preview-container col-5 mt-5">
                            <div class="row mb-3 banner-image-preview">
                                <div class="col banner-image-container">
                                    <p>Upload poster to see preview</p>
                                    <img src="" id="banner_image_preview" alt=""
                                        style="max-width: 100%; height: auto;">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col d-flex align-items-center justify-content-start">
                                    <button class="btn btn-primary add-banner-btn me-3" type="submit">Create
                                        Banner</button>
                                    <div class="spinner-add-banner spinner-border" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="banners-list-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0 px-1">Current Event Banners</h5>
        </div>
        <hr />
        @if (!count($eventBanners))
            <div class="px-1">Add first event banner to the list</div>
        @else
            <div class="banners-list px-1 d-flex flex-wrap">
                @foreach ($eventBanners as $banner)
                    <div class="card m-2" style="width: 30%; min-width: 300px;">
                        <img src="{{ asset($banner->image) }}" class="card-img-top" alt="{{ $banner->title }}" style="height: 300px; object-fit: contain; background-color: #f8f9fa;">
                        <div class="card-body d-flex flex-column" style="min-height: 200px;">
                            <div class="top mb-2">
                                <div class="info">
                                    <h5 class="card-title mb-1">{{ $banner->title }}</h5>
                                    <p class="mb-1">{{ $banner->event_date->format('d/m/Y') }}</p>
                                    <div class="badges mb-2">
                                        <span class="badge {{ $banner->event_date->isPast() ? 'bg-danger' : 'bg-success' }}">
                                            {{ $banner->event_date->isPast() ? 'Past Event' : 'Upcoming' }}
                                        </span>
                                        <span class="badge {{ $banner->is_active ? 'bg-primary' : 'bg-secondary' }} ms-1">
                                            {{ $banner->is_active ? 'Active' : 'Inactive' }}
                                        </span>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#confirm-banner-delete" data-bannerid="{{ $banner->id }}">
                                    Delete
                                </button>
                            </div>
                            <div class="banner-controls mb-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" 
                                           {{ $banner->is_active ? 'checked' : '' }}
                                           id="active_{{ $banner->id }}"
                                           onchange="toggleBannerActive({{ $banner->id }})">
                                    <label class="form-check-label" for="active_{{ $banner->id }}">
                                        Show this banner
                                    </label>
                                </div>
                            </div>
                            @if ($banner->link)
                                <a href="{{ $banner->link }}" target="_blank"
                                    class="btn btn-sm btn-outline-primary">View Event</a>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
        <x-confirm-banner-delete-modal />
    </div>

    <script>
        @if (session('success'))
            toastr.options = {
                'closeButton': true,
                'timeOut': 1500,
                'positionClass': 'toast-bottom-right'
            }
            toastr.success("{{ Session::get('success') }}");
        @endif

        const imageInput = document.getElementById('banner_image');

        const previewImage = (e) => {
            const preview = document.getElementById('banner_image_preview');

            if (imageInput.files && imageInput.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                }
                reader.readAsDataURL(imageInput.files[0]);
            }
        }

        const bannerForm = document.getElementById('banner_form');
        const addBannerBtn = document.querySelector('.add-banner-btn');
        const bannerSpinner = document.querySelector('.spinner-add-banner');

        const addBanner = (e) => {
            e.preventDefault();

            addBannerBtn.disabled = true;
            bannerSpinner.classList.add('active');

            setTimeout(function() {
                bannerForm.submit();
            }, 1000);
        }

        bannerForm.addEventListener('submit', addBanner);
        imageInput.addEventListener('change', previewImage);

        function toggleBannerActive(bannerId) {
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = `/cms/banners/${bannerId}/toggle-active`;
            
            const csrfToken = document.createElement('input');
            csrfToken.type = 'hidden';
            csrfToken.name = '_token';
            csrfToken.value = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            
            const methodField = document.createElement('input');
            methodField.type = 'hidden';
            methodField.name = '_method';
            methodField.value = 'PATCH';
            
            form.appendChild(csrfToken);
            form.appendChild(methodField);
            document.body.appendChild(form);
            form.submit();
        }
    </script>
@endsection
