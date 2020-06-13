<div class="table-responsive">
    <table class="table table-bordered">
        <tr>
            <th>No.</th>
            <th>Category Name</th>
            <th>Title</th>
            <th>Author</th>
            <th>Creator Name</th>
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
                <td>{{ $post->creator->name }}</td>
                <td>
                    <a href="{{ route('post.show', $post->id) }}">Detail</a>
                    @can('editPost', $post)
                        <a href="{{ route('post.edit', $post->id) }}">Edit</a>
                    @endcan
                    <a href="{{ route('post.delete', $post->id) }}">Delete</a>
                </td>
            </tr>
        @endforeach
    </table>
</div>

<div class="pagination">
    {{ $posts->links() }}
</div>