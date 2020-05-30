@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">New Category</div>

                <div class="card-body">
                    <form method="post" action="{{ route('category.store') }}">
                        @csrf
                        @include('categories.includes.fields')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
