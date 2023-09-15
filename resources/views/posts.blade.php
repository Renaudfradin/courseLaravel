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
        <a href="/posts">home</a>
        @auth
            <span>welcome back {{ auth()->user()->name }}</span>
            <form action="/logout" method="post">
                @csrf
                <button type="submit">log out</button>
            </form>
            <a href="admin/posts/create">admin</a>
        @else
            <a href="/register">register</a>
            <a href="/login">log in</a>
        @endauth

            <div>
                <form method="get">
                    <input type="text" name="search" class="border-2 border-solid border-black-500">
                </form>
            </div>
            <x-dropdow-item href="/posts">All</x-dropdow-item>
            @foreach ($categories as $categorie)
                <x-dropdow-item href="/categorie/{{ $categorie->id }}">{{ $categorie->name }}</x-dropdow-item>
            @endforeach
        <div>
            @foreach ($posts as $post)
                <article>
                    <a href="/post/{{ $post->id }}">
                        <h2>{{ $post->title }}</h2>
                    </a>
                    by <a href="/authors/{{ $post->user->id }}"><p>{{ $post->user->name }}</p></a>
                    <x-category-button :categorie="$post->categorie" />
                    <p>{{ $post->excerpt }}</p>
                </article>
            @endforeach
        </div>
        {{-- {{ $posts->links() }} --}}

    </div>
</x-layout>