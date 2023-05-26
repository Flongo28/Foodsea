@extends('layouts/app')

@section('title')
No recipes found
@endsection

@section('content')
    <div class="container">
        <div class="alert alert-warning" role="alert">
            No recipes found. Please try again or use a different search criteria.
        </div>
    </div>
@endsection
