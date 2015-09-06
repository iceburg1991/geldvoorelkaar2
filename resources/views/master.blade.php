<!DOCTYPE html>
<html lang="en">
    <head>
        @include('head')
    </head>

    <body class="@yield('body-class')">
        @yield('content')

        @include('footer')

        @yield('js-loading')
    </body>
</html>