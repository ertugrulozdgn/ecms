@extends('web.layout')
@section('title', config('settings.Title'))
@section('content')
    <header>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner" role="listbox">
                @foreach($post_headlines as $post_headline)
                <div class="carousel-item {{ $loop->first ? 'active' : '' }}" style="background-image: url('/storage/images/posts/{{ $post_headline->image }}')">
                    <div class="carousel-caption d-none d-md-block">
                            <a class="text-white" href="{{ $post_headline->link }}"><h3>{{ $post_headline->title }}</h3></a>
                    </div>
                </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </header>

    <!-- Page Content -->
    <div class="container">

        <h2 class="text-muted mt-4">Bloglar</h2>

        <hr>

        <div class="row">
            @foreach($posts as $post)
                <div class="col-lg-4 col-sm-6 portfolio-item">
                    <div class="card h-100">
                        <a href="{{ $post->link }}"><img class="card-img-top" src="/storage/images/posts/{{ $post->image }}" alt=""></a>
                        <div class="card-body">
                            <span class="text-muted">{{ $post->published_at->diffForHumans() }}</span>
                            <h4 class="card-title">
                                <a href="{{ $post->link }}">{{ $post->title }}</a>
                            </h4>
                            <p class="card-text">{!! substr($post->content,0,140).'...' !!}</p>
                            <hr>
                            <span class="text-muted mr-auto">{{ $post->user->name }}</span>
                            <span class="text-muted" style="float: right;"><i style="color: green;" class="fas fa-eye fa-sm"></i> {{ $post->hit }}</span>
                        </div>
                    </div>
                </div>
            @endforeach

            <hr>

        </div>
        <hr>
    </div>
    <!-- /.container -->
@endsection
