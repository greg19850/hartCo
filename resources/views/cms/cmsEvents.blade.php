@extends('layouts.cmsLayout')

@section('content')
    <div class="cms-events accordion accordion-flush " id="accordion-flush-event">
        <div class="accordion-item mb-4">
            <div class="events-header accordion-header mb-3">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse-event" aria-expanded="false" aria-controls="flush-collapseMon">
                    Create New Event
                </button>
            </div>
            <div id="flush-collapse-event"  class="accordion-collapse collapse show" aria-labelledby="flush-headingMon" data-bs-parent="#accordion-flush-event">
                <form id='event_form' name='event_form' class='event-form mb-3 px-3' method="POST"
                      action="{{route('cms.addEvent')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-3">
                        <div class="col-7">
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="event_name" class="form-label">Event Name</label>
                                    <input type="text" name="name" class="form-control" id="event_name"
                                           value="{{ old('name') }}" aria-label="First Name"
                                           @error('name') is-invalid @enderror>
                                    @error('name')
                                    <small class="pt-1" style="color: red; float: right">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="event_image" class="form-label">Event Image</label>
                                    <input type="file" name="image" class="form-control" id="event_image"
                                           aria-label="Event Image" @error('image') is-invalid @enderror>
                                    @error('image')
                                    <small class="pt-1" style="color: red; float: right">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="event_date" class="form-label">Event Date</label>
                                    <input type="text" name="date" class="form-control" id="event_date"
                                           value="{{ old('date') }}" aria-label="Event Date">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="event_link" class="form-label">Event Link (optional)</label>
                                    <input type="url" name="link" class="form-control" id="event_link"
                                           value="{{ old('link') }}" placeholder="https://example.com"
                                           aria-label="Event Link" pattern="https://.*"
                                           @error('link') is-invalid @enderror>
                                    @error('link')
                                    <small class="pt-1" style="color: red; float: right">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="event_description" class="form-label">Event Description
                                        (optional)</label>
                                    <textarea class="form-control" name="description" id="event_description"
                                              rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-5 mt-5">
                            <div class="row mb-3 event-image-preview">
                                <div class="col event-image-container">
                                    <p>Upload Image to see preview</p>
                                    <img src="" id="event_image_preview" alt="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col d-flex align-items-center justify-content-start">
                                    <button class="btn btn-primary add-event-btn me-3" type="submit">Create Event
                                    </button>
                                    <div class="spinner-add-event spinner-border" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="events-list-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0 px-1">Current Events List</h5>
        </div>
        <hr />
        @if(!count($events))
            <div class="px-1">Add first event to the list</div>
        @else
            <div class="events-list px-1">
                @foreach($events as $event)
                    <div class="card m-2" style="width: 30%;">
                        <img src="{{asset($event->image)}}" class="card-img-top" alt="{{$event->name}}" style="height: 60%;">
                        <div class="card-body">
                            <h5 class="card-title">{{$event->name}}</h5>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirm-event-delete" data-eventid={{$event->id}}>Delete</button>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
        <x-confirm-event-delete-modal />
    </div>

    <script>
        @if(session('success'))
            toastr.options = {
            'closeButton': true,
            'timeOut': 1500,
            'positionClass': 'toast-bottom-right'
        }
        toastr.success("{{Session::get('success')}}");
        @endif

        $(document).ready(function() {
            $('#event_description').summernote({
                placeholder: 'Write event description here',
                tabsize: 2,
                height: 100,
                lineHeights: ['0.2', '0.5', '1.0', '1.2', '1.5', '2.0', '3.0'],
                toolbar: [
                    ['style', ['bold', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['fontname', ['fontname']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']], , ['table', ['table']],
                    ['insert', ['link']],
                    ['height', ['height']],
                    ['view', ['help']]
                ]
            });
        });

        const imageInput = document.getElementById('event_image')

        const previewImage = (e) => {
            const preview = document.getElementById('event_image_preview');

            if (imageInput.files && imageInput.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                }
                reader.readAsDataURL(imageInput.files[0]);
            }
        }

        const eventForm = document.getElementById('event_form')
        const addEventBtn = document.querySelector('.add-event-btn')
        const eventSpinner = document.querySelector('.spinner-add-event')

        const addEvent = (e) =>
        {
            e.preventDefault()

            addEventBtn.disabled = true;
            eventSpinner.classList.add('active')

            setTimeout(function() {
                eventForm.submit();
            }, 1000);
        }

        eventForm.addEventListener('submit', addEvent)

        imageInput.addEventListener('change', previewImage);

        const elem = document.querySelector('input[name="date"]');
        const datepicker = new Datepicker(elem, {
            autohide: true,
            format: 'dd/mm/yyyy',
            minDate: 'current date'
        });
    </script>
@endsection
