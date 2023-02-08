<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="app.css">
    <title>My Blog</title>
</head>

<body>
    <header>
        <h1>My Posts!</h1>
    </header>
    <?php foreach ($posts as $post) : ?>
        <article>
            <?= $post; ?> {{-- *PATH CONTENT --}}
        </article>
    <?php endforeach; ?>
    

    <a href="/posts">Go back!</a>
</body>

</html>
