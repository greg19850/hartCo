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
        <button class="carousel-control-prev" type="button" data-bs-target="#hart-carousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#hart-carousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    {{-- about us --}}

    <div class="about-us p-3">
        <h2 class="about-header text-uppercase">Meet the family</h2>
        <div class="about-text">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto totam eos laborum. Ad soluta similique minus eaque, sunt quisquam impedit modi non optio ex beatae culpa in autem dolores. Sint, magni iusto architecto quidem accusantium unde hic explicabo autem molestiae eveniet a ipsum soluta officia, quos animi delectus at corrupti aliquid qui mollitia. Quos repellat rem ab eum veritatis! Cupiditate possimus beatae laboriosam, veniam quas, harum, consequatur repellat omnis nam quam itaque natus id consectetur distinctio praesentium. Architecto, eius minima sequi quod veniam mollitia? Fuga, illo maiores atque culpa quibusdam, voluptatum repudiandae deleniti harum commodi doloremque incidunt similique voluptatem ea iste dolore ipsam consectetur, aliquam autem? Corrupti, molestiae enim omnis id labore iusto voluptate optio eum nam qui ab fugiat architecto nobis officiis distinctio voluptatem aperiam dolorem ea, illum vel velit sed possimus, voluptas accusantium! Sit laudantium ipsa, nemo animi molestias ea fugiat, odit provident nostrum fugit quas non distinctio sunt quos amet doloribus libero alias nihil modi dolore sapiente soluta! Neque fuga fugit tempora odio ullam fugiat autem placeat officiis vitae porro quos quo, sapiente earum dolor, dolorum asperiores iste voluptatum perspiciatis deserunt. Nam minus blanditiis earum alias eligendi iste, autem ipsa, hic debitis esse, maiores laborum placeat saepe?</p>
        </div>
    </div>

    {{-- menus --}}

    <div class="menus">

    </div>
</div>

@endsection
