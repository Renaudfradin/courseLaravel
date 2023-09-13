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
        {{-- <select class="flex-1 appearance-none bg-transparent py-2 pl-3 pr-9 text-sm font-semibold">
            <option value="category" disabled selected>Category
            </option> --}}
            <x-dropdow-item href="/posts">All</x-dropdow-item>
            @foreach ($categories as $categorie)
                {{-- <a 
                    href="/categorie/{{ $categorie->id }}"
                >{{ $categorie->name }} --}}
                <x-dropdow-item href="/categorie/{{ $categorie->id }}">{{ $categorie->name }}</x-dropdow-item>
            @endforeach
        {{-- </select> --}}
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
    </div>
</x-layout>