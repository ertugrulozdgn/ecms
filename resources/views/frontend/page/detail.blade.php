@extends('frontend.layout')
@section('title',$page->title)
@section('content')
    <!-- Page Content -->
    <div class="container">

        <h1 class="mt-4 mb-3">{{$page->title}}</h1>

        <ol class="breadcrumb">
            <li class="breadcrumb-item">Anasayfa</li>
            <li class="breadcrumb-item">Sayfalar</li>
            <li class="breadcrumb-item active">{{$page->title}}</li>
        </ol>

        <div class="row">
            <div class="col-lg-6">
                <img class="img-fluid rounded mb-4" src="/storage/images/pages/{{ $page->image }}" alt="">
            </div>
            <div class="col-lg-6">
                <h3>{{ $page->title }}</h3>
                <p>{!! $page->content !!}</p>
            </div>
        </div>
    </div>
@endsection()
