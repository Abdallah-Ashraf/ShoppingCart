<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        

        <title>Shopping Cart </title>
        <!-- Responsive meta tag -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Fonts -->
        

        <!-- Styles -->
        <link rel="stylesheet" href="bootstrap4/css/bootstrap.min.css"  crossorigin="anonymous"> <!-- load bootstrap  -->
        <link href="/fontawesome/css/all.css" rel="stylesheet"> <!--load font Awesome -->
        <link rel="stylesheet" href="rangeslider/css/ion.rangeSlider.min.css"/> <!-- load range slider -->
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
        <meta name="csrf-token" content="{{ csrf_token() }}" /> <!-- used in post requests -->
    </head>
    <body>
        @yield("content") 
        
        <script src="jquery/jquery-3.5.1.js" crossorigin="anonymous"></script> <!-- load jquery -->
        <script src="popper/popper.min.js" crossorigin="anonymous"></script> <!-- load popper-->
        <script src="bootstrap4/js/bootstrap.min.js"  crossorigin="anonymous"></script> <!-- load bootstrap -->
        <script src="rangeslider/js/ion.rangeSlider.min.js"></script>   <!-- load range Slider -->
        <script src="js/index.js" ></script> <!-- load java script logic used  -->
    </body>
</html>
