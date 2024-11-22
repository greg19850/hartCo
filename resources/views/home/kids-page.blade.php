@extends('layouts.layout')

@section('title', 'Children Parties')

@section('content')
    <div class="kids-page py-4">
        <h1 class="fw-bold my-5">Children Parties</h1>
        <div class="kids-description d-flex flex-column align-items-center">
            <p class="mb-0">We have teamed up with the amazing Crazy Kiln, to offer pottery painting workshops as well as our mixologists offering mocktail making classes for children!</p>
            <p class="my-5">To find out more pleas visit <a class="klin-link" href="https://www.crazykiln.co.uk/childrens-party-packages">Crazy Kiln website</a></p>
            <p>If this activities doesn't sound like your thing and you're just after pancakes and food, no worries, just drop us a message to book a regular table.</p>
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
            <p>Go as wild as you like with decorations and games, we just ask for strictly <strong>no confetti please</strong>.</p>
            <p>As we are primarily a bar we have restricted our children party times to:</p>
            <ul class="d-flex flex-column align-items-center">
                <li>Week Days</li>
                <li>Saturday mornings: 9AM till 12PM</li>
                <li>Sundays: 10AM till 3PM</li>
            </ul>
        </div>
        <div class="kids-menu mb-3">
            <h2 class="fw-bold">Our Menus</h2>
            <img class="menu-image" src="{{ asset('storage/images/kids_menu.jpg') }}" alt="Menu Image">
        </div>
        <div class="kids-mocktail">
            <h2 class="fw-bold">Childrens Mocktail Making Party</h2>
            <div class="mocktail-content d-flex flex-column align-items-center">
                <p>What's included?</p>
                <p>We will teach you how to make 2 mocktails wit a HART mixologist:</p>
                <ul>
                    <li><span class='fw-bold'>Candyland Spritz</span> (Bubblegum, Candyfloss and Lemonade)
                    </li>
                    <li><span class='fw-bold'>Mango Cooler</span> (Mango, Orange and Grenadine)
                    </li>
                </ul>
                <p><strong>£11pp</strong></p>
            </div>
        </div>
        <div class="mocktail-t-c">
            <h4 class="fw-bold">Terms and Conditions</h4>
            <ul>
                <li>Must have a minimum of 6 children</li>
                <li>Runs weekdays, saturdays before 12pm, and Sundays from 10am till 3pm</li>
                <li>Deposit of £5pp <strong>MUST</strong> be made to guarantee booking (this is non-refundable, exchangeable or transferable)</li>
                <li>The masterclass will last around 1 hour</li>
                <li>Option to add on a food package</li>
                <li>All participants must be under 18 years of age</li>
            </ul>
        </div>
    </div>
@endsection
