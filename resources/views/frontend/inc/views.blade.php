<div class="card my-4">
    <h5 class="card-header">En Çok Okunan Bloglar</h5>
    <div class="card-body">
        <ul class="list-group">
            @foreach($post_views as $post_view)
                <a href="{{ $post_view->link }}"><li class="list-group-item">{{ $post_view->title }} <span style="float: right"><i style="color: green;" class="fas fa-eye fa-sm"></i> {{ $post_view->hit }}</span></li></a>
            @endforeach
        </ul>
    </div>
</div>
