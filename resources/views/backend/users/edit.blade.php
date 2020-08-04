
@extends('backend.layout')
@section('content')
    <div class="box box-primary">
        <div class="box-header">
            <div class="box-header with-border">
                <h3 class="box-title">Kullanıcı Oluşturma</h3>
            </div>
            <div class="box-body">
                <form action="{{ route('user.update',[$user->id]) }}" method="POST" enctype="multipart/form-data">
                    @method('put')
                    @CSRF
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-12">
                                <label>Profil Fotoğrafı</label><br>
                                <img class="img-fluid" width="180" src="/storage/images/users/{{ $user->image }}" alt="{{ $user->name }}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-12">
                                <label>Profil Fotoğrafı Seç</label>
                                <input class="form-control" type="file" name="image">
                                <small class="text-muted">Eğer profil fotoğrafı seçmezseniz yüklü olan profil fotoğrafı değişmeyecektir.</small>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-12">
                                <label>Ad Soyad</label>
                                <input class="form-control" type="text" name="name" value="{{ $user->name }}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-12">
                                <label>Email</label>
                                <input class="form-control" type="email" name="email" value="{{ $user->email }}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-12">
                                <label>Şifre</label>
                                <input class="form-control" type="password" name="password" placeholder="Alanı boş bırakırsanız mevcut şifreniz değişmeyecektir.">
                                <small class="text-muted">Şifreniz 8-20 karakter uzunluğunda olmalıdır.</small>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-12">
                                <label>Şifre Tekrarı</label>
                                <input class="form-control" type="password" name="password_confirmation" placeholder="Alanı boş bırakırsanız mevcut şifreniz değişmeyecektir.">
                                <small class="text-muted">Lütfen Şifrenizi Tekrar Girin.</small>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-6">
                                <label>Yetki</label>
                                <select class="form-control" name="role">
                                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>Kullanıcı</option>
                                </select>
                            </div>

                            <div class="col-xs-6">
                                <label>Durum</label>
                                <select class="form-control" name="status">
                                    <option value="1" {{ $user->status == 1 ? 'selected' : '' }}>Aktif</option>
                                    <option value="0" {{ $user->status == 0 ? 'selected' : '' }}>Pasif</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div align="right" class="box-footer">
                        <button class="btn btn-success" type="submit">Kaydet</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
