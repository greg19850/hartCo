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
        <div class="glide py-4 menus-container d-flex justify-content-center px-2" data-aos="fade-up">
            <div class="glide__track" data-glide-el="track">
                <ul class="glide__slides">
                    <li class="glide__slide menu-item breakfast-menu">
                        <img src="images/hartphotos/IMG_5502.jpg" alt="">
                        <h3>Breakfast Menu</h3>
                    </li>
                    <li class="glide__slide menu-item main-menu">
                        <img src='images/hartphotos/IMG_5503.jpg' alt="">
                        <h3>Main Menu</h3>
                    </li>
                    <li class="glide__slide menu-item brunch-menu">
                        <img src='images/hartphotos/IMG_5504.jpg' alt="">
                        <h3>Botomless Brunch Menu</h3>
                    </li>
                    <li class="glide__slide menu-item set-menu">
                        <img src='images/hartphotos/IMG_5505.jpg' alt="">
                        <h3>Set Menu</h3>
                    </li>
                    <li class="glide__slide menu-item snack-menu">
                        <img src='images/hartphotos/IMG_5509.jpg' alt="">
                        <h3>Snack Menu</h3>
                    </li>
                    <li class="glide__slide menu-item drinks-menu">
                        <img src='images/hartphotos/IMG_5507.jpg' alt="">
                        <h3>Drinks Menu</h3>
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


    <div class="masterclass p-3 text-center">
        <h2 class="text-uppercase" data-aos="fade-up">Cocktail Masterclass</h2>
    </div>

    <div class="hire p-3 text-center">
        <h2 class="text-uppercase" data-aos="fade-up">Private Hire</h2>
    </div>
    <div class="faq p-3 text-center">
        <h2 class="text-uppercase" data-aos="fade-up">FAQ's</h2>
    </div>
</div>
@endsection
