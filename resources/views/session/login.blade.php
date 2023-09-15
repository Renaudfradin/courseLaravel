<x-layout>
    <form action="/login" method="post">
        @csrf

        <label for="email">email</label>
        <input type="email" name="email" id="email" class="border-2 border-solid border-black-500">
        @error('email')
            <p>{{ $message}}</p>
        @enderror
        
        <label for="password">password</label>
        <input type="password" name="password" id="password" class="border-2 border-solid border-black-500">
        @error('password')
            <p>{{ $message}}</p>
        @enderror

        <button type="submit">submit</button>

        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </form>
</x-layout>