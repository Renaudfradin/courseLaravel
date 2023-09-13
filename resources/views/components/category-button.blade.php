@props(['categorie'])

<a href="/categorie/{{ $categorie->id }}"><p>{{ $categorie->name }}</p></a>