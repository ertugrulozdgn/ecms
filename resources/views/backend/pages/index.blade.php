@extends('backend.layout')
@section('content')
    <div class="box box-primary">
        <div class="box-header">
            <div class="box-header with-border">
                <h3 class="box-title">Sayfalar</h3>

                <div align="right">
                    <a href="{{ route('page.create')}}"><button class="btn btn-success">Ekle</button></a>
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Resim</th>
                        <th>Başlık</th>
                        <th>Yazar</th>
                        <th>Oluşturulma Tarihi</th>
                        <th>Durum</th>
                    </tr>
                    <tbody id="sortable">
                    @foreach($pages as $page)
                        <tr id="item-{{ $page->id }}" class="{{ $page->status == 0 ? 'alert alert-light' : '' }}">
                            <td class="align-middle sortable"><img width="120" class="img-fluid" src="/storage/images/pages/{{ $page->image }}" alt="{{ $page->title }}"></td>
                            <td >{{ $page->title}}</td>
                            <td>{{ $page->user->name}}</td>
                            <td>{{ $page->created_at->format('j F Y') }}</td>
                            <td>{{ $page->status_name }}</td>
                            <td width="5"><a href="{{ route('page.edit',[$page->id]) }}"><i class="fa fa-pencil-square fa-lg"></i></a></td>
                            <td width="5"><a href="javascript:void(0)"><i id="{{ $page->id }}" class="fa fa-trash-o fa-lg"></i></a></td>
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
                        url: "{{route('page.Sortable')}}",
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
                        url:"/admin/page/"+destroy_id,
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
