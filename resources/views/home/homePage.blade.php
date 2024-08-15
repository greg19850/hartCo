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
        @if(!$menus)
        <p>Menus section coming soon</p>
        @else
        <div class="glide menus py-4 menus-container d-flex justify-content-center px-2" data-aos="fade-up">
            <div class="glide__track" data-glide-el="track">
                <ul class="glide__slides">
                    @foreach($menus as $menu)
                    <li class="glide__slide menu-item breakfast-menu">
                        <img src={{$menu->image}} alt="">
                        <h5><a href="/menus/breakfast_menu">{{$menu->name}}</a></h5>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="glide__arrows" data-glide-el="controls">
                <button class="glide__arrow glide__arrow--left" data-glide-dir="<">prev</button>
                <button class="glide__arrow glide__arrow--right" data-glide-dir=">">next</button>
            </div>
        </div>
    </div>
    @endif
    <div class="contact p-3 text-center">
        <h2 class="text-uppercase" data-aos="fade-up">Reservations/Contract Page/Opening Hours</h2>
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
        <h2 class="text-uppercase" data-aos="fade-up">Events</h2>
        <div class="glide events py-4 events-container d-flex justify-content-center px-2" data-aos="fade-up">
            <div class="glide__track" data-glide-el="track">
                <ul class="glide__slides">
                    <li class="glide__slide event-item">
                        <img src='images/hartphotos/IMG_5504.jpg' alt="">
                        <h5><a href="">
                                Get Your Tickets Here</a></h5>
                    </li>
                    <li class="glide__slide event-item">
                        <img src='images/hartphotos/IMG_5505.jpg' alt="">
                        <h5><a href="">
                                Get Your Tickets Here</a></h5>
                    </li>
                    <li class="glide__slide event-item">
                        <img src='images/hartphotos/IMG_5509.jpg' alt="">
                        <h5><a href="">
                                Get Your Tickets Here</a></h5>
                    </li>
                    <li class="glide__slide event-item">
                        <img src='images/hartphotos/IMG_5507.jpg' alt="">
                        <h5><a href="">
                                Get Your Tickets Here</a></h5>
                    </li>
                </ul>
            </div>

            <div class="glide__arrows" data-glide-el="controls">
                <button class="glide__arrow glide__arrow--left" data-glide-dir="<">prev</button>
                <button class="glide__arrow glide__arrow--right" data-glide-dir=">">next</button>
            </div>
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