<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="{{ config('settings.Description') }}">
    <meta name="author" content="{{ config('setting') }}">
    <meta name="keywors" content="{!! config('settings.Keywords') !!}">

    <title>@yield('title')</title>

{{--    <title>{{ config('settings.Title') }}</title>--}}

    <!-- Bootstrap core CSS -->
    <link href="/frontend/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/frontend/css/modern-business.css" rel="stylesheet">

    <link rel="stylesheet" href="/backend/custom/css/custom.css">

    <script src="https://kit.fontawesome.com/ded3d6d8e7.js" crossorigin="anonymous"></script>

</head>

<body>


@widget('header')


@yield('content')

<!-- Footer -->
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">{{ config('settings.Footer') }}</p>
    </div>
    <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="/frontend/vendor/jquery/jquery.min.js"></script>
<script src="/frontend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>

