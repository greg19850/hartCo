{{--@dd($event);--}}
<div class="modal fade event-modal" id="eventModal_{{$event->id}}" tabindex="-1" aria-labelledby="eventModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <button type="button" data-bs-dismiss="modal">
                <x-entypo-cross class="cross" />
            </button>
            <h3 class="event-name">{{$event->name}}</h3>
            <p class="event-date">{{$event->date}}</p>
            @if($event->description)
                <div class="event-description">
                    {!! $event->description !!}
                </div>
            @endif
            <a href="{{$event->link}}" target="_blank"> <x-entypo-link class="event-link" />Get Your Tickets Here</a>
            <img src='{{$event->image}}' alt="event image">
        </div>
    </div>
</div>
