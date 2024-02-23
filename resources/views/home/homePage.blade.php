@extends('layout')

@section('title', 'Home Page')

@section('content')

<div class="home-page">
    <x-tabler-heart-up class="heart-up-icon" />
    <div id="hart-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="motto d-flex flex-column align-items-center justify-content-center">
            <h1>You Local Girl Gang</h1>
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
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto totam eos laborum. Ad soluta similique minus eaque, sunt quisquam impedit modi non optio ex beatae culpa in autem dolores. Sint, magni iusto architecto quidem accusantium unde hic explicabo autem molestiae eveniet a ipsum soluta officia, quos animi delectus at corrupti aliquid qui mollitia. Quos repellat rem ab eum veritatis! Cupiditate possimus beatae laboriosam, veniam quas, harum, consequatur repellat omnis nam quam itaque natus id consectetur distinctio praesentium. Architecto, eius minima sequi quod veniam mollitia? Fuga, illo maiores atque culpa quibusdam, voluptatum repudiandae deleniti harum commodi doloremque incidunt similique voluptatem ea iste dolore ipsam consectetur, aliquam autem? Corrupti, molestiae enim omnis id labore iusto voluptate optio eum nam qui ab fugiat architecto nobis officiis distinctio voluptatem aperiam dolorem ea, illum vel velit sed possimus, voluptas accusantium! Sit laudantium ipsa, nemo animi molestias ea fugiat, odit provident nostrum fugit quas non distinctio sunt quos amet doloribus libero alias nihil modi dolore sapiente soluta! Neque fuga fugit tempora odio ullam fugiat autem placeat officiis vitae porro quos quo, sapiente earum dolor, dolorum asperiores iste voluptatum perspiciatis deserunt. Nam minus blanditiis earum alias eligendi iste, autem ipsa, hic debitis esse, maiores laborum placeat saepe?</p>
        </div>
    </div>

    {{-- menus --}}

    <div id="menus" class="menus d-flex flex-column align-items-center p-3">
        <h2 class="text-uppercase" data-aos="fade-up">Check Our Menus</h2>
        <div class="glide menus py-4 menus-container d-flex justify-content-center px-2" data-aos="fade-up">
            <div class="glide__track" data-glide-el="track">
                <ul class="glide__slides">
                    <li class="glide__slide menu-item breakfast-menu">
                        <img src="images/hartphotos/IMG_5502.jpg" alt="">
                        <h5><a href="">Breakfast Menu</a></h5>
                    </li>
                    <li class="glide__slide menu-item main-menu">
                        <img src='images/hartphotos/IMG_5503.jpg' alt="">
                        <h5><a href="">Main Menu</a></h5>
                    </li>
                    <li class="glide__slide menu-item brunch-menu">
                        <img src='images/hartphotos/IMG_5504.jpg' alt="">
                        <h5><a href="">Botomless Brunch Menu</a></h5>
                    </li>
                    <li class="glide__slide menu-item set-menu">
                        <img src='images/hartphotos/IMG_5505.jpg' alt="">
                        <h5><a href="">Set Menu</a></h5>
                    </li>
                    <li class="glide__slide menu-item snack-menu">
                        <img src='images/hartphotos/IMG_5509.jpg' alt="">
                        <h5><a href="">Snack Menu</a></h5>
                    </li>
                    <li class="glide__slide menu-item drinks-menu">
                        <img src='images/hartphotos/IMG_5507.jpg' alt="">
                        <h5><a href="">Drinks Menu</a></h5>
                    </li>
                </ul>
            </div>

            <div class="glide__arrows" data-glide-el="controls">
                <button class="glide__arrow glide__arrow--left" data-glide-dir="<">prev</button>
                <button class="glide__arrow glide__arrow--right" data-glide-dir=">">next</button>
            </div>
        </div>
    </div>

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
                                <x-go-link-16 /> Get Your Tickets Here</a></h5>
                    </li>
                    <li class="glide__slide event-item">
                        <img src='images/hartphotos/IMG_5505.jpg' alt="">
                        <h5><a href="">
                                <x-go-link-16 /> Get Your Tickets Here</a></h5>
                    </li>
                    <li class="glide__slide event-item">
                        <img src='images/hartphotos/IMG_5509.jpg' alt="">
                        <h5><a href="">
                                <x-go-link-16 />
                                <x-go-link-16 /> Get Your Tickets Here</a></h5>
                    </li>
                    <li class="glide__slide event-item">
                        <img src='images/hartphotos/IMG_5507.jpg' alt="">
                        <h5><a href="">
                                <x-go-link-16 /> Get Your Tickets Here</a></h5>
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
    <x-termsConditionsModal />
</div>
@endsection
