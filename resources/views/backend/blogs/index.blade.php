@extends('backend.layout')
@section('content')
    <div class="box box-primary">
        <div class="box-header">
            <div class="box-header with-border">
                <h3 class="box-title">Bloglar</h3>

                <div align="right">
                    <a href="{{ route('blogs.create')}}"><button class="btn btn-success">Ekle</button></a>
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Resim</th>
                        <th>Başlık</th>
                        <th>Oluşturulma Tarihi</th>
                    </tr>
                    <tbody id="sortable">
                    @foreach($blogs as $blog)
                        <tr id="item-{{ $blog->id }}">
                            <td class="align-middle"><img width="120" class="img-fluid" src="/storage/images/blogs/{{ $blog->image }}" alt="{{ $blog->title }}"></td>
                            <td class="sortable">{{ $blog->title}}</td>
                            <td>{{ $blog->created_at}}</td>
                            <td width="5"><a href="{{ route('blogs.edit',[$blog->id]) }}"><i class="fa fa-pencil-square"></i></a></td>
                            <td width="5"><a href="javascript:void(0)"><i id="{{ $blog->id }}" class="fa fa-trash-o"></i></a></td>
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
                        url: "{{route('blog.Sortable')}}",
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
                        url:"/admin/blogs/"+destroy_id,
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
