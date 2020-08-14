<!DOCTYPE html>
<html>
<head>

    <title>{!! config('settings.Title') !!}</title>

    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="{!! config('settings.Description') !!}">
    <meta name="keywords" content="{!! config('settings.Keywords') !!}">
    <meta name="author" content="{!! config('settings.Author') !!}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">


    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="/backend/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/backend/bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/backend/bower_components/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="/backend/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="/backend/dist/css/skins/skin-blue.min.css">

    <!-- jQuery 3 -->
    <script src="/backend/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="/backend/bower_components/jquery-ui/jquery-ui.js"></script>
    <script src="/backend/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="/backend/dist/js/adminlte.min.js"></script>


    <!--ALERTİFY JS -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
    <!--ALERTİFY JS -->

    <!--CKEditör-->
    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>


    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>


    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <!-- CUSTOM.CSS-->
    <link rel="stylesheet" href="/backend/custom/css/custom.css">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">


    <header class="main-header">

        <!-- Logo -->
        <a href="index2.html" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>A</b>LT</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Admin</b>LTE</span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- User Account Menu -->
                    <li class="dropdown user user-menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <!-- The user image in the navbar-->
                            <img src="/storage/images/users/{{ Auth::user()->image }}" class="user-image" alt="User Image">
                            <!-- hidden-xs hides the username on small devices so only the image appears. -->
                            <span class="hidden-xs">{{ Auth::user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- The user image in the menu -->
                            <li class="user-header">
                                <img src="/storage/images/users/{{ Auth::user()->image }}" class="img-circle" alt="User Image">

                                <p>
                                    {{ Auth::user()->name }}
                                    <small>{{ Auth::user()->role }}</small>
                                </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="{{ route('profile.Edit',[Auth::user()->id]) }}" class="btn btn-default btn-flat">Profili Düzenle</a>
                                </div>
                                <div class="pull-right">
                                    <a href="{{ route('admin.Logout') }}" class="btn btn-default btn-flat">Çıkış</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- Control Sidebar Toggle Button -->
                    <li>
                        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

            <!-- Sidebar user panel (optional) -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="/storage/images/users/{{ Auth::user()->image }}" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">MENULER</li>
                <li class="{{ request()->route()->getName() === 'admin.index' ? 'active' : '' }}"><a href="{{ route('admin.index') }}"><i class="fa fa-link"></i> <span>Anasayfa</span></a></li>
                <li class="{{ request()->route()->getName() === 'post.index' ? 'active' : ''}}"><a href="{{ route('post.index') }}"><i class="fa fa-list-alt"></i> <span>Post</span></a></li>
                <li class="{{ request()->route()->getName() === 'slider.index' ? 'active' : ''}}"><a href="{{ route('slider.index') }}"><i class="fa fa-clone"></i> <span>Sliders</span></a></li>
                <li class="{{ request()->route()->getName() === 'blog.index' ? 'active' : '' }}" ><a href="{{ route('blog.index') }}"><i class="fa fa-list-alt"></i> <span>Bloglar</span></a></li>
                <li class="{{ request()->route()->getName() === 'page.index' ? 'active' : '' }}"><a href="{{ route('page.index') }}"><i class="fa fa-paper-plane"></i> <span>Pages</span></a></li>
                <li class="{{ request()->route()->getName() === 'user.index' ? 'active' : '' }}"><a href="{{ route('user.index') }}"><i class="fa fa-user"></i> <span>Users</span></a></li>
                <li class="{{ request()->route()->getName() === 'settings.index' ? 'active' : '' }}" ><a href="{{ route('settings.index') }}"><i class="fa fa-cog"></i> <span>Ayarlar</span></a></li>


                <hr>
                <li><a href="{{ route('admin.Logout') }}"><i class="fa fa-close"></i> <span>Çıkış</span></a></li>
            </ul>
            <!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        @yield('content')

        <section class="content container-fluid">

            <!--------------------------
              | Your Page Content Here |
              -------------------------->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


    <!-- Add the sidebar's background. This div must be placed
    immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>

@if(session()->has('success'))
    <script>alertify.success('{{ session('success') }}')</script>
@endif
@if(session()->has('error'))
    <script>alertify.success('{{ session('error') }}')</script>
@endif
@foreach($errors->all() as $error)
    <script>alertify.error('{{ $error }}')</script>
@endforeach
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->






</body>
</html>
