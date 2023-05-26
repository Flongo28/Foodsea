@extends('layouts/app')

@section('title')
Recipes
@endsection

@section('content')
<div class="container">
    @livewire('recipelist', ['min_kochzeit' => $min_kochzeit, 'max_kochzeit' => $max_kochzeit, 'zutaten' => $zutaten, 'categories' => $categories, 'rating' => $rating])
</div>
@endsection