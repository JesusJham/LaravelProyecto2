@extends('template')

@section('content')

<div class="max-w3-xl mx-auto">
    <h1 class="text-5xl mb-8"> {{ $post->title }} </h1>
    <p class="leading-loose text-lg text-gray-700">
        {{ $post->body }}
    </p>
</div>

@endsection