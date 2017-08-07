<!doctype html>
<html lang="{{ app()->getLocale() }}" ng-app="HolmApp">
    <head>
        @include('includes.head')
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
        <script  src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.6.4/angular.min.js"></script>
        <script  src="{{asset('js/angular_script.js')}}"></script>
        <script  src="{{asset('js/jquery_script.js')}}"></script>

        <script>
            (function($){
                $('.footerSocial a, .headerSocial a').click(function(e) {
                  e.preventDefault();
                  var href = $(this).attr('href');
                  window.open(href, '_blank').focus();
                });
            })(jQuery);

        </script>
        @stack('scripts_footer')
    </body>
</html>