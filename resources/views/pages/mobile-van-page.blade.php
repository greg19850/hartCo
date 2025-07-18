@extends('layouts.layout')

@section('title', 'Mobile Cocktail Bar')

@section('content')
<div class="mobile-van-page">
    <div id="van-video">
        <div class="van-motto d-flex flex-column align-items-center justify-content-center">
            <h1 class="motto-text">We're HART + CO</h1>
            <h2>Mobile event bar specialists</h2>
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
    <div class="van-title-text">
        <p>From weddings and birthdays to wild garden dos and swanky corporate soirées, we roll in with beautiful bars,
            custom menus, and mixologists who know their way around both a French Martini and a dance floor. </p>
        <p>Wherever the party is—we'll meet you there. And bring the booze.</p>

    </div>
    <div id="why-hart" class="why-hart">
        <h2>Why Choose HART + CO?</h2>
        <div class="reason-desc">
            <h3>🍸 Cocktails on Wheels? Yes, Please!</h3>
            <p>We're HART + CO—your on-demand party starters. We roll up with a gorgeous mobile bar, shake up the finest
                cocktails, and keep the good times flowing. It's like magic, but with more gin.</p>
        </div>
        <div class="reason-desc">
            <h3>🎉 Your Party, Your Way </h3>
            <p>Want Spicy Margs and fire? Cherry Sour served with a fortune cookie? Or an Espresso Martini with biscoff?
                We've got you. Every event gets a custom drinks menu designed to match your vibe— from laid-back garden
                hangs to full-blown wedding bashes.</p>
        </div>
        <div class="reason-desc">
            <h3>🚐 We Bring the Bar (Literally) </h3>
            <p>No venue bar? No problem. Our mobile setups are stylish, fully kitted out, and ready to roll into back
                gardens, barns, rooftops, fields—you name it. All we need is a spot to park and a crowd to impress.</p>
        </div>
        <div class="reason-desc">
            <h3>🍹 Shaken by Legends</h3>
            <p>Our mixologists don't just pour drinks—they perform them. With flair, fun, and the occasional cheeky
                garnish, they'll have your guests raving about more than just the cocktails (but the cocktails are also
                rave-worthy).</p>
        </div>
        <div class="reason-desc">
            <h3>💃🏼 Effortlessly Extra</h3>
            <p>From the first email to the final cheers, we make it all smooth, simple, and totally stress-free. Just
                tell us when and where—and we'll bring the sparkle, the sass, and the seriously good drinks.</p>
        </div>
        <div class="reason-desc">
            <h3>🎉 Stress? Not on Our Watch</h3>
            <p>You enjoy the party. We'll handle the setup, the glassware, the booze, the clean-up—everything. All you
                have to do is say cheers.</p>
        </div>
    </div>
    <div class="van-img-section">
        <img src="" alt="">
        <img src="" alt="">
        <img src="" alt="">
    </div>
    <form action="" class="contact-form">
        <h2>Interested? Let's talk!</h2>
        <div class="fs-field">
            <label class="fs-label" for="name">Name</label>
            <input type="text" class="fs-input" id="name" name="name" required />
        </div>
        <div class="fs-field">
            <label class="fs-label" for="email">Email Address</label>
            <input type="email" class="fs-input" id="email" name="email" required />
        </div>
        <div class="fs-field">
            <label class="fs-label" for="event">Type Of Event</label>
            <input type="text" class="fs-input" id="event" name="event" required />
        </div>
        <div class="fs-field">
            <label class="fs-label" for="date">Date Of Event</label>
            <input type="date" class="fs-input" id="date" name="date" required></input>
        </div>
        <div class="fs-field">
            <label class="fs-label" for="guests">Number Of Guests</label>
            <input type="number" class="fs-input" id="guests" name="guests" required></input>
        </div>
        <div class="fs-field">
            <label class="fs-label" for="message">How can we help</label>
            <textarea class="fs-textarea" id="message" name="message" required></textarea>
        </div>
        <div class="fs-field">
            <label class="fs-label" for="location">Location</label>
            <input type="text" class="fs-input" id="location" name="location" required />
        </div>
        <div class="fs-button-group">
            <button class="fs-button" type="submit">Submit</button>
        </div>
    </form>
    <div class="van-img-section">
        <img src="" alt="">
        <img src="" alt="">
        <img src="" alt="">
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

        const elem = document.querySelector('input[name="date"]');
        const datepicker = new Datepicker(elem, {
            autohide: true,
            format: 'dd/mm/yyyy',
            minDate: 'current date'
        });
    </script>
</div>
@endsection
