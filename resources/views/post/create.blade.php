<x-layout>
    <form action="/admin/posts" method="post">
        @csrf
        <x-form-input name="title" type="text"/>
        <x-form-input name="excerpt"/>
        <x-form-input name="body"/>

        <select name="categorie_id" id="categorie_id">
            @foreach (\App\Models\Categorie::all() as $categorie)
                <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
            @endforeach
        </select>

        <button type="submit">poster</button>

        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </form>
</x-layout>