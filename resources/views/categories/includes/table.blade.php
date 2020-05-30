<div class="table-responsive">
    <table class="table table-bordered">
        <tr>
            <th>No.</th>
            <th>Name</th>
            <th>
                <a href="{{ route('category.create') }}">+ Category</a>
            </th>
        </tr>
        @foreach($categories as $category)
            <tr id="tr{{ $category->id }}">
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $category->name }}</td>
                <td>
                    <a href="{{ route('category.edit', $category->id) }}">Edit</a> |
                    <a href="javascript:void(0)" class="ajax-category-deletion" data-id="tr{{ $category->id }}" data-url="{{ route('category.deleteAjax', $category->id) }}">Delete</a>
                </td>
            </tr>
        @endforeach
    </table>
</div>

<div class="pagination">
    {{ $categories->links() }}
</div>