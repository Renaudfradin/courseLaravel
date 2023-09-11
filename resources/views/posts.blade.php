<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    </head>
    <body class="antialiased">
        <a href="/">home</a>
        <div>
            <?php foreach ($posts as $post) : ?>
                <a href="/post/<?= $post->slug ?>"><h2><?= $post->title ?></h2></a>
                <p><?= $post->excerpt ?></p>
            <?php endforeach ?>
        </div>
        {{-- <h2><a href="/post/firts">post 1</a></h2>
        <h2><a href="/post/second">post 2</a></h2>
        <h2><a href="/post/third">post 3</a></h2> --}}
    </body>
</html>
