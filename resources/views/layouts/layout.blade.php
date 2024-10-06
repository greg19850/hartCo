<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <script src="https://unpkg.com/embla-carousel/embla-carousel.umd.js"></script>
    <script src="https://unpkg.com/embla-carousel-auto-scroll/embla-carousel-auto-scroll.umd.js"></script>

    <link rel = "stylesheet" href = "http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css"/>
    <script src = "http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script>

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <title>Hart & Co @yield('title')</title>
</head>
<body>
    <header>
        <div class="img-container">
            <img src='images/hart logo.png' alt="logo" />
        </div>
        <x-tabler-menu-deep class="menu-icon" />
        <x-nav-menu />
    </header>

    <div class="page-content container-fluid p-0">
        @yield('content')
    </div>

    <x-footer />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@glidejs/glide"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        var sliders = document.getElementsByClassName("glide");


        for (var i = 0; i < sliders.length; i++) {
            if (i === 0) {
                const config = {
                    type: 'carousel'
                    , perView: 3
                    , animationDuration: 1000
                    , breakpoints: {
                        900: {
                            perView: 2
                        }
                        , 500: {
                            perView: 1
                        }
                    }
                }

                var glide = new Glide(sliders[i], config);
                glide.mount();
            } else if (i === 1) {
                const config = {
                    type: 'carousel'
                    , perView: 2
                    , animationDuration: 1000
                    , autoplay: 2000
                    , breakpoints: {
                        900: {
                            perView: 2
                        }
                        , 500: {
                            perView: 1
                        }
                    }
                }

                var glide = new Glide(sliders[i], config);
                glide.mount();
            }

        }

    </script>
    <script>
        AOS.init();

    </script>
</body>
</html>
