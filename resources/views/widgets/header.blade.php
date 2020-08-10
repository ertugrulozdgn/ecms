{{--<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">--}}
{{--    <div class="container">--}}
{{--        <a class="navbar-brand" href="{{ route('home.Index') }}">BLOG<small class="text-muted">TR</small></a>--}}
{{--        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">--}}
{{--            <span class="navbar-toggler-icon"></span>--}}
{{--        </button>--}}
{{--        <div class="collapse navbar-collapse" id="navbarResponsive">--}}
{{--            <ul class="navbar-nav ml-auto">--}}
{{--                <li class="nav-item {{ request()->route()->getName() == 'home.Index' ? 'active' : '' }}">--}}
{{--                    <a class="nav-link" href="{{ route('home.Index') }}">Anasayfa</a>--}}
{{--                </li>--}}

{{--                <li class="nav-item {{ request()->route()->getName() == 'frontend.blog.Index' ? 'active' : ''}}">--}}
{{--                    <a class="nav-link" href="{{ route('frontend.blog.Index') }}">Bloglar</a>--}}
{{--                </li>--}}

{{--                <li class="nav-item dropdown">--}}
{{--                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                        Sayfalar--}}
{{--                    </a>--}}
{{--                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">--}}
{{--                        @foreach($pages as $page)--}}
{{--                        <a class="dropdown-item" href="{{ route('frontend.page.Detail',$page->slug) }}"><i class="fas fa-angle-double-right text-muted"></i> {{ $page->title }}</a>--}}
{{--                        @endforeach--}}
{{--                    </div>--}}
{{--                </li>--}}

{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link" href="">Bize Ulaşın</a>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</nav>--}}
