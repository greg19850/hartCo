@extends('layouts.layout')

@section('title', 'Home Page')

@section('content')
    <div class="home-page">
        <x-tabler-heart-up class="heart-up-icon" />
        <div id="hart-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="motto d-flex flex-column align-items-center justify-content-center">
                <h1 class="motto-text">{{ $motto }}</h1>
                <x-tabler-heart-down class="heart-down-icon" />
            </div>
            <video class="home-vid" autoplay playsinline muted loop>
                <!--@notmobile-->
                <!--    <source src="{{ asset('storage/videos/Hart Video UPDATED.mp4') }}" type="video/mp4">-->

                <!--@elsenotmobile-->
                <!--    <source src="{{ asset('storage/videos/home_vid.MP4') }}" type="video/mp4">-->
                <!--@endnotmobile-->
                @handheld
                    <source src="{{ asset('storage/videos/home_vid.MP4') }}" type="video/mp4">
                @elsehandheld
                    <source src="{{ asset('storage/videos/Hart Video UPDATED.mp4') }}" type="video/mp4">
                @endhandheld
                Your browser does not support the video tag.
            </video>
        </div>

        {{-- about us --}}

        <div id="about" class="about-us" data-aos="fade-up">
            <div class="text-section">
                <h2 class="text-uppercase" data-aos="fade-up">Meet the family</h2>
                <div class="about-text" data-aos="fade-up">
                    {{-- <p>{{ $famDescription }}</p> --}}
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maxime excepturi est laboriosam cumque,
                        temporibus repellendus at autem exercitationem non quo facere nobis optio iusto molestias tempora
                        hic libero magni praesentium nisi modi possimus cupiditate obcaecati, dolore odit!</p>
                </div>
            </div>
            <div class="image-section">
                <div class="background-image" data-aos="fade-up">
                    <img src="{{ asset('storage/images/team-test.jpg') }}" alt="Team photo">
                </div>
                <div class="foreground-image" data-aos="fade-up">
                    {{-- <img src="{{ asset('storage/images/drink-test.webp') }}" alt="Drink photo"> --}}
                    {{-- <img src="{{ asset('storage/images/cocktail.jpg') }}" alt="Drink photo"> --}}
                    {{-- <img src="{{ asset('storage/images/gloves.jpeg') }}" alt="Drink photo"> --}}
                </div>
            </div>
        </div>

        {{-- Mobile Van --}}
        <div id="mobile" class="mobile" data-aos="fade-up">
            <div class="mobile-content">
                <h2 class="text-uppercase" data-aos="fade-up">We're HART + CO, mobile cocktail bar
                    specialists</h2>
                <p data-aos="fade-up">on a mission to raise your glass and your party game</p>
                <a href="{{route('mobileVanPage')}}" class="btn mobile-btn mb-3" data-aos="fade-up">Check our
                    mobile van page</a>
            </div>
        </div>

        {{-- menus --}}

        <div id="menus" class="menus d-flex flex-column align-items-center p-3">
            <h2 class="text-uppercase" data-aos="fade-up">Check Our Menus</h2>
            @if (!count($menus))
                <p class="coming-soon">Coming Soon!</p>
            @else
                <div class="menus pt-4 menus-container" data-aos="fade-up">
                    <div class="embla">
                        <div class="embla__viewport">
                            <div class="embla__container">
                                @foreach ($menus as $menu)
                                    <div class="menu-item embla__slide">
                                        <img src={{ $menu->image }} alt="">
                                        <a href="{{ route('showMenu', ['menuId' => $menu->id]) }}">{{ $menu->name }}</a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="embla__controls">
                            <div class="embla__buttons">
                                <button class="embla__button embla__button--prev" type="button" disabled="">
                                    <svg class="embla__button__svg" viewBox="0 0 532 532">
                                        <path fill="#fff"
                                            d="M355.66 11.354c13.793-13.805 36.208-13.805 50.001 0 13.785 13.804 13.785 36.238 0 50.034L201.22 266l204.442 204.61c13.785 13.805 13.785 36.239 0 50.044-13.793 13.796-36.208 13.796-50.002 0a5994246.277 5994246.277 0 0 0-229.332-229.454 35.065 35.065 0 0 1-10.326-25.126c0-9.2 3.393-18.26 10.326-25.2C172.192 194.973 332.731 34.31 355.66 11.354Z">
                                        </path>
                                    </svg>
                                </button>
                                <button class="embla__button embla__button--next" type="button" disabled="">
                                    <svg class="embla__button__svg" viewBox="0 0 532 532">
                                        <path fill="#fff"
                                            d="M176.34 520.646c-13.793 13.805-36.208 13.805-50.001 0-13.785-13.804-13.785-36.238 0-50.034L330.78 266 126.34 61.391c-13.785-13.805-13.785-36.239 0-50.044 13.793-13.796 36.208-13.796 50.002 0 22.928 22.947 206.395 206.507 229.332 229.454a35.065 35.065 0 0 1 10.326 25.126c0 9.2-3.393 18.26-10.326 25.2-45.865 45.901-206.404 206.564-229.332 229.52Z">
                                        </path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>

        {{-- Happy Hour --}}
        <div class="happy-hour mb-3">
            <h2 class="text-uppercase mb-3" data-aos="fade-up">Hart Happy Hour</h2>
            <h5 class="text-uppercase mb-3 fw-bold" data-aos="fade-up">Fridays + Saturdays 9PM till midnight</h5>
            <h5 class="text-uppercase mb-3" data-aos="fade-up">50% off all drinks with discount code:
                <strong>FAMILYDISCOUNT</strong>
            </h5>
            <p data-aos="fade-up">This discount is <strong>ONLY</strong> available when ordering through the QR code and
                <strong>NOT</strong> when ordering with a member of the family. If you do order with a member of the family
                the discount will <strong>NOT</strong> be applied.
            </p>
        </div>
        {{-- Reservations --}}

        <div id="reservations" class="contact p-3 text-center">
            <h2 class="text-uppercase" data-aos="fade-up">Hart + Co</h2>
            <div class="address mb-3" data-aos="fade-up">{{ $contactInfo->address ?? $defaultContactInfo['address'] }}
                {{ $contactInfo->postcode ?? $defaultContactInfo['postcode'] }}
                {{ $contactInfo->city ?? $defaultContactInfo['city'] }}
            </div>
            <div class="hours-and-map mb-3">
                <div id="map" data-aos="fade-up">
                    <iframe width="100%" height="100%" style="border:0" loading="lazy" allowfullscreen
                        referrerpolicy="no-referrer-when-downgrade"
                        src="https://www.google.com/maps/embed/v1/place?key={{ config('services.google.key') }}&q=Hart+Co,27+Augusta+Pl,+Royal+Leamington Spa,+Leamington+Spa+CV32 5EL,UK">
                    </iframe>
                </div>
                <div class="opening-hours">
                    <h4>Opening Hours</h4>
                    <ul data-aos="fade-up">
                        <li>Monday: 10:00AM - 02:00PM (Reservations only)</li>
                        <li>Tuesday: 10:00AM - 02:00PM (Reservations only) then 06:00PM - 10:00PM (Reservations only)</li>
                        <li>
                            Wednesday: 10:00AM - 03:00PM then 06:00PM - 11:00PM
                        </li>
                        <li>
                            Thursday: 10:00AM - 03:00PM then 06:00PM - 11:00PM
                        </li>
                        <li>Friday: 10:00AM - 03:00PM then 05:00PM - 00:30AM</li>
                        <li>Saturday: 10:00AM - 00:30AM</li>
                        <li>Sunday: 10:00AM - 03:00PM</li>
                    </ul>
                </div>

            </div>
            <div class="reservations">
                <h4 data-aos="fade-up">
                    Reservations are absolutely essential and can be made by dropping us a message on Instagram, Facebook or
                    via email. Reservations must be made at least 24hours in advance. We do not have a telephone and all
                    communication is made through Instagram, Facebook or email only! Our inboxes are open 24 hours a day!
                </h4>
                <div class="socials d-flex justify-content-center mt-3" data-aos="fade-up">
                    <a href="{{ $contactInfo->instagram ?? $defaultContactInfo['instagram'] }}" target="_blank">
                        <x-entypo-instagram />
                    </a>
                    <a href="{{ $contactInfo->facebook ?? $defaultContactInfo['facebook'] }}" target="_blank">
                        <x-entypo-facebook class="facebook-icon" />
                    </a>
                    <a href="mailto:{{ $contactInfo->email ?? $defaultContactInfo['email'] }}" target="_blank">
                        <x-entypo-email />
                    </a>
                </div>
            </div>
        </div>
        <div id="activities" class="activities p-3 text-center">
            <div class="py-4 activities-container" data-aos="fade-up">
                <div class="emblaActivities">
                    <div class="embla__viewport">
                        <div class="embla__container">
                            <div class="glide__slide activity-item">
                                <x-masterclass />
                            </div>
                            <div class="glide__slide activity-item">
                                <x-baby-shower />
                            </div>
                            <div class="glide__slide activity-item">
                                <x-kids-section />
                            </div>
                            <div class="glide__slide activity-item">
                                <x-paint-class />
                            </div>
                            <div class="glide__slide activity-item">
                                <x-pottery-class />
                            </div>
                        </div>
                    </div>
                    <div class="embla__controls mt-3">
                        <div class="embla__buttons">
                            <button class="embla__button embla__button--prev" type="button" disabled="">
                                <svg class="embla__button__svg" viewBox="0 0 532 532">
                                    <path fill="#fff"
                                        d="M355.66 11.354c13.793-13.805 36.208-13.805 50.001 0 13.785 13.804 13.785 36.238 0 50.034L201.22 266l204.442 204.61c13.785 13.805 13.785 36.239 0 50.044-13.793 13.796-36.208 13.796-50.002 0a5994246.277 5994246.277 0 0 0-229.332-229.454 35.065 35.065 0 0 1-10.326-25.126c0-9.2 3.393-18.26 10.326-25.2C172.192 194.973 332.731 34.31 355.66 11.354Z">
                                    </path>
                                </svg>
                            </button>
                            <button class="embla__button embla__button--next" type="button" disabled="">
                                <svg class="embla__button__svg" viewBox="0 0 532 532">
                                    <path fill="#fff"
                                        d="M176.34 520.646c-13.793 13.805-36.208 13.805-50.001 0-13.785-13.804-13.785-36.238 0-50.034L330.78 266 126.34 61.391c-13.785-13.805-13.785-36.239 0-50.044 13.793-13.796 36.208-13.796 50.002 0 22.928 22.947 206.395 206.507 229.332 229.454a35.065 35.065 0 0 1 10.326 25.126c0 9.2-3.393 18.26-10.326 25.2-45.865 45.901-206.404 206.564-229.332 229.52Z">
                                    </path>
                                </svg>
                            </button>
                        </div>
                        <div class="embla__dots"></div>
                    </div>
                </div>
            </div>
        </div>

        <div id="events" class="events p-3 text-center">
            <h2 class="text-uppercase" data-aos="fade-up">Upcoming Events</h2>
            <div class="events py-4 events-container" data-aos="fade-up">
                @if (!count($events))
                    <p class="coming-soon">Coming Soon!</p>
                @else
                    <div class="see-all-events mb-3">
                        <button type="button" class="btn see-more-event-btn" data-bs-toggle="modal"
                            data-bs-target="#allEventsModal">
                            See All Events
                        </button>
                    </div>
                    <div id="emblaEvents" class="emblaEvents">
                        <div class="embla__viewport">
                            <div class="embla__container">
                                @foreach ($events as $event)
                                    <div class="glide__slide event-item">
                                        <img src='{{ $event->image }}' alt="event image">
                                        <div class="event-info">
                                            <button type="button" class="see-more-event-btn" data-bs-toggle="modal"
                                                data-bs-target="#eventModal_{{ $event->id }}">See more...
                                            </button>
                                            @if ($event->link)
                                                <a href="{{ $event->link }}" target="_blank">
                                                    <x-entypo-link class="event-link" />
                                                    Get Your Tickets Here</a>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="embla__controls">
                            <div class="embla__buttons">
                                <button class="embla__button embla__button--prev" type="button" disabled="">
                                    <svg class="embla__button__svg" viewBox="0 0 532 532">
                                        <path fill="#fff"
                                            d="M355.66 11.354c13.793-13.805 36.208-13.805 50.001 0 13.785 13.804 13.785 36.238 0 50.034L201.22 266l204.442 204.61c13.785 13.805 13.785 36.239 0 50.044-13.793 13.796-36.208 13.796-50.002 0a5994246.277 5994246.277 0 0 0-229.332-229.454 35.065 35.065 0 0 1-10.326-25.126c0-9.2 3.393-18.26 10.326-25.2C172.192 194.973 332.731 34.31 355.66 11.354Z">
                                        </path>
                                    </svg>
                                </button>
                                <button class="embla__button embla__button--next" type="button" disabled="">
                                    <svg class="embla__button__svg" viewBox="0 0 532 532">
                                        <path fill="#fff"
                                            d="M176.34 520.646c-13.793 13.805-36.208 13.805-50.001 0-13.785-13.804-13.785-36.238 0-50.034L330.78 266 126.34 61.391c-13.785-13.805-13.785-36.239 0-50.044 13.793-13.796 36.208-13.796 50.002 0 22.928 22.947 206.395 206.507 229.332 229.454a35.065 35.065 0 0 1 10.326 25.126c0 9.2-3.393 18.26-10.326 25.2-45.865 45.901-206.404 206.564-229.332 229.52Z">
                                        </path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
        <div id="hire" class="hire p-3 text-center">
            <h2 class="text-uppercase" data-aos="fade-up">Private Hire</h2>
            <p data-aos="fade-up">We do hire HART out!</p>
            <p data-aos="fade-up">You can book out a table, an area, our private room, half the venue or the whole venue.
            </p>
            <p data-aos="fade-up">Our biggest single table will seat 20 people.</p>
            <p data-aos="fade-up">To book an area you will need between 15-30 people.</p>
            <p data-aos="fade-up">To book our private room you will need a maximum of 20 people.</p>
            <p data-aos="fade-up">To book half the venue you will need between 50-70 guests.</p>
            <p data-aos="fade-up">To book the full venue (except for downstairs) you will need between 80-120 guests).</p>
            <p data-aos="fade-up">There are no hire charges but there is a minimum spend required depending on the date
                that you book for.</p>
            <p data-aos="fade-up">Drop us a message with all of your event details including date, timings, occasion and
                number of guests and we can provide you with some more info!</p>
        </div>
        <div id="faq" class="faq p-3 text-center" data-aos="fade-up">
            <h2 class="text-uppercase fw-bold">FAQ's</h2>
            <button type="button" class="btn faq-btn mb-3">Show Frequently Asked Questions</button>
            <div id="faqAccordion" class="accordion">
                @foreach ($faqs as $faq)
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading{{ $loop->index }}">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapse{{ $loop->index }}" aria-expanded="false"
                                aria-controls="collapse{{ $loop->index }}">
                                {{ $faq->question }}
                            </button>
                        </h2>
                        <div id="collapse{{ $loop->index }}" class="accordion-collapse collapse"
                            aria-labelledby="heading{{ $loop->index }}" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                {!! $faq->answer !!}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        @if (count($events))
            @foreach ($events as $event)
                <x-event-modal :event="$event" />
            @endforeach
        @endif
        <x-terms-conditions-modal />
        <x-how-to-book-modal />

        <div class="modal fade" id="allEventsModal" tabindex="-1" aria-labelledby="allEventsModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="allEventsModalLabel">Events</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @if (count($events))
                            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
                                @foreach ($events as $event)
                                    <div class="col">
                                        <div class="card h-100">
                                            <img src="{{ $event->image }}" class="card-img-top" alt="event image">
                                            <div class="card-body d-flex flex-column">
                                                <h5 class="card-title">{{ $event->name ?? 'Event' }}</h5>
                                                <div class="card-text flex-grow-1"
                                                    style="
                                            max-height: 200px;
                                            overflow-y: auto
                                            ">
                                                    {!! $event->description !!}
                                                </div>
                                                @if ($event->link)
                                                    <a href="{{ $event->link }}"
                                                        class="btn btn-outline-light get-tickets-btn mt-2"
                                                        target="_blank">
                                                        Get Tickets
                                                    </a>
                                                @endif

                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        @else
                            <p>No events available.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>


    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // up and down arrows to scroll page
            const upArrow = document.querySelector(".heart-up-icon");
            const downArrow = document.querySelector(".heart-down-icon");

            const showArrow = () => {
                if (window.scrollY >= window.innerHeight) {
                    upArrow.classList.add("active");
                } else {
                    upArrow.classList.remove("active");
                }
            };
            const scrollToTop = () => {
                window.scrollBy(0, -window.scrollY);
            };

            const scrollBeyondBanner = () => {
                window.scrollBy(0, window.innerHeight);
            };

            document.addEventListener("scroll", showArrow);
            downArrow.addEventListener("click", scrollBeyondBanner);
            upArrow.addEventListener("click", scrollToTop);

            $('.faq-btn').click(function() {
                $('#faqAccordion').toggleClass('show')
                if ($('#faqAccordion').hasClass('show')) {
                    $(this).text('Hide Frequently Asked Questions');
                } else {
                    $(this).text('Show Frequently Asked Questions');
                }
            })

            function checkScreenSize() {
                return window.innerWidth <= 480;
            }
        });
    </script>
@endsection
