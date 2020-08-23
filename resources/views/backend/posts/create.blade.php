
@extends('backend.layout')
@section('content')
    <div class="box box-primary">
        <div class="box-header">
            <div class="box-header with-border">
                <h3 class="box-title">Post Oluşturma</h3>
            </div>
            <div class="box-body">
                <form action="{{ action('Backend\PostController@store') }}" method="POST" enctype="multipart/form-data">
                    @CSRF

                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-12">
                                <label>Kapak Resim <span style="color: #e02222">*</span></label>
                                <input class="form-control" type="file" name="image">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-12">
                                <label>Yerleşim Türü <span style="color: #e02222">*</span></label>
                                <select class="form-control" name="location">
                                    {{--<option value="1" {{ old('location') == 1 ? 'selected' : '' }}>Normal</option>--}}
                                    {{--<option value="2" {{ old('location') == 2 ? 'selected' : '' }}>Manşet</option>--}}
                                    @foreach($locations as $key => $value)
{{--                                    <option value="{{ $key }}" {!! $edit > 0 && $post->location == $key ? 'selected' : '' !!}>{{ $value }}</option>--}}
                                        <option value="{{ $key }}" {{ old('location') == $key ? 'selected' : '' }}>{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-12">
                                <label>Yayın Tarihi</label>
{{--                                <input class="form-control " type="datetime" name="published_at" value="{{ date('d.m.yy H:i') }}">--}}
                                <input class="form-control " type="datetime-local" name="published_at" value="{{ date('Y-m-d\TH:i') }}" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-12">
                                <label>Başlık <span style="color: #e02222">*</span></label>
                                <input class="form-control" type="text" name="title" value="{{ old('title') }}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-12">
                                <label>SEO Başlık</label>
                                <input class="form-control" type="text" name="seo_title" value="{{ old('seo_title') }}">
                                <span class="help-block">Boş bırakırsanız başlık değeri SEO başlık olacaktır.</span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-12">
                                <label>İçerik</label>
                                <textarea id="editor" class="form-control" name="content">{{ old('content') }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-12">
                                <Label>Kategoriler <span style="color: #e02222">*</span></Label>
                                <select class="form-control" name="category_id">
                                    @foreach($categories as $category)
                                        <option value=" {{ $category->id }}" {{ old('category_id') ? 'selected' : '' }}>{{ $category->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-12">
                                <label>Durum <span style="color: #e02222">*</span></label>
                                <select class="form-control" name="status">
                                    {{--<option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Aktif</option>--}}
                                    {{--<option value="0" {{ old('status') == 0 ? 'selected' : ''}}>Pasif</option>--}}
                                    @foreach( $situations as $key => $value)
                                        <option value="{{ $key }}" {{ old('status') == $key ? 'selected' : '' }}>{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="box-footer">
                        <button class="btn btn-success" type="submit" name="save" value="save">Kaydet</button>
                        <button class="btn btn-success" type="submit" name="save" value="save_and_continue">Kaydet ve Devam Et</button>
                        <a href="{{ action('Backend\PostController@index') }}" class="btn btn-danger">Vazgeç</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        CKEDITOR.replace('editor', {
            height:400
        });
    </script>
@endsection
