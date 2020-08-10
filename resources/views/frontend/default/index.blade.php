@extends('frontend.layout')
@section('title', config('settings.Title'))
@section('content')
    <header>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner" role="listbox">
                @foreach($sliders as $slider)
                <div class="carousel-item {{ $loop->first ? 'active' : '' }}" style="background-image: url('/storage/images/sliders/{{ $slider->image }}')">
                    <div class="carousel-caption d-none d-md-block">
                        @if(strlen($slider->url) > 0)
                            <a href="{{ $slider->url }}">
                                <h3>{{ $slider->title }} (link)</h3>
                            </a>
                        @else
                            <a class="text-white" href="{{ route('frontend.slider.Detail',[$slider->slug,$slider->id]) }}"><h3>{{ $slider->title }}</h3></a>
                        @endif
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
            @foreach($blogs as $blog)
                <div class="col-lg-4 col-sm-6 portfolio-item">
                    <div class="card h-100">
                        <a href="{{ $blog->link }}"><img class="card-img-top" src="/storage/images/blogs/{{ $blog->image }}" alt=""></a>
                        <div class="card-body">
                            <span class="text-muted">{{ $blog->created_at->diffForHumans() }}</span>
                            <h4 class="card-title">
                                <a href="{{ $blog->link }}">{{ $blog->title }}</a>
                            </h4>
                            <p class="card-text">{!! substr($blog->content,0,140).'...' !!}</p>
                            <hr>
                            <span class="text-muted mr-auto">{{ $blog->user->name }}</span>
                            <span class="text-muted" style="float: right;"><i style="color: green;" class="fas fa-eye fa-sm"></i> {{ $blog->hit }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="row">
            <div class="col-lg-6">
                <h2>Modern Business Features</h2>
                <p>The Modern Business template by Start Bootstrap includes:</p>
                <ul>
                    <li>
                        <strong>Bootstrap v4</strong>
                    </li>
                    <li>jQuery</li>
                    <li>Font Awesome</li>
                    <li>Working contact form with validation</li>
                    <li>Unstyled page elements for easy customization</li>
                </ul>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis, omnis doloremque non cum id reprehenderit, quisquam totam aspernatur tempora minima unde aliquid ea culpa sunt. Reiciendis quia dolorum ducimus unde.</p>
            </div>
            <div class="col-lg-6">
                <img class="img-fluid rounded" src="http://placehold.it/700x450" alt="">
            </div>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Call to Action Section -->
        <div class="row mb-4">
            <div class="col-md-8">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias, expedita, saepe, vero rerum deleniti beatae veniam harum neque nemo praesentium cum alias asperiores commodi.</p>
            </div>
            <div class="col-md-4">
                <a class="btn btn-lg btn-secondary btn-block" href="#">Call to Action</a>
            </div>
        </div>

    </div>
    <!-- /.container -->
@endsection
