@extends('frontend.layout')
@section('title','Bloglar')
@section('content')
    <div class="container">

        <h1 class="mt-4 mb-3">Blog
            <small>Bloglar Listeleniyor</small>
        </h1>

        <!-- Blog Post -->
        @foreach($blogs as $blog)
        <div class="card mb-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <a href="#">
                            <img class="img-fluid rounded" src="/storage/images/blogs/{{ $blog->image }}" alt="">
                        </a>
                    </div>
                    <div class="col-lg-6">
                        <h2 class="card-title">{{ $blog->title }}</h2>
                        <p class="card-text">{!! substr($blog->content,0,190).'...' !!}</p>
                        <a href="{{ $blog->link }}" class="btn btn-primary">Daha Fazla &rarr;</a>
                        {{-- Normalde {{ route('frontend.blog.Detail',[$blog->slug,$blog->id]) }}  --}}
                    </div>
                </div>
            </div>
            <div class="card-footer text-muted">
                Yayınlanma Zamanı : {{ $blog->created_at->format('d-m-y') }}
                <a href="#">Start Bootstrap</a>
            </div>
        </div>
        @endforeach
    </div>
@endsection()
