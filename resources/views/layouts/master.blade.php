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
        <li><a href="{{ route('eshop') }}">E-Shop</a></li>
        <li><a href="{{ route('explore') }}">Explore</a></li>
        <li><a href=""></a>News</li>
        <li><a href=""></a>Forums</li>
        <li><a href=""></a>About</li>
    </ul>
    <div>
        @yield('homepage')
        @yield('eshop')
        @yield('explore')
    </div>
</body>
</html>