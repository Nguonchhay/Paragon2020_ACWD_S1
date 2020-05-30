@if($errors->any())
    <div class="error">
        @foreach($errors->all() as $message)
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
        @endforeach
    </div>
@endif

<div class="row form-group">
    <div class="col-lg-12">
        <label for="title">Category * </label>
        <select name="category_id" class="form-control">
            <option value="">Please select one</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>

</div>

<div class="row form-group">
    <div class="col-lg-6">
        <label for="title">Title * </label>
        <input type="text" class="form-control" name="title" id="title" required value="@if(isset($post)) {{ $post->name }} @endif" />
    </div>

    <div class="col-lg-6">
        <label for="author">Author </label>
        <input type="text" class="form-control" name="author" id="author" value="@if(isset($post)) {{ $post->author }} @endif" />
    </div>
</div>

<div class="row form-group">
    <div class="col-lg-12">
        <label for="content">Content</label>
        <textarea class="form-control" name="content" id="content"></textarea>
    </div>
</div>

<button class="btn btn-primary">Submit</button>