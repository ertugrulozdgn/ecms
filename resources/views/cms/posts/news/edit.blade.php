@extends('cms.layout')
@section('content')
    <div class="box box-primary">
        <div class="box-header">
            <div class="box-header with-border">
                <h3 class="box-title">{{ $edit > 0 ? 'Post Düzenle' : 'Post Oluştur' }}</h3>
            </div>

            <div class="box-body">
                <div class="col-xs-12">

                    {{ Form::open([
                            'url' => $edit > 0 ? action('Cms\Post\NewsController@update', [$post->id]) : action('Cms\Post\NewsController@store'),
                            'method' => $edit > 0 ? 'PUT' : 'POST',
                            'files' => true
                        ])
                    }}

                    @if($edit > 0)
                        <div class="form-group">
                            {{ Form::label('image', 'Seçilen Resim') }}<br>
                            <img width="300" class="img-fluid" src="/storage/images/posts/{{ $post->image }}" alt="{{ $post->title }}">
                        </div>
                    @endif

                    <div class="form-group">
                        {{ Form::label('image', 'Kapak Resmi') }}
                        {{ Form::file('image', ['class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('location', 'Yerleşim Türü') }}

                        <select class="form-control" name="location">
                            @foreach($locations as $key => $value)
                                <option value="{{ $key }}" {{ $edit > 0 ? $post->location == $key ? 'selected' : '' : '' }}>{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-12">
                                <label>Yayın Tarihi</label>
                                <input class="form-control " type="datetime-local" name="published_at" value="{{ date('Y-m-d\TH:i') }}" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('title', 'Başlık') }}
                        {{ Form::text('title', $edit > 0 ? $post->title : '', ['class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('seo_title', 'Seo Başlık') }}
                        {{ Form::text('seo_title', $edit > 0 ? $post->seo_title : '', ['class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('content', 'İçerik') }}
                        {{ Form::textarea('content', $edit > 0 ? $post->content : '' , ['id' => 'editor', 'class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('category_id', 'Kategoriler') }}

                        <select class="form-control" name="category_id">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ $edit > 0 ? $post->category_id == $category->id ? 'selected' : '' : '' }}>{{ $category->title }}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="form-group">
                        {{ Form::label('status', 'Durum') }}

                        <select class="form-control" name="status">
                            @foreach($situations as $key => $value)
                                <option value="{{ $key }}" {{ $edit > 0 ? $post->status = $key ? 'selected' : '' : '' }}>{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="box-footer">
                        <button class="btn btn-success" type="submit" name="save" value="save">Kaydet</button>
                        <button class="btn btn-success" type="submit" name="save" value="save_and_continue">Kaydet ve Devam Et</button>
                        <a href="{{ action('Cms\Post\NewsController@index') }}" class="btn btn-danger">Vazgeç</a>
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
    <script>
        CKEDITOR.replace('editor', {
            height:400
        });
    </script>
@endsection
