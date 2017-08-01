<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        @include('includes.head')
        @stack('styles')
        @stack('scripts_head')
    </head>
    <body>
        <header class="header">
            @include('includes.header')
        </header>


        @yield('content')


        <footer class="footer">
            @include('includes.footer')
        </footer>


        <script  src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>
            $('.footerSocial a, .headerSocial a').click(function(e) {
              e.preventDefault();
              var href = $(this).attr('href');
              window.open(href, '_blank').focus();
          });
        </script>
        @stack('scripts_footer')
    </body>
</html>