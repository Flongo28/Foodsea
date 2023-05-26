@extends('layouts/app')

@section('title')
Einleitung
@endsection

@section('content')

@component('components/card')
<h1 class="blog-post-title">Willkommen</h1>

Dies ist eine Seite von Konrad, weil er genervt ist von der Chefkoch Seite. Er hat sich gedacht, dass er das besser machen kann. Und hier ist das Ergebnis.
Hapt viel Spaß beim Ausprobieren und Entdecken.
@endcomponent

@endsection