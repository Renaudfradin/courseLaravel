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
        <a href="/posts">go back</a>
    </div>
</x-layout>