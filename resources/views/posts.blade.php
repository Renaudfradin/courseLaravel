{{-- @extends('layout')

@section('banner')
    <h2>All posts</h2>
@endsection

@section('content')
    <div>
        <a href="/">home</a>
        <div>
            @foreach ($posts as $post)
                <article>
                    <a href="/post/{{ $post->slug }}">
                        <h2>{{ $post->title }}</h2>
                    </a>
                    <p>{{ $post->excerpt }}</p>
                </article>
            @endforeach
        </div>
    </div>
@endsection --}}

<x-layout>
    <div>
        <a href="/">home</a>
        <div>
            @foreach ($posts as $post)
                <article>
                    <a href="/post/{{ $post->id }}">
                        <h2>{{ $post->title }}</h2>
                    </a>
                    by <a href="/authors/{{ $post->user->id }}"><p>{{ $post->user->name }}</p></a> in <a href="/categorie/{{ $post->categorie->id }}"><p>{{ $post->categorie->name }}</p></a>
                    <p>{{ $post->excerpt }}</p>
                </article>
            @endforeach
        </div>
    </div>
</x-layout>