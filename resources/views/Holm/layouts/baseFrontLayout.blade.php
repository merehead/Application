<!DOCTYPE html>
<html lang="en">
@include(config('settings.frontTheme').'.HTML_head.head')
<body>
@yield('header')
@yield('content')
@yield('footer')
@yield('modals')
</body>
</html>
