<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="app.css">
    <title>My Blog</title>
</head>

<header>
    <h1>My Posts!</h1>
</header>

<article>
    <?= $post; ?> {{-- *PASS VARIABLE POST FROM ROUTE HERE! --}}
</article>

<a href="/posts">Go back!</a>
