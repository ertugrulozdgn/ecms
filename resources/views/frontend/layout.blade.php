<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="{{ config('settings.Description') }}">
    <meta name="author" content="{{ config('settings.Author') }}">
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
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home.Index') }}">BLOG<small class="text-muted">TR</small></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item {{ request()->route()->getName() == 'home.Index' ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('home.Index') }}">Anasayfa</a>
                </li>

                <li class="nav-item {{ request()->route()->getName() == 'frontend.blog.Index' ? 'active' : ''}}">
                    <a class="nav-link" href="{{ route('frontend.blog.Index') }}">Bloglar</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Sayfalar
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
                        @foreach($pagesNav as $pageNav)
                            <a class="dropdown-item" href="{{ $pageNav->link }}"><i class="fas fa-angle-double-right text-muted"></i> {{ $pageNav->title }}</a>
                        @endforeach
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('frontend.contact.index') }}">Bize Ulaşın</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

{{--@widget('header')--}}


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

