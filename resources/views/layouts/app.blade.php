<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Read</title>
    <meta name="description" content="Read is a minimalistici html template." />
    <meta name="HandheldFriendly" content="True" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="#">
    <link href='https://fonts.googleapis.com/css?family=Montserrat:700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Radley:400,400italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/style.css">
</head>
<body>
    <div class="container">
        @include('layouts.header')
        @yield('content')
        @include('layouts.footer')
        @include('layouts.copyright')
    </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript" src="/assets/js/jquery-1.12.0.min.html"></script>
    <script type="text/javascript" src="/assets/js/main.js"></script>
    <script type="text/javascript" src="/assets/js/jquery.fitvids.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
 </body>
</html>
