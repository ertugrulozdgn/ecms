@extends('web.layout')
@section('title','Bize Ulaşın')
@section('content')
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3">Bize Ulaşın</h1>

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html">Anasayfa</a>
            </li>
            <li class="breadcrumb-item active">Bize Ulaşın</li>
        </ol>


        <div class="row">
            <div class="col-lg-8 mb-4">
                <h3>İletişim Formu</h3>
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if(session()->has('success'))
                    <div class="alert alert-success">
                        <p> {{ session('success') }}</p>
                    </div>
                @endif
                <form action="{{ action('Web\HomeController@sendMail') }}" method="post">
                    @CSRF
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>İsim Soyisim:</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                            <p class="help-block"></p>
                        </div>
                    </div>

                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Telefon Numarası:</label>
                            <input type="tel" class="form-control" id="phone" name="phone" required>
                        </div>
                    </div>

                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Email Adresi:</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                    </div>

                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Mesaj:</label>
                            <textarea rows="10" cols="100" class="form-control" id="message" name="message" maxlength="999" style="resize:none" required></textarea>
                        </div>
                    </div>

                    <div id="success"></div>
                    <button type="submit" class="btn btn-primary" id="sendMessageButton">Gönder</button>
                </form>
            </div>
            <div class="col-lg-4 mb-4">
                <h3>Adres Detayları</h3>
                <p>{{ config('settings.Address') }}</p>
                <p>
                    <abbr title="Phone">Telefon</abbr>: {{ config('settings.Phone') }}
                </p>
                <p>
                    <abbr title="Email">Email</abbr>:
                    <a href="mailto:name@example.com"> {{ config('setting') }}
                    </a>
                </p>
                <p>
                    <abbr title="Hours">Çalışma Saatleri</abbr>: {{ config('settings.Working') }}
                </p>
            </div>

        </div>

    </div>
@endsection
