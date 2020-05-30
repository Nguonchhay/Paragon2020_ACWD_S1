<div class="table-responsive">
    <table class="table table-bordered">
        <tr>
            <th>No.</th>
            <th>Category Name</th>
            <th>Title</th>
            <th>Author</th>
            <th>
                <a href="{{ route('post.create') }}">+ New</a>
            </th>
        </tr>
        @foreach($posts as $post)
            <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $post->category->name }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->author }}</td>
                <td>
                    <a href="{{ route('post.show', $post->id) }}">Detail</a>
                </td>
            </tr>
        @endforeach
    </table>
</div>

<div class="pagination">
    {{ $posts->links() }}
</div>