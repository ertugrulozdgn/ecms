
@extends('backend.layout')
@section('content')
    <div class="box box-primary">
        <div class="box-header">
            <div class="box-header with-border">
                <h3 class="box-title">Slider Düzenleme</h3>
            </div>
            <div class="box-body">
                <form action="{{ route('slider.update',[$slider->id]) }}" method="POST" enctype="multipart/form-data">
                    @method('put')
                    @CSRF
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-12">
                                <label>Seçilen Resim</label><br>
                                <img width="300" class="img-fluid" src="/storage/images/sliders/{{ $slider->image }}" alt="{{ $slider->title }}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-12">
                                <label>Resim Seç</label>
                                <input class="form-control" type="file" name="image">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-12">
                                <label>Başlık</label>
                                <input class="form-control" type="text" name="title" value="{{ $slider->title }}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-12">
                                <label>Url</label>
                                <input class="form-control" type="text" name="url" value="{{ $slider->url }}" placeholder="Boş Bırakılabilir...">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-12">
                                <label>İçerik</label>
                                <textarea id="editor" class="form-control" name="content">{{ $slider->content }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-12">
                                <label>Durumu</label>
                                <select class="form-control" name="status">
                                    <option value="1" {{ $slider->status == 1 ? 'selected' : '' }}>Aktif</option>
                                    <option value="0" {{ $slider->status == 0 ? 'selected' : '' }}>Pasif</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div align="right" class="box-footer">
                        <button class="btn btn-success" type="submit">Düzenle</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        CKEDITOR.replace('editor')
    </script>
@endsection

