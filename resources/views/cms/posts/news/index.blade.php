@extends('cms.layout')
@section('content')
    <div class="box box-primary">
        <div class="box-header">
            <div class="box-header with-border">
                <h3 class="box-title">Bloglar</h3>

                <div align="right">
                    <a href="{{ action('Backend\PostController@create') }}"><button class="btn btn-success">Ekle</button></a>
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Resim</th>
                        <th>Başlık</th>
                        <th>Oluşturan</th>
                        <th>Yerleşim Türü</th>
                        <th>Yayın Tarihi</th>
                        <th>Hit</th>
                        <th>İşlemler</th>
                    </tr>
                    <tbody id="sortable">
                    @foreach($posts as $post)
                        <tr id="item-{{ $post->id }}" class="{{ $post->status == 0 ? 'alert alert-light' : ''}}">
                            <td width="5" class="sortable"><img width="120" class="img-fluid" src="/storage/images/posts/{{ $post->image }}" alt="{{ $post->title }}"></td>
                            <td>{{ $post->title}}</td>
                            <td>{{ $post->user->name }}</td>
                            <td>{{ $post->location_name }}</td>
                            <td>{{ $post->published_at}}</td>
                            <td>{{ $post->hit }}</td>
                            <td width="5"><a href="{{ action('Backend\PostController@edit',[ $post->id ]) }}"><i class="fa fa-pencil-square fa-lg"></i></a></td>
                            <td width="5"><a href="javascript:void(0)"><i id="{{ $post->id }}" class="fa fa-trash-o fa-lg"></i></a></td>
                        </tr>
                    @endforeach
                    </tbody>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#sortable').sortable({
                revert: true,
                handle: ".sortable",
                stop: function (event, ui) {
                    var data = $(this).sortable('serialize');
                    $.ajax({
                        type: "POST",
                        data: data,
                        url: "{{ action('Backend\PostController@sortable') }}",
                        success: function (msg) {
                            // console.log(msg);
                            if (msg) {
                                alertify.success("İşlem Başarılı");
                            } else {
                                alertify.error("İşlem Başarısız");
                            }
                        }
                    });

                }
            });
            $('#sortable').disableSelection();

        });


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
                        url:"/admin/post/"+destroy_id,
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
