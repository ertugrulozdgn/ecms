@extends('web.layout')
@section('title','Bloglar')
@section('content')
    <div class="container">

        <h1 class="mt-4 mb-3">Blog
            <small>Bloglar Listeleniyor</small>
        </h1>

        <!-- Blog Post -->
        @foreach($posts as $post)
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <a href="#">
                                <img class="img-fluid rounded" src="/storage/images/posts/{{ $post->image }}" alt="">
                            </a>
                        </div>
                        <div class="col-lg-6">
                            <h2 class="card-title">{{ $post->title }}</h2>
                            <p class="card-text">{!! substr($post->content,0,190).'...' !!}</p>
                            <a href="{{ $post->link }}" class="btn btn-primary">Daha Fazla &rarr;</a>
                            {{-- Normalde {{ route('web.post.Detail',[$post->slug,$post->id]) }}  --}}
                        </div>
                    </div>
                </div>
                <div class="card-footer text-muted">
                    Yayınlanma Zamanı : {{ $post->published_at->format('d-m-yy') }}
                    <a href="#">Start Bootstrap</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection()
