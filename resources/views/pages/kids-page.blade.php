@extends('layouts.layout')

@section('title', 'Children Parties')

@section('content')
    <div class="kids-page py-4">
        <h1 class="fw-bold mt-5 mb-3">Children Parties</h1>
        <div class="kids-description d-flex flex-column align-items-center mb-3">
            <p>We are now hosting children's parties 7 days a week. </p>
            <p class="mb-2">We offer:</p>
            <ul class="ms-0 ps-0">
                <li class="mb-2">Book a table for food from either our breakfast/main menu or from one of our children's party food </li>
                <li class="mb-2">Mocktail Making Class</li>
                <li class="mb-2">Pottery Painting Class with Crazy Kiln</li>
            </ul>
        </div>
        <div class="kids-menu mb-3">
            <h2 class="fw-bold">Our Menus</h2>
            <img class="menu-image" src="{{ asset('storage/images/kids_menu.png') }}" alt="Menu Image">
        </div>
        <div class="kids-mocktail mb-3">
            <h2 class="fw-bold">Mocktail Making Party</h2>
            <img class="mocktail-image" src="{{ asset('storage/images/mocktails.png') }}" alt="Menu Image">
        </div>
        <div class="pottery-painting d-flex flex-column align-items-center mb-3">
            <h2 class="fw-bold">Pottery Painting</h2>
            <p class="mb-0">We have teamed up with the Crazy Kiln to offer children's pottery paining parties.</p>
            <p class="my-3">To find out more or to book for pottery painting please go directly to:</p>
            <a class="klin-link mx-1" href="https://www.crazykiln.co.uk/childrens-party-packages">Crazy Kiln</a>
        </div>
        <div class="booking d-flex flex-column align-items-center">
            <h2 class="fw-bold">Bookings</h2>
            <p>To Find out more or to book in for a food or mocktail class please contact us on:</p>
            <div class="socials d-flex justify-content-center my-3">
                <a href="{{$contactInfo->instagram ?? $defaultContactInfo['instagram']}}" target="_blank">
                    <x-entypo-instagram/>
                </a>
                <a href="{{$contactInfo->facebook ?? $defaultContactInfo['facebook']}}" target="_blank">
                    <x-entypo-facebook class="facebook-icon"/>
                </a>
                <a href="mailto:{{$contactInfo->email ?? $defaultContactInfo['email']}}" target="_blank">
                    <x-entypo-email/>
                </a>
            </div>
        </div>
    </div>
@endsection
