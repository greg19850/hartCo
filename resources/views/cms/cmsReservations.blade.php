@extends('layouts.cmsLayout')

@section('content')
<div class="cms-reservations">
    <div class="header d-flex justify-content-between align-items-center">
        <h4 class="mb-0">Opening Times</h4>
    </div>
    <hr />
    <div class="add-opening-times accordion accordion-flush" id="accordion-flush">
        <div class="week-day accordion-item mb-3">
            <h5 class="accordion-header" id="headingMon">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseMon" aria-expanded="false" aria-controls="flush-collapseMon">
                    <span class="w-25 fw-bold">Monday</span>
                    <span>
                        Current Hours:
                    </span>
                </button>
            </h5>
            <div id="flush-collapseMon" class="accordion-collapse collapse" aria-labelledby="flush-headingMon" data-bs-parent="#accordion-flush">
                <form class="accordion-body">
                    <div class="buttons d-flex align-items-center justify-content-between mb-3">
                        <div class="form-check">
                            <input class="form-check-input" name="closedCheckboxMon" type="checkbox" value="" id="closedCheckboxMon">
                            <label class="form-check-label" for="closedCheckboxMon">
                                Closed?
                            </label>
                        </div>
                        <button class="btn btn-outline-secondary button-addon" type="button">Add More Hours</button>
                    </div>
                    <div class="hours-body">
                        <div class="input-group mb-3" data-weekday="mon" data-hours="1">
                            <span class="input-group-text">From</span>
                            <input type="text" name="time-from-mon-1" class="form-control timepicker" aria-label="time-from">
                            <span class="input-group-text">To</span>
                            <input type="text" name="time-to-mon-1" class="form-control timepicker" aria-label="time-to">
                            <button type="button" class="btn btn-outline-secondary" disabled>Remove</button>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-outline-primary d-block ms-auto mt-4">Update hours</button>
                </form>
            </div>
        </div>
        <div class="week-day accordion-item mb-3">
            <h5 class="accordion-header" id="headingTue">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTue" aria-expanded="false" aria-controls="flush-collapseTue">
                    <span class="w-25 fw-bold">Tuesday</span>
                    <span>Current Hours:</span>
                </button>
            </h5>
            <div id="flush-collapseTue" class="accordion-collapse collapse" aria-labelledby="flush-headingTue" data-bs-parent="#accordion-flush">
                <form class="accordion-body">
                    <div class="buttons d-flex align-items-center justify-content-between mb-3">
                        <div class="form-check">
                            <input class="form-check-input" name="closedCheckboxMon" type="checkbox" value="" id="closedCheckboxMon">
                            <label class="form-check-label" for="closedCheckboxMon">
                                Closed?
                            </label>
                        </div>
                        <button class="btn btn-outline-secondary button-addon" type="button">Add More Hours</button>
                    </div>
                    <div class="hours-body">
                        <div class="input-group mb-3" data-weekday="tue" data-hours="1">
                            <span class="input-group-text">From</span>
                            <input type="text" name="time-from-tue-1" class="form-control timepicker" aria-label="time-from">
                            <span class="input-group-text">To</span>
                            <input type="text" name="time-to-tue-1" class="form-control timepicker" aria-label="time-to">
                            <button type="button" class="btn btn-outline-secondary" disabled>Remove</button>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-outline-primary d-block ms-auto mt-4">Update hours</button>
                </form>
            </div>
        </div>
        <div class="week-day accordion-item mb-3">
            <h5 class="accordion-header" id="headingWed">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseWed" aria-expanded="false" aria-controls="flush-collapseWed">
                    <span class="w-25 fw-bold">Wednesday</span>
                    <span>Current Hours:</span>
                </button>
            </h5>
            <div id="flush-collapseWed" class="accordion-collapse collapse" aria-labelledby="flush-headingWed" data-bs-parent="#accordion-flush">
                <form class="accordion-body">
                    <div class="buttons d-flex align-items-center justify-content-between mb-3">
                        <div class="form-check">
                            <input class="form-check-input" name="closedCheckboxMon" type="checkbox" value="" id="closedCheckboxMon">
                            <label class="form-check-label" for="closedCheckboxMon">
                                Closed?
                            </label>
                        </div>
                        <button class="btn btn-outline-secondary button-addon" type="button">Add More Hours</button>
                    </div>
                    <div class="hours-body">
                        <div class="input-group mb-3" data-weekday="wed" data-hours="1">
                            <span class="input-group-text">From</span>
                            <input type="text" name="time-from-wed-1" class="form-control timepicker" aria-label="time-from">
                            <span class="input-group-text">To</span>
                            <input type="text" name="time-to-wed-1" class="form-control timepicker" aria-label="time-to">
                            <button type="button" class="btn btn-outline-secondary" disabled>Remove</button>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-outline-primary d-block ms-auto mt-4">Update hours</button>
                </form>
            </div>
        </div>
        <div class="week-day accordion-item mb-3">
            <h5 class="accordion-header" id="headingThu">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThu" aria-expanded="false" aria-controls="flush-collapseThu">
                    <span class="w-25 fw-bold">Thursday</span>
                    <span>Current Hours:</span>
                </button>
            </h5>
            <div id="flush-collapseThu" class="accordion-collapse collapse" aria-labelledby="flush-headingThu" data-bs-parent="#accordion-flush">
                <form class="accordion-body">
                    <div class="buttons d-flex align-items-center justify-content-between mb-3">
                        <div class="form-check">
                            <input class="form-check-input" name="closedCheckboxMon" type="checkbox" value="" id="closedCheckboxMon">
                            <label class="form-check-label" for="closedCheckboxMon">
                                Closed?
                            </label>
                        </div>
                        <button class="btn btn-outline-secondary button-addon" type="button">Add More Hours</button>
                    </div>
                    <div class="hours-body">
                        <div class="input-group mb-3" data-weekday="thu" data-hours="1">
                            <span class="input-group-text">From</span>
                            <input type="text" name="time-from-thu-1" class="form-control timepicker" aria-label="time-from">
                            <span class="input-group-text">To</span>
                            <input type="text" name="time-to-thu-1" class="form-control timepicker" aria-label="time-to">
                            <button type="button" class="btn btn-outline-secondary" disabled>Remove</button>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-outline-primary d-block ms-auto mt-4">Update hours</button>
                </form>
            </div>
        </div>
        <div class="week-day accordion-item mb-3">
            <h5 class="accordion-header" id="headingFri">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFri" aria-expanded="false" aria-controls="flush-collapseFri">
                    <span class="w-25 fw-bold">Friday</span>
                    <span>Current Hours:</span>
                </button>
            </h5>
            <div id="flush-collapseFri" class="accordion-collapse collapse" aria-labelledby="flush-headingFri" data-bs-parent="#accordion-flush">
                <form class="accordion-body">
                    <div class="buttons d-flex align-items-center justify-content-between mb-3">
                        <div class="form-check">
                            <input class="form-check-input" name="closedCheckboxMon" type="checkbox" value="" id="closedCheckboxMon">
                            <label class="form-check-label" for="closedCheckboxMon">
                                Closed?
                            </label>
                        </div>
                        <button class="btn btn-outline-secondary button-addon" type="button">Add More Hours</button>
                    </div>
                    <div class="hours-body">
                        <div class="input-group mb-3" data-weekday="fri" data-hours="1">
                            <span class="input-group-text">From</span>
                            <input type="text" name="time-from-fri-1" class="form-control timepicker" aria-label="time-from">
                            <span class="input-group-text">To</span>
                            <input type="text" name="time-to-fri-1" class="form-control timepicker" aria-label="time-to">
                            <button type="button" class="btn btn-outline-secondary" disabled>Remove</button>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-outline-primary d-block ms-auto mt-4">Update hours</button>
                </form>
            </div>
        </div>
        <div class="week-day accordion-item mb-3">
            <h5 class="accordion-header" id="headingSat">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSat" aria-expanded="false" aria-controls="flush-collapseSat">
                    <span class="w-25 fw-bold">Saturday</span>
                    <span>Current Hours:</span>
                </button>
            </h5>
            <div id="flush-collapseSat" class="accordion-collapse collapse" aria-labelledby="flush-headingSat" data-bs-parent="#accordion-flush">
                <form class="accordion-body">
                    <div class="buttons d-flex align-items-center justify-content-between mb-3">
                        <div class="form-check">
                            <input class="form-check-input" name="closedCheckboxMon" type="checkbox" value="" id="closedCheckboxMon">
                            <label class="form-check-label" for="closedCheckboxMon">
                                Closed?
                            </label>
                        </div>
                        <button class="btn btn-outline-secondary button-addon" type="button">Add More Hours</button>
                    </div>
                    <div class="hours-body">
                        <div class="input-group mb-3" data-weekday="sat" data-hours="1">
                            <span class="input-group-text">From</span>
                            <input type="text" name="time-from-sat-1" class="form-control timepicker" aria-label="time-from">
                            <span class="input-group-text">To</span>
                            <input type="text" name="time-to-sat-1" class="form-control timepicker" aria-label="time-to">
                            <button type="button" class="btn btn-outline-secondary" disabled>Remove</button>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-outline-primary d-block ms-auto mt-4">Update hours</button>
                </form>
            </div>
        </div>
        <div class="week-day accordion-item mb-3">
            <h5 class="accordion-header" id="headingSun">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSun" aria-expanded="false" aria-controls="flush-collapseSun">
                    <span class="w-25 fw-bold">Sunday</span>
                    <span>Current Hours:</span>
                </button>
            </h5>
            <div id="flush-collapseSun" class="accordion-collapse collapse" aria-labelledby="flush-headingSun" data-bs-parent="#accordion-flush">
                <form class="accordion-body">
                    <div class="buttons d-flex align-items-center justify-content-between mb-3">
                        <div class="form-check">
                            <input class="form-check-input" name="closedCheckboxMon" type="checkbox" value="" id="closedCheckboxMon">
                            <label class="form-check-label" for="closedCheckboxMon">
                                Closed?
                            </label>
                        </div>
                        <button class="btn btn-outline-secondary button-addon" type="button">Add More Hours</button>
                    </div>
                    <div class="hours-body">
                        <div class="input-group mb-3" data-weekday="sun" data-hours="1">
                            <span class="input-group-text">From</span>
                            <input type="text" name="time-from-sun-1" class="form-control timepicker" aria-label="time-from">
                            <span class="input-group-text">To</span>
                            <input type="text" name="time-to-sun-1" class="form-control timepicker" aria-label="time-to">
                            <button type="button" class="btn btn-outline-secondary" disabled>Remove</button>
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
            defaultTime: '12',
            startTime: '14:00',
            dynamic: false,
            dropdown: true,
            scrollbar: true
        });
    });

    $('.button-addon').each(function (){

        $(this).on('click', function(){

            let parent = $(this).closest('.accordion-body').find('.hours-body')
            console.log(parent)
            let lastDiv = parent.find('.input-group').last();
            let weekday  = lastDiv[0].dataset.weekday
            let hourInOrder  = Number(lastDiv[0].dataset.hours) + 1

            let hoursContent = `<div class="input-group mb-3" data-weekday="${weekday}" data-hours="${hourInOrder}">
                        <span class="input-group-text">From</span>
                        <input type="text" name="time-from-${weekday}-${hourInOrder}" class="form-control timepicker" aria-label="time-from">
                        <span class="input-group-text">To</span>
                        <input type="text" name="time-to-${weekday}-${hourInOrder}" class="form-control timepicker" aria-label="time-to">
                        <button type="button" class="btn btn-outline-secondary remove-hr">Remove</button>
                    </div>`

            parent.append(hoursContent);

            $('input.timepicker').timepicker({
                timeFormat: 'HH:mm',
                interval: 15,
                minHour: '00',
                maxHour: '24',
                defaultTime: '12',
                startTime: '14:00',
                dynamic: false,
                dropdown: true,
                scrollbar: true
            });
        })
    });

    $(document).on('click', '.remove-hr', function() {
        $(this).closest('.input-group').remove()
    });

</script>
@endsection
