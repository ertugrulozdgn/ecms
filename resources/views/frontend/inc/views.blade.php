<div class="card my-4">
    <h5 class="card-header">En Çok Okunan Bloglar</h5>
    <div class="card-body">
        <ul class="list-group">
            @foreach($postsView as $postView)
                <a href="{{ $postView->link }}"><li class="list-group-item">{{ $postView->title }} <span style="float: right"><i style="color: green;" class="fas fa-eye fa-sm"></i> {{ $postView->hit }}</span></li></a>
            @endforeach
        </ul>
    </div>
</div>
