@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Category</div>

                <div class="card-body">
                    <form method="post" action="{{ route('category.update', $category->id) }}">
                        @csrf
                        @method('put')
                        @include('categories.includes.fields', ['category' => $category])
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
