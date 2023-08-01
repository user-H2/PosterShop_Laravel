<!DOCTYPE html>
<html lang="en">
    <head>
        @include('layouts.header')
    </head>
    <body>
        
        @yield('content')

        <!-- Footer Start -->
        @include('layouts.footer')
        <!-- Footer End -->

        <!-- js -->
        @include('layouts.js')
        <!-- js End -->
    </body>
</html>