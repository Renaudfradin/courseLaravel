{{-- @extends('layout')

@section('content')
    <div>
        <h2>{{ $post->title }}</h2>
        <p>{{ $post->date }}</p>
        <p>{!! $post->body !!}</p>
        <a href="/posts">go back</a>
    </div>
@endsection --}}

<x-layout>
    <div>
        <h2>{{ $post->title }}</h2>
        <p>{{ $post->created_at }}</p>
        <p>{{ $post->body }}</p>
        <p>{{ $post->user->name }}</p>
        by <a href="/authors/{{ $post->user->id }}"><p>{{ $post->user->name }}</p></a> in <a href="/categorie/{{ $post->categorie->id }}"><p>{{ $post->categorie->name }}</p></a>
        <a href="/posts">go back</a>
    </div>
</x-layout>