<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ action('Web\HomeController@index') }}">BLOG<small class="text-muted">TR</small></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item {{ request()->route()->getName() == 'home.index' ? 'active' : '' }}">
                    <a class="nav-link" href="{{ action('Web\HomeController@index') }}">Anasayfa</a>
                </li>

                <li class="nav-item {{ request()->route()->getName() == 'frontend.post.List' ? 'active' : ''}}">
                    <a class="nav-link" href="{{ action('Web\Post\NewsController@list') }}">Bloglar</a>
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
                    <a class="nav-link" href="{{ action('Web\HomeController@contact') }}">Bize Ulaşın</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
