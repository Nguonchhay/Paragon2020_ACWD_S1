@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Category list</div>

                <div class="card-body">
                    @include('categories.includes.table', ['categories' => $categories])
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
