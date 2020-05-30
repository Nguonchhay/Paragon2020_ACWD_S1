@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">New Post</div>

                <div class="card-body">
                    <form method="post" action="{{ route('post.store') }}">
                        @csrf
                        @include('posts.includes.fields', ['categories' => $categories])
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
