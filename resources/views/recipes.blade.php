@extends('layouts/app')

@section('title')
Recipes
@endsection

@section('content')
<div class="container">
    @livewire('recipelist', ['categories' => $categories, 'filter_options' => $filter_options])
</div>
@endsection