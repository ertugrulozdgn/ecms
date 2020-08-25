@extends('cms.layout')
@section('content')
    <div class="box box-primary">
        <div class="box-header">
            <div class="box-header with-border">
                <h3 class="box-title">Post Düzenleme</h3>
            </div>

            <div class="box-body">
                <div class="col-xs-12">
                    {!! Form::model($post,['action' => ['Cms\Post\NewsController@update', $post->id], 'method' => 'PUT', 'files' => true]) !!}

                    {{ Form::bsFile('image', 'Kapak Resim') }}

                    {{ Form::bsSelect('location', 'Yerleşim Yeri', null, $locations) }}

                    {{ Form::bsDate('published_at', 'Yayınlanma Tarihi',['readonly']) }}

                    {{ Form::bsText('title', 'Başlık') }}

                    {{ Form::bsText('seo_title', 'Seo Başlık') }}

                    {{ Form::bsTextarea('content', 'İçerik', null, ['id' => 'editor']) }}

                    {!! Form::bsSelect("category_id","Kategori",null,$categories) !!}

                    {!! Form::bsSelect('status', 'Durum', null, $situations) !!}

                    {{ Form::submit('Düzenle') }}

                    {!! Form::close() !!}
                </div>
            </div>


{{--            <div class="box-body">--}}
{{--                <form action="{{ action('Cms\Post\NewsController@update',[ $post->id ]) }}" method="POST" enctype="multipart/form-data">--}}
{{--                    @method('put')--}}
{{--                    @CSRF--}}

{{--                    <div class="form-group">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-xs-6">--}}
{{--                                <label>Seçilen Resim</label><br>--}}
{{--                                <img width="300" class="img-fluid" src="/storage/images/posts/{{ $post->image }}" alt="{{ $post->title }}">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="form-group">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-xs-12">--}}
{{--                                <label>Kapak Resim <span style="color: #e02222">*</span></label>--}}
{{--                                <input class="form-control" type="file" name="image">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="form-group">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-xs-12">--}}
{{--                                <label>Yerleşim Türü <span style="color: #e02222">*</span></label>--}}
{{--                                <select class="form-control" name="location">--}}
{{--                                    --}}{{--<option value="1" {{ $post->location == 1 ? 'selected' : ''}}>Normal</option>--}}
{{--                                    --}}{{--<option value="2" {{ $post->location == 2 ? 'selected' : '' }}>Manşet</option>--}}
{{--                                    @foreach($locations as $key => $value)--}}
{{--                                        <option value="{{ $key }}" {{ $post->location == $key ? 'selected' : '' }}>{{ $value }}</option>--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="form-group">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-xs-12">--}}
{{--                                <label>Başlık <span style="color: #e02222">*</span></label>--}}
{{--                                <input class="form-control" type="text" name="title" value="{{$post->title}}">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="form-group">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-xs-12">--}}
{{--                                <label>SEO Başlık</label>--}}
{{--                                <input class="form-control" type="text" name="seo_title" value="{{ $post->seo_title }}">--}}
{{--                                <span class="help-block">Boş bırakırsanız başlık değeri SEO başlık olacaktır.</span>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="form-group">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-xs-12">--}}
{{--                                <label>İçerik</label>--}}
{{--                                <textarea id="editor" class="form-control" name="content">{{ $post->content }}</textarea>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="form-group">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-xs-12">--}}
{{--                                <Label>Kategoriler <span style="color: #e02222">*</span></Label>--}}
{{--                                <select class="form-control" name="category_id">--}}
{{--                                    @foreach($categories as $category)--}}
{{--                                        <option value="{{ $category->id }}" {{ $post->category_id == $category->id ? 'selected' : '' }}>{{ $category->title }}</option>--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}


{{--                    <div class="form-group">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-xs-12">--}}
{{--                                <label>Durum <span style="color: #e02222">*</span></label>--}}
{{--                                <select class="form-control" name="status">--}}
{{--                                    --}}{{--<option value="1" {{ $post->status == 1 ? 'selected' : '' }}>Aktif</option>--}}
{{--                                    --}}{{--<option value="0" {{ $post->status == 0 ? 'selected' : '' }}>Pasif</option>--}}
{{--                                    @foreach($situations as $key => $value)--}}
{{--                                        <option value="{{ $key }}" {{ $post->status = $key ? 'selected' : '' }}>{{ $value }}</option>--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="box-footer">--}}
{{--                        <button class="btn btn-success" type="submit" name="save" value="save">Kaydet</button>--}}
{{--                        <button class="btn btn-success" type="submit" name="save" value="save_and_continue">Kaydet ve Devam Et</button>--}}
{{--                        <a href="{{ action('Cms\Post\NewsController@index') }}" class="btn btn-danger">Vazgeç</a>--}}
{{--                    </div>--}}
{{--                </form>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

    <script>
        CKEDITOR.replace('editor', {
            height:400
        });
    </script>
@endsection
