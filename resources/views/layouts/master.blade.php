<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Homepage</title>
</head>
<body>
    <ul>
        <li><a href="{{ route('homepage') }}">Homepage</a></li> {{-- * route('the route name') --}}
        <li><a href="{{ route('test') }}">Test</a></li>
        <li><a href="{{ route('blog') }}">Blog</a></li>
    </ul>
    <div>
        @yield('homepage')
        @yield('test')
        @yield('blog')
    </div>
</body>
</html>