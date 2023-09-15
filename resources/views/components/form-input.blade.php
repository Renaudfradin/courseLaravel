@props(['name', 'type' => 'text'])

<label for="{{ $name }}">{{ $name }}</label>
<input type="{{ $type}}" name="{{ $name }}" id="{{ $name }}" class="border-2 border-solid border-black-500">

<x-errors name="{{ $name }}" />