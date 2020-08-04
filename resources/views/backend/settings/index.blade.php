@extends('backend.layout')
@section('content')
    <div class="box box-primary">
        <div class="box-header">
            <div class="box-header with-border">
                <h3 class="box-title">Ayarlar</h3>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th></th>
                        <th>Anahtar</th>
                        <th>Değer</th>
                        <th>Eylem</th>
                    </tr>
                    <tbody>
                    @foreach($settings as $setting)
                        <tr id="item-{{ $setting->id }}">
                            <td>{{ $setting->id }}</td>
                            <td>{{ $setting->key}}</td>
                            <td>{{ $setting->value }}</td>
                            <td width="5"><a href="{{ route('settings.edit',[$setting->id]) }}"><i class="fa fa-pencil-square fa-lg"></i></a></td>
                            <td width="5"><a href="javascript:void(0)"><i id="{{ $setting->id }}" class="fa fa-trash-o fa-lg"></i></a></td>
                        </tr>
                    @endforeach
                    </tbody>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    {{--Delete--}}
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
                        url:"/admin/settings/"+destroy_id,
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
