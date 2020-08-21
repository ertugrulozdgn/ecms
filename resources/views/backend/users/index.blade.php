@extends('backend.layout')
@section('content')
    <div class="box box-primary">
        <div class="box-header">
            <div class="box-header with-border">
                <h3 class="box-title">Users</h3>

                <div align="right">
                    <a href="{{ action('Backend\UserController@create') }}"><button class="btn btn-success">Ekle</button></a>
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Resim</th>
                        <th>Ad Soyad</th>
                        <th>Yetki</th>
                        <th>Durum</th>
                        <th>Eylem</th>
                    </tr>
                    <tbody>
                    @foreach($users as $user)
                        <tr id="item-{{ $user->id }}" class="{{ $user->status == 0 ? 'alert alert-light' : ''}}">
                            <td class="align-middle"><img width="120" class="img-fluid" src="/storage/images/users/{{ $user->image }}" alt="{{ $user->title }}"></td>
                            <td>{{ $user->name}}</td>
                            <td>{{ $user->role_name }}</td>
                            <td>{{ $user->status_name}}</td>
                            <td width="5"><a href="{{ action('Backend\UserController@edit', [ $user->id ]) }}"><i class="fa fa-pencil-square fa-lg"></i></a></td>
                            <td width="5"><a href="javascript:void(0)"><i id="{{ $user->id }}" class="fa fa-trash-o fa-lg"></i></a></td>
                        </tr>
                    @endforeach
                    </tbody>
                    </thead>
                </table>
            </div>
        </div>
    </div>


    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(".fa-trash-o").click(function () {
            destroy_id = $(this).attr('id');

            alertify.confirm('Silme işlemini onaylıyor musunuz?','Bu işlem geri alınamaz',
                function () {
                    $.ajax({
                        type:"DELETE",
                        url:"/admin/user/"+destroy_id,
                        success: function (msg) {
                            if (msg)
                            {
                                $("#item-"+destroy_id).remove();
                                alertify.success("Silme işlemi Başarılı");
                            }
                            else
                            {
                                alertify.error("İşlem Tamamlanamadı");
                            }
                        }
                    });

                },
                function () {
                    alertify.error('Silme işlemi iptal edildi.')
                },
            )
        });
    </script>


@endsection
