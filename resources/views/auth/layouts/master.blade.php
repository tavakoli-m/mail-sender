<html lang="en">

<head>
    @include('auth.layouts.head-tag')
    @yield('head-tag')
</head>

<body>
    <div class="container">
        @yield('content')
    </div>

    @yield('script')
</body>

</html>
