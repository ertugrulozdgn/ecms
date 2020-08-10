<div class="card my-4">
    <h5 class="card-header">Popüler Bloglar</h5>
    <div class="card-body">
        <ul class="list-group">
            @foreach($populerBlogs as $populerBlog)
                <a href="{{ $populerBlog->link }}"><li class="list-group-item"> {{ $populerBlog->title }}</li></a>
            @endforeach
        </ul>
    </div>
</div>
