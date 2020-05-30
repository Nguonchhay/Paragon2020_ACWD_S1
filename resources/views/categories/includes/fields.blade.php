@if($errors->any())
    <div class="error">
        @foreach($errors->all() as $message)
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
        @endforeach
    </div>
@endif

<div class="form-group">
    <label for="name">Name * </label>
    <input type="text" class="form-control" name="name" id="name" required value="@if(isset($category)) {{ $category->name }} @endif" />
</div>

<button class="btn btn-primary">Submit</button>