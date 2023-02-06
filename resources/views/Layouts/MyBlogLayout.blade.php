<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="app.css">
    <title>{{ $title ?? 'My Blog' }}</title>
</head>
<body>
    <header>My Blog</header>
    <main>
        {{ $slot }}
    </main>
    <footer></footer>

    <script src="app.js"></script>
</body>
</html>