@extends('layouts.layout')

@section('title', 'Home Page')

@section('content')
<div class="home-page">
    <x-tabler-heart-up class="heart-up-icon" />
    <div id="hart-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="motto d-flex flex-column align-items-center justify-content-center">
            <h1>{{$motto}}</h1>
            <x-tabler-heart-down class="heart-down-icon" />
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src='images/hartphotos/IMG_5508.jpg' class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src='images/hartphotos/IMG_5503.jpg' class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src='images/hartphotos/IMG_5509.jpg' class="d-block w-100" alt="...">
            </div>
        </div>
    </div>

    {{-- about us --}}

    <div id="about" class="about-us p-3" data-aos="fade-up">
        <h2 class="text-uppercase" data-aos="fade-up">Meet the family</h2>
        <div class="about-text" data-aos="fade-up">
            <p>{{$famDescription}}</p>
        </div>
    </div>

    {{-- menus --}}

    <div id="menus" class="menus d-flex flex-column align-items-center p-3">
        <h2 class="text-uppercase" data-aos="fade-up">Check Our Menus</h2>
        @if(!count($menus))
            <p class="coming-soon">Coming Soon!</p>
        @else
        <div class="menus pt-4 menus-container" data-aos="fade-up">
            <div class="embla">
                <div class="embla__viewport">
                    <div class="embla__container">
                        @foreach($menus as $menu)
                            <div class="menu-item embla__slide">
                                <img src={{$menu->image}} alt="">
                                <a href="/menus/breakfast_menu">{{$menu->name}}</a>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="embla__controls">
                    <div class="embla__buttons">
                        <button
                            class="embla__button embla__button--prev"
                            type="button"
                            disabled=""
                        >
                            <svg class="embla__button__svg" viewBox="0 0 532 532">
                                <path
                                    fill="#fff"
                                    d="M355.66 11.354c13.793-13.805 36.208-13.805 50.001 0 13.785 13.804 13.785 36.238 0 50.034L201.22 266l204.442 204.61c13.785 13.805 13.785 36.239 0 50.044-13.793 13.796-36.208 13.796-50.002 0a5994246.277 5994246.277 0 0 0-229.332-229.454 35.065 35.065 0 0 1-10.326-25.126c0-9.2 3.393-18.26 10.326-25.2C172.192 194.973 332.731 34.31 355.66 11.354Z"
                                ></path>
                            </svg></button
                        ><button
                            class="embla__button embla__button--next"
                            type="button"
                            disabled=""
                        >
                            <svg class="embla__button__svg" viewBox="0 0 532 532">
                                <path
                                    fill="#fff"
                                    d="M176.34 520.646c-13.793 13.805-36.208 13.805-50.001 0-13.785-13.804-13.785-36.238 0-50.034L330.78 266 126.34 61.391c-13.785-13.805-13.785-36.239 0-50.044 13.793-13.796 36.208-13.796 50.002 0 22.928 22.947 206.395 206.507 229.332 229.454a35.065 35.065 0 0 1 10.326 25.126c0 9.2-3.393 18.26-10.326 25.2-45.865 45.901-206.404 206.564-229.332 229.52Z"
                                ></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
    <div class="contact p-3 text-center">
        <h2 class="text-uppercase" data-aos="fade-up">Hart + Co</h2>
        <div class="address mb-3" data-aos="fade-up">{{$contactInfo->address ?? $defaultContactInfo['address']}} {{$contactInfo->postcode ?? $defaultContactInfo['postcode']}} {{$contactInfo->city ?? $defaultContactInfo['city']}}</div>
        <div class="hours-and-map mb-3">
            <div id = "map" style = "width: 400px; height: 300px" data-aos="fade-up"></div>
            <ul class="opening-hours" data-aos="fade-up">
                <h4>Opening Hours</h4>
                <li>Friday: 10:00 AM - 11:00 PM</li>
                <li>Saturday: 10:00 AM- 11:00 PM</li>
                <li>Sunday: 10:00 AM- 4:00 PM</li>
                <li>Monday: 9:30 AM - 2:00 PM</li>
                <li>Tuesday: 9:30 AM - 3:00 PM / 6:00 PM- 10:00 PM (reservations only )</li>
                <li>
                    Wednesday: 9:30 AM - 3:00 PM / 6:00 PM- 11:00 PM
                </li>
                <li>
                    Thursday: 9:30 AM - 3:00 PM / 6:00 PM- 11:00 PM
                </li>
            </ul>
        </div>
        <div class="reservations">
            <h4 class="me-5" data-aos="fade-up">
                All Reservations can be placed through our social media:
            </h4>
            <div class="socials d-flex justify-content-center mt-3" data-aos="fade-up">
                <a href="{{$contactInfo->instagram ?? $defaultContactInfo['instagram']}}" target="_blank">
                    <x-entypo-instagram /></a>
                <a href="{{$contactInfo->facebook ?? $defaultContactInfo['facebook']}}" target="_blank">
                    <x-entypo-facebook class="facebook-icon" /></a>
                <a href="mailto:{{$contactInfo->email ?? $defaultContactInfo['email']}}" target="_blank">
                    <x-entypo-email /></a>
            </div>
        </div>
    </div>


    <div id="masterclass" class="masterclass p-3 text-center">
        <h2 class="text-uppercase mb-3" data-aos="fade-up">Bjorns Cocktail Masterclass</h2>
        <h5 data-aos="fade-up">Cocktail Masterclass withj one of the Hart Family!</h5>
        <p data-aos="fade-up">What's included?</p>
        <p data-aos="fade-up">Welcome 'Bjornstar' Martini on arrival</p>
        <p data-aos="fade-up">Three taught Family recipe cocktails which include:</p>
        <ul>
            <li data-aos="fade-up"><span class='fw-bold'>Nanny Violet's Bramble</span> (Gin, Lemons and Blackberries)</li>
            <li data-aos="fade-up"><span class='fw-bold'>Mummy Hart's Chocolate Overindulgence</span> (White chocolate liquor, Disaranno and Hazelnut Rum)</li>
            <li data-aos="fade-up"><span class='fw-bold'>Glitterbomb Martini</span> (Vodka, Pineapple and strawberries)</li>
            <p data-aos="fade-up">The chance to learn variety of cocktail skills and the opportunity to ask the family any questions!</p>
            <p data-aos="fade-up">£37pp</p>
            <button type="button" class="btn mb-3" data-bs-toggle="modal" data-bs-target="#tc-modal" data-aos="fade-up">
                Read Masterclass Terms and Conditions
            </button>
            <a href="https://www.instagram.com/hartleamington/?hl=en" class='d-block' data-aos="fade-up">For Bookings DM us on instagram</a>
        </ul>
    </div>

    <div id="events" class="events p-3 text-center">
        <h2 class="text-uppercase" data-aos="fade-up">Upcoming Events</h2>
        <div class="events py-4 events-container" data-aos="fade-up">
            @if(!count($events))
                <p class="coming-soon">Coming Soon!</p>
            @else
                <div class="emblaEvents">
                    <div class="embla__viewport">
                        <div class="embla__container">
                            @foreach($events as $event)
                                <div class="glide__slide event-item">
                                    <img src='{{$event->image}}' alt="eventy image">
                                    @if($event->link)
                                        <a href="{{$event->link}}" target="_blank"> <x-entypo-link class="event-link" />Get Your Tickets Here</a>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="embla__controls">
                        <div class="embla__buttons">
                            <button
                                class="embla__button embla__button--prev"
                                type="button"
                                disabled=""
                            >
                                <svg class="embla__button__svg" viewBox="0 0 532 532">
                                    <path
                                        fill="#fff"
                                        d="M355.66 11.354c13.793-13.805 36.208-13.805 50.001 0 13.785 13.804 13.785 36.238 0 50.034L201.22 266l204.442 204.61c13.785 13.805 13.785 36.239 0 50.044-13.793 13.796-36.208 13.796-50.002 0a5994246.277 5994246.277 0 0 0-229.332-229.454 35.065 35.065 0 0 1-10.326-25.126c0-9.2 3.393-18.26 10.326-25.2C172.192 194.973 332.731 34.31 355.66 11.354Z"
                                    ></path>
                                </svg></button
                            ><button
                                class="embla__button embla__button--next"
                                type="button"
                                disabled=""
                            >
                                <svg class="embla__button__svg" viewBox="0 0 532 532">
                                    <path
                                        fill="#fff"
                                        d="M176.34 520.646c-13.793 13.805-36.208 13.805-50.001 0-13.785-13.804-13.785-36.238 0-50.034L330.78 266 126.34 61.391c-13.785-13.805-13.785-36.239 0-50.044 13.793-13.796 36.208-13.796 50.002 0 22.928 22.947 206.395 206.507 229.332 229.454a35.065 35.065 0 0 1 10.326 25.126c0 9.2-3.393 18.26-10.326 25.2-45.865 45.901-206.404 206.564-229.332 229.52Z"
                                    ></path>
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
        <p data-aos="fade-up">We can hire out small areas of the bar or the entire venue.</p>
        <p data-aos="fade-up">There is no charge or minimum spend to hire out small areas.</p>
        <p data-aos="fade-up">There is no charge but a minimum spend which varies depending on the date you book to hire the entire venue.</p>
        <p data-aos="fade-up">Drop us a message with all of your event details including date, timings and number of guests and we can provide more info!</p>
    </div>
    <div id="faq" class="faq p-3 text-center">
        <h2 class="text-uppercase" data-aos="fade-up">FAQ's</h2>
    </div>
    <x-terms-conditions-modal />
</div>
@endsection
