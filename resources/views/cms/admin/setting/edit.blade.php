
@extends('cms.layout')
@section('content')
    <div class="box box-primary">
        <div class="box-header">
            <div class="box-header with-border">
                <h3 class="box-title">Ayarlar</h3>
            </div>
            <div class="box-body">
                <form action="{{ action('Backend\SettingsController@update',[ $setting->id ]) }}" method="POST" enctype="multipart/form-data">
                    @method('put')
                    @CSRF
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-12">
                                <label>Anahtar</label>
                                <input class="form-control" readonly type="text" value="{{ $setting->key }}" name="setting_key" required>
                            </div>
                        </div>
                    </div>

                    @if($setting->type == 'file')
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label>Resim Seç</label>
                                    <input class="form-control" type="file" name="setting_value"  value="{{ $setting->value }}" required>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-xs-6">
                                    <label>Yüklenen Resim</label>
                                    <img src="/images/settings/{{ $setting->value }}" alt="">
                                </div>
                            </div>
                        </div>
                    @endif

                    @if($setting->type == 'text')
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label>Değer</label>
                                    <input class="form-control" type="text" name="setting_value" value="{{ $setting->value }}" required>
                                </div>
                            </div>
                        </div>
                    @endif

                    <div align="right" class="box-footer">
                        <button class="btn btn-success" type="submit">Düzenle</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
