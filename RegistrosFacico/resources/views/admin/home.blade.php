@extends('layouts.app')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FaCiCo</title>
</head>
<body>
    <!-- HEADER DESKTOP-->
<header class="header-desktop" style="background-color: #2d5135; width: 100%; padding: 0;">
    <nav class="container-fluid" style="padding: 0;">
        <center>
            <img src="{{ asset('img/logouaem.png') }}" alt="uaem">
            @include('layouts.checking')

        </center>
    </nav>
</header>


<!-- END HEADER DESKTOP-->
    <h2>Home, renderear tablas aqui</h2>

<!-- footer -->
<footer class="mt-auto">
    <div class="row">
        <div class="col-md-12">
            <div class="footer-content" style="background-color: #2d5135;">
                <center>
                    <img src="{{ asset('img/logofacico.png') }}" alt="uaem" width="316px" height="97px">
                </center>
            </div>
        </div>
    </div>
</footer>
<!-- end footer -->
</body>
</html>