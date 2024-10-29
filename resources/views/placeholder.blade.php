<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;400&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="/images/favicon.ico">
    <script src="https://kit.fontawesome.com/a482bba2ba.js" crossorigin="anonymous"></script>
    <title>Hart+Co</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
            font-style: normal;
        }

        html,
        body {
            height: 100vh;
            background-color: #ff90bc;
            overflow: hidden;
        }

        .container{
            width: 800px;
            height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin: 0 auto;
        }

        .img-container{
            width: 50%;
            height: auto;
            margin-bottom: 15px;
        }

        .img-container img{
            width: 100%;
            height: 100%;
        }

        p{
            color: #fff;
            font-size: 18px;
            margin-bottom: 10px;
        }

        .socials{
            width: 50%;
            display: flex;
            justify-content: space-around;
            align-items: center;
            margin-top: 20px;
        }

        a{
            text-decoration: none;
            color: #fff;
            font-size: 22px;
        }

        a:hover{
            color: #ac87c5;
        }


        @media screen and (max-width: 480px) {
            .container{
                width: 450px;
                height: 100vh;
            }

            .img-container{
                width: 80%;
                height: auto;
                margin-bottom: 25px;
            }

            p{
                width: 80%;
                font-size: 16px;
                margin-bottom: 15px;
                text-align: center;
            }

            .socials{
                width: 80%;
                margin-top: 25px;
            }
        }
    </style>
</head>
<body>
<div class="container">
    <div class="img-container">
        <x-hart-logo />
    </div>
    <p>Our new website is currently in the making, and will be available very soon!</p>
    <p>In the meantime, check out our other socials:</p>
    <div class="socials">
        <a href="https://www.instagram.com/hartleamington/" target="_blank"><i class="fa-brands fa-instagram"></i> Instagram</a>
        <a href="https://www.facebook.com/hartrestaurants1/" target="_blank"><i class="fa-brands fa-square-facebook"></i> Facebook</a>
    </div>
</div>
</body>
</html>
