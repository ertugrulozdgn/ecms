@extends('frontend.layout')
@section('title',$slider->title)
@section('content')
    <div class="container">

        <h1 class="mt-4 mb-3">{{ $slider->title }}</h1>

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                Anasayfa
            </li>
            <li class="breadcrumb-item">
                Slider
            </li>
            <li class="breadcrumb-item active">
                {{ $slider->title }}
            </li>
        </ol>

        <div class="row">

            <div class="col-lg-8">

                <img class="img-fluid rounded" src="/storage/images/blogs/{{ $slider->image }}" alt="">

                <hr>

                <span class="text-muted mr-auto">Yayınlanma Zamanı : </span> {{ $slider->created_at->format('d-m-y h:i') }}
                <span> YAZAR KISMI YAPILACAK UNUTMA</span>

                <hr>

                <p>{!! $slider->content !!}</p>

                {{--                <blockquote class="blockquote">--}}
                {{--                    <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>--}}
                {{--                    <footer class="blockquote-footer">Someone famous in--}}
                {{--                        <cite title="Source Title">Source Title</cite>--}}
                {{--                    </footer>--}}
                {{--                </blockquote>--}}

                <hr>

                <!-- Comments Form -->
                <div class="card my-4">
                    <h5 class="card-header">Leave a Comment:</h5>
                    <div class="card-body">
                        <form>
                            <div class="form-group">
                                <textarea class="form-control" rows="3"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>

                <!-- Single Comment -->
                <div class="media mb-4">
                    <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                    <div class="media-body">
                        <h5 class="mt-0">Commenter Name</h5>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                    </div>
                </div>

                <!-- Comment with nested comments -->
                <div class="media mb-4">
                    <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                    <div class="media-body">
                        <h5 class="mt-0">Commenter Name</h5>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.

                        <div class="media mt-4">
                            <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                            <div class="media-body">
                                <h5 class="mt-0">Commenter Name</h5>
                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                            </div>
                        </div>

                        <div class="media mt-4">
                            <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                            <div class="media-body">
                                <h5 class="mt-0">Commenter Name</h5>
                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                            </div>
                        </div>

                    </div>
                </div>

            </div>

            <!-- Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Search Widget -->
                <div class="card mb-4">
                    <h5 class="card-header">Search</h5>
                    <div class="card-body">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
                <button class="btn btn-secondary" type="button">Go!</button>
              </span>
                        </div>
                    </div>
                </div>


                <div class="card my-4">
                    <h5 class="card-header">Popüler Bloglar</h5>
                    <div class="card-body">
                        <ul class="list-group">
                            @foreach($populerBlogs as $populerBlog)
                                <a href="{{ $populerBlog->link }}"><li class="list-group-item"> {{ $populerBlog->title }}</li></a>
                            @endforeach
                        </ul>
                    </div>
                </div>

                @include('frontend.inc.views')

            </div>

        </div>

    </div>
@endsection()

