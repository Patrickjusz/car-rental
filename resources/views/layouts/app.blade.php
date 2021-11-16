<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @yield('head')
</head>

<body>
    <div class="container mt-5">
        @yield('content')
    </div>

    @yield('js_links')
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>