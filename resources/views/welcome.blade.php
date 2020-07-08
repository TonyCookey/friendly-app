<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Carrois+Gothic|Fugaz+One|Itim" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script|Kaushan+Script|Lobster+Two|Pacifico|Permanent+Marker"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <meta name="description" content="Friendly Social Network allows users to connect with friends and loved ones">
    <meta name="keywords" content="Friendly,Social,Network,App,friend,social,live,status,social-media,media,soc,top social networks,friend me">
    <meta name="author" content="Tony Cookey">
    <title>Friendly</title>
    <style>
        .mynavitems {
            padding-right: 10px;
            padding-left: 10px;
        }

        .mysmallnavitems {
            padding-right: 5px;
            padding-left: 5px;
        }

        .freeme {
            padding-top: 10px;
            padding-bottom: 10px;
        }

        .freemesmall {
            padding-top: 5px;
            padding-bottom: 5px;
        }

        .comeup {
            margin-top: -6px;
            margin-bottom: 3px;

        }

        .small-font-size {
            font-size: 13px;

        }

        .givemespace {
            margin-top: 5px;
            margin-bottom: 5px;

        }

        .smaller-font-size {
            font-size: 12px;

        }

        a {
            font-family: 'Carrois Gothic', sans-serif;

        }
        h6 {
            font-family: 'Carrois Gothic', sans-serif;
            text-decoration: none;

        }

        h5 {
            font-family: 'Itim', cursive;
        }

        h4 {
            font-family: 'Fugaz One', cursive;
        }

        p {
            font-family: 'Poppins', sans-serif;
            font-size: 13px;
        }

        h1,
        h2 {
            font-family: 'Pacifico', cursive;
            margin-bottom: 20px;
        }

        button,  label {
            font-family: 'Carrois Gothic', sans-serif;
            font-size: 13px;
        }

        small {
            font-size: 12px;
        }

        #bk-image-2 {
            background-image: url(https://images.pexels.com/photos/1524105/pexels-photo-1524105.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940);
            /* background-image: url(img/thought-catalog-23KdVfc395A-unsplash.jpg); */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
        #bk-image{
            background-image: url(img/photo-of-two-women-smiling-wearing-white-shirt-2467450.jpg);
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .centralize {
            padding-top: 10vh;
        }
        .full-height{
            height:100vh;
        }
        .alert {
            position: absolute;
            /* padding: .75rem 1.25rem; */
            margin-bottom: 2rem;
            border: 1px solid transparent;
            border-radius: .25rem;
            right: 5vh;
        }

    </style>
</head>

<body">
    <!-- @include('partials.nav') -->

    <div class="container-fluid">
        @include('partials.auth-alert') @yield('content')
    </div>




    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>

</body>

</html>
