<div class="modal fade event-modal" id="eventModal_{{$event->id}}" tabindex="-1" aria-labelledby="eventModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <button type="button" data-bs-dismiss="modal">
                <x-entypo-cross class="cross"/>
            </button>
            @if($event->description)
                <div class="event-description">
                    {!! $event->description !!}
                </div>
            @endif
            @if($event->link)
                <a href="{{$event->link}}" target="_blank"> <x-entypo-link class="event-link" />Get Your Tickets Here</a>
            @endif
        </div>
    </div>
</div>




