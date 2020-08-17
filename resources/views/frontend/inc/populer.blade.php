<div class="card my-4">
    <h5 class="card-header">Popüler Postlar</h5>
    <div class="card-body">
        <ul class="list-group">
            @foreach($populer_posts as $populer_post)
                <a href="{{ $populer_post->link }}"><li class="list-group-item"> {{ $populer_post->title }}</li></a>
            @endforeach
        </ul>
    </div>
</div>
