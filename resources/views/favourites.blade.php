@extends('layouts/app')

@section('title')
Your Favourites
@endsection

@section('content')
    <div class="container">
        <h1 class="blog-post-title">Your Favourites</h1>

        @foreach ($recepies as $recipe)
            @component('../components/recipe', ['recipe' => $recipe])
            @endcomponent
        @endforeach
    </div>
@endsection