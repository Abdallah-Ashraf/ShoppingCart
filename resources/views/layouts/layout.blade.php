<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Shopping Cart </title>
        <!-- Responsive meta tag -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Fonts -->
        

        <!-- Styles -->
        <link rel="stylesheet" href="bootstrap4/css/bootstrap.min.css"  crossorigin="anonymous"> <!-- load bootstrap  -->
        <link href="/fontawesome/css/all.css" rel="stylesheet"> <!--load font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.0/css/ion.rangeSlider.min.css"/> <!-- load range slider -->
        <style>
            html, body {
               
                height: 100vh;
                margin: 0;
            }
            .nav{
                margin-top: 1%;
            }
            .range-element{
                padding: .375rem .25rem;
            }
            .category, .brand{
                cursor: pointer;
            }

            
        </style>
        <meta name="csrf-token" content="{{ csrf_token() }}" />
    </head>
    <body>
        @yield("content")
        
        <script src="jquery/jquery-3.5.1.js" crossorigin="anonymous"></script>
        <script src="popper/popper.min.js" crossorigin="anonymous"></script>
        <script src="bootstrap4/js/bootstrap.min.js"  crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.0/js/ion.rangeSlider.min.js"></script>
        <script src="js/index.js" ></script>
    </body>
</html>
