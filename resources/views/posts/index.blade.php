@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Post list</div>

                <div class="card-body">
                    @include('posts.includes.table', ['posts' => $posts])
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
