@extends('layouts.cmsLayout')

@section('content')
{{--    @dd($contactInfo)--}}
    <div class="cms-settings">
        <div class="header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Update Password</h5>
        </div>
        <hr />
        <form method="POST" action="{{route('cms.updatePassword')}}" class="w-50 mb-4">
            @csrf
            <div class="mb-3">
                <label for="admin-email" class="form-label">Admin Email</label>
                <input type="email" class="form-control" id="admin-email" value="{{$adminEmail}}" readonly disabled>
            </div>
            <div class="mb-3">
                <label for="current-password" class="form-label">Current Password</label>
                <input type="password" name="current_password" class="form-control" id="current-password">
                <small id="verifyCurrentPwd" class="pt-1" style="color: red">
                    @if(Session::has('error_message'))
                       {{Session::get('error_message')}}
                    @endif
                </small>
            </div>
            <div class="mb-3">
                <label for="new-password" class="form-label">New Password</label>
                <input type="password" name="new_password" class="form-control" id="new-password">
            </div>
            <div class="mb-3">
                <label for="confirm-password" class="form-label">Confirm New Password</label>
                <input type="password" class="form-control" id="confirm-password">
                <small id="confirmNewPwd" class="pt-1"></small>
            </div>
            <button type="submit" class="btn btn-primary" id="submitPwdUpdate" disabled>Submit</button>
        </form>
        <div class="header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Contact Information</h5>
        </div>
        <hr />
        <div class="contact-info-settings">
            <form action="" class="contact-info-form mb-4 w-50">
                <div class="mb-3 info-group">
                    <label>Address:</label>
                    <input name="address" type="text" value="{{$contactInfo->address ?? $defaultContactInfo['address']}}" class="form-control mb-2" placeholder="Address">
                    <div class="city row">
                        <div class="col-3 pe-0">
                            <input name="post-code" value="{{$contactInfo->postcode ?? $defaultContactInfo['postcode']}}" type="text" class="form-control" placeholder="Postcode">
                        </div>
                        <div class="col-9">
                            <input name="city" value="{{$contactInfo->city ?? $defaultContactInfo['city']}}" type="text" class="form-control col-3" placeholder="City">
                        </div>
                    </div>
                </div>
                <div class="mb-3 info-group">
                    <label>Phone Number:</label>
                    <input name="phone" value="{{$contactInfo->phone ?? $defaultContactInfo['phone']}}" type="text" class="form-control">
                </div>
                <div class="mb-3 info-group">
                    <label>Email Address:</label>
                    <input name="email" value="{{$contactInfo->email ?? $defaultContactInfo['email']}}" type="email" class="form-control">
                </div>
                <div class="mb-3 info-group">
                    <label>Facebook:</label>
                    <input name="facebook" value="{{$contactInfo->facebook ?? $defaultContactInfo['facebook']}}" type="url" class="form-control">
                </div>
                <div class="mb-3 info-group">
                    <label>Instagram:</label>
                    <input name="instagram" value="{{$contactInfo->instagram ?? $defaultContactInfo['instagram']}}" type="url" class="form-control">
                </div>
                <button class="btn btn-warning">Update</button>
            </form>
        </div>
        <div class="header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Opening Hours</h5>
        </div>
        <hr />
        <div class="add-opening-times accordion accordion-flush" id="accordion-flush">
            <div class="week-day accordion-item mb-3">
                <h5 class="accordion-header" id="headingMon">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseMon" aria-expanded="false" aria-controls="flush-collapseMon">
                        Monday
                    </button>
                </h5>
                <div id="flush-collapseMon" class="accordion-collapse collapse" aria-labelledby="flush-headingMon" data-bs-parent="#accordion-flush">
                    <form class="accordion-body" method="POST" action="{{route('cms.updateOpeningHours', ['day' => 'Monday'])}}">
                        @csrf
                        <div class="buttons d-flex align-items-center justify-content-between mb-3">
                            <div class="form-check">
                                <input class="form-check-input" name="closed" type="checkbox" id="closedCheckboxMon">
                                <label class="form-check-label" for="closedCheckboxMon">
                                    Closed?
                                </label>
                            </div>
                        </div>
                        <div class="hours-body">
                            <div class="input-group mb-3">
                                <span class="input-group-text">From</span>
                                <input type="text" name="time-from-mon-1" class="form-control timepicker" aria-label="time-from">
                                <span class="input-group-text">To</span>
                                <input type="text" name="time-to-mon-1" class="form-control timepicker" aria-label="time-to">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text">From</span>
                                <input type="text" name="time-from-mon-2" class="form-control timepicker" aria-label="time-from">
                                <span class="input-group-text">To</span>
                                <input type="text" name="time-to-mon-2" class="form-control timepicker" aria-label="time-to">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text">From</span>
                                <input type="text" name="time-from-mon-3" class="form-control timepicker" aria-label="time-from">
                                <span class="input-group-text">To</span>
                                <input type="text" name="time-to-mon-3" class="form-control timepicker" aria-label="time-to">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-outline-primary d-block ms-auto mt-4">Update hours</button>
                    </form>
                </div>
            </div>
            <div class="week-day accordion-item mb-3">
                <h5 class="accordion-header" id="headingTue">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTue" aria-expanded="false" aria-controls="flush-collapseTue">
                        Tuesday
                    </button>
                </h5>
                <div id="flush-collapseTue" class="accordion-collapse collapse" aria-labelledby="flush-headingTue" data-bs-parent="#accordion-flush">
                    <form class="accordion-body" method="POST" action="{{route('cms.updateOpeningHours', ['day' => 'Tuesday'])}}">
                        @csrf
                        <div class="buttons d-flex align-items-center justify-content-between mb-3">
                            <div class="form-check">
                                <input class="form-check-input" name="closed" type="checkbox" id="closedCheckboxMon">
                                <label class="form-check-label" for="closedCheckboxMon">
                                    Closed?
                                </label>
                            </div>
                        </div>
                        <div class="hours-body">
                            <div class="input-group mb-3">
                                <span class="input-group-text">From</span>
                                <input type="text" name="time-from-tue-1" class="form-control timepicker" aria-label="time-from">
                                <span class="input-group-text">To</span>
                                <input type="text" name="time-to-tue-1" class="form-control timepicker" aria-label="time-to">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text">From</span>
                                <input type="text" name="time-from-tue-2" class="form-control timepicker" aria-label="time-from">
                                <span class="input-group-text">To</span>
                                <input type="text" name="time-to-tue-2" class="form-control timepicker" aria-label="time-to">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text">From</span>
                                <input type="text" name="time-from-tue-3" class="form-control timepicker" aria-label="time-from">
                                <span class="input-group-text">To</span>
                                <input type="text" name="time-to-tue-3" class="form-control timepicker" aria-label="time-to">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-outline-primary d-block ms-auto mt-4">Update hours</button>
                    </form>
                </div>
            </div>
            <div class="week-day accordion-item mb-3">
                <h5 class="accordion-header" id="headingWed">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseWed" aria-expanded="false" aria-controls="flush-collapseWed">
                        Wednesday
                    </button>
                </h5>
                <div id="flush-collapseWed" class="accordion-collapse collapse" aria-labelledby="flush-headingWed" data-bs-parent="#accordion-flush">
                    <form class="accordion-body" method="POST" action="{{route('cms.updateOpeningHours', ['day' => 'Wednesday'])}}">
                        @csrf
                        <div class="buttons d-flex align-items-center justify-content-between mb-3">
                            <div class="form-check">
                                <input class="form-check-input" name="closed" type="checkbox" id="closedCheckboxMon">
                                <label class="form-check-label" for="closedCheckboxMon">
                                    Closed?
                                </label>
                            </div>
                        </div>
                        <div class="hours-body">
                            <div class="input-group mb-3">
                                <span class="input-group-text">From</span>
                                <input type="text" name="time-from-wed-1" class="form-control timepicker" aria-label="time-from">
                                <span class="input-group-text">To</span>
                                <input type="text" name="time-to-wed-1" class="form-control timepicker" aria-label="time-to">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text">From</span>
                                <input type="text" name="time-from-wed-2" class="form-control timepicker" aria-label="time-from">
                                <span class="input-group-text">To</span>
                                <input type="text" name="time-to-wed-2" class="form-control timepicker" aria-label="time-to">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text">From</span>
                                <input type="text" name="time-from-wed-3" class="form-control timepicker" aria-label="time-from">
                                <span class="input-group-text">To</span>
                                <input type="text" name="time-to-wed-3" class="form-control timepicker" aria-label="time-to">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-outline-primary d-block ms-auto mt-4">Update hours</button>
                    </form>
                </div>
            </div>
            <div class="week-day accordion-item mb-3">
                <h5 class="accordion-header" id="headingThu">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThu" aria-expanded="false" aria-controls="flush-collapseThu">
                        Thursday
                    </button>
                </h5>
                <div id="flush-collapseThu" class="accordion-collapse collapse" aria-labelledby="flush-headingThu" data-bs-parent="#accordion-flush">
                    <form class="accordion-body" method="POST" action="{{route('cms.updateOpeningHours', ['day' => 'Thursday'])}}">
                        @csrf
                        <div class="buttons d-flex align-items-center justify-content-between mb-3">
                            <div class="form-check">
                                <input class="form-check-input" name="closed" type="checkbox" id="closedCheckboxMon">
                                <label class="form-check-label" for="closedCheckboxMon">
                                    Closed?
                                </label>
                            </div>
                        </div>
                        <div class="hours-body">
                            <div class="input-group mb-3">
                                <span class="input-group-text">From</span>
                                <input type="text" name="time-from-thu-1" class="form-control timepicker" aria-label="time-from">
                                <span class="input-group-text">To</span>
                                <input type="text" name="time-to-thu-1" class="form-control timepicker" aria-label="time-to">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text">From</span>
                                <input type="text" name="time-from-thu-2" class="form-control timepicker" aria-label="time-from">
                                <span class="input-group-text">To</span>
                                <input type="text" name="time-to-thu-2" class="form-control timepicker" aria-label="time-to">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text">From</span>
                                <input type="text" name="time-from-thu-3" class="form-control timepicker" aria-label="time-from">
                                <span class="input-group-text">To</span>
                                <input type="text" name="time-to-thu-3" class="form-control timepicker" aria-label="time-to">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-outline-primary d-block ms-auto mt-4">Update hours</button>
                    </form>
                </div>
            </div>
            <div class="week-day accordion-item mb-3">
                <h5 class="accordion-header" id="headingFri">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFri" aria-expanded="false" aria-controls="flush-collapseFri">
                        Friday
                    </button>
                </h5>
                <div id="flush-collapseFri" class="accordion-collapse collapse" aria-labelledby="flush-headingFri" data-bs-parent="#accordion-flush">
                    <form class="accordion-body" method="POST" action="{{route('cms.updateOpeningHours', ['day' => 'Friday'])}}">
                        @csrf
                        <div class="buttons d-flex align-items-center justify-content-between mb-3">
                            <div class="form-check">
                                <input class="form-check-input" name="closed" type="checkbox" id="closedCheckboxMon">
                                <label class="form-check-label" for="closedCheckboxMon">
                                    Closed?
                                </label>
                            </div>
                        </div>
                        <div class="hours-body">
                            <div class="input-group mb-3">
                                <span class="input-group-text">From</span>
                                <input type="text" name="time-from-fri-1" class="form-control timepicker" aria-label="time-from">
                                <span class="input-group-text">To</span>
                                <input type="text" name="time-to-fri-1" class="form-control timepicker" aria-label="time-to">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text">From</span>
                                <input type="text" name="time-from-fri-2" class="form-control timepicker" aria-label="time-from">
                                <span class="input-group-text">To</span>
                                <input type="text" name="time-to-fri-2" class="form-control timepicker" aria-label="time-to">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text">From</span>
                                <input type="text" name="time-from-fri-3" class="form-control timepicker" aria-label="time-from">
                                <span class="input-group-text">To</span>
                                <input type="text" name="time-to-fri-3" class="form-control timepicker" aria-label="time-to">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-outline-primary d-block ms-auto mt-4">Update hours</button>
                    </form>
                </div>
            </div>
            <div class="week-day accordion-item mb-3">
                <h5 class="accordion-header" id="headingSat">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSat" aria-expanded="false" aria-controls="flush-collapseSat">
                        Saturday
                    </button>
                </h5>
                <div id="flush-collapseSat" class="accordion-collapse collapse" aria-labelledby="flush-headingSat" data-bs-parent="#accordion-flush">
                    <form class="accordion-body" method="POST" action="{{route('cms.updateOpeningHours', ['day' => 'Saturday'])}}">
                        @csrf
                        <div class="buttons d-flex align-items-center justify-content-between mb-3">
                            <div class="form-check">
                                <input class="form-check-input" name="closed" type="checkbox" id="closedCheckboxMon">
                                <label class="form-check-label" for="closedCheckboxMon">
                                    Closed?
                                </label>
                            </div>
                        </div>
                        <div class="hours-body">
                            <div class="input-group mb-3">
                                <span class="input-group-text">From</span>
                                <input type="text" name="time-from-sat-1" class="form-control timepicker" aria-label="time-from">
                                <span class="input-group-text">To</span>
                                <input type="text" name="time-to-sat-1" class="form-control timepicker" aria-label="time-to">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text">From</span>
                                <input type="text" name="time-from-sat-2" class="form-control timepicker" aria-label="time-from">
                                <span class="input-group-text">To</span>
                                <input type="text" name="time-to-sat-2" class="form-control timepicker" aria-label="time-to">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text">From</span>
                                <input type="text" name="time-from-sat-3" class="form-control timepicker" aria-label="time-from">
                                <span class="input-group-text">To</span>
                                <input type="text" name="time-to-sat-3" class="form-control timepicker" aria-label="time-to">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-outline-primary d-block ms-auto mt-4">Update hours</button>
                    </form>
                </div>
            </div>
            <div class="week-day accordion-item mb-3">
                <h5 class="accordion-header" id="headingSun">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSun" aria-expanded="false" aria-controls="flush-collapseSun">
                        Sunday
                    </button>
                </h5>
                <div id="flush-collapseSun" class="accordion-collapse collapse" aria-labelledby="flush-headingSun" data-bs-parent="#accordion-flush">
                    <form class="accordion-body" method="POST" action="{{route('cms.updateOpeningHours', ['day' => 'Sunday'])}}">
                        @csrf
                        <div class="buttons d-flex align-items-center justify-content-between mb-3">
                            <div class="form-check">
                                <input class="form-check-input" name="closed" type="checkbox" id="closedCheckboxMon">
                                <label class="form-check-label" for="closedCheckboxMon">
                                    Closed?
                                </label>
                            </div>
                        </div>
                        <div class="hours-body">
                            <div class="input-group mb-3">
                                <span class="input-group-text">From</span>
                                <input type="text" name="time-from-sun-1" class="form-control timepicker" aria-label="time-from">
                                <span class="input-group-text">To</span>
                                <input type="text" name="time-to-sun-1" class="form-control timepicker" aria-label="time-to">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text">From</span>
                                <input type="text" name="time-from-sun-2" class="form-control timepicker" aria-label="time-from">
                                <span class="input-group-text">To</span>
                                <input type="text" name="time-to-sun-2" class="form-control timepicker" aria-label="time-to">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text">From</span>
                                <input type="text" name="time-from-sun-3" class="form-control timepicker" aria-label="time-from">
                                <span class="input-group-text">To</span>
                                <input type="text" name="time-to-sun-3" class="form-control timepicker" aria-label="time-to">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-outline-primary d-block ms-auto mt-4">Update hours</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $('input.timepicker').timepicker({
                timeFormat: 'HH:mm',
                interval: 15,
                minHour: '00',
                maxHour: '24',
                startTime: '14:00',
                dynamic: false,
                dropdown: true,
                scrollbar: true
            });
        });


        @if(session('success'))
            toastr.options = {
            'closeButton': true,
            'timeOut': 1500,
            'positionClass': 'toast-bottom-right'
        }
        toastr.success("{{Session::get('success')}}");
        @endif

        $('#new-password, #confirm-password').keyup(function(){
            if(($('#confirm-password').val() === '' || $('#new-password').val() === '') || ($('#confirm-password').val() !== $('#new-password').val())){
                $('#confirmNewPwd').css('color', 'red');
                $('#confirmNewPwd').html("Passwords don't match")
                $('#submitPwdUpdate').prop('disabled', true);
            }else{
                $('#confirmNewPwd').css('color', 'green');
                $('#confirmNewPwd').html("Passwords match")
                $('#submitPwdUpdate').prop('disabled', false);
            }
        })
    </script>
@endsection

