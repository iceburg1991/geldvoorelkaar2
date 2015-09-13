<!DOCTYPE html>
<html lang="en">
    <head>
        @include('head')
    </head>

    <body class="@yield('body-class')">
        @yield('content')

        @include('footer')

                <!-- jQuery Library -->
        <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
        <!--materialize js-->
        <script type="text/javascript" src="js/materialize.js"></script>
        <!--prism-->
        <script type="text/javascript" src="js/prism.js"></script>
        <!--scrollbar-->
        <script type="text/javascript" src="js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
        <!-- chartist -->
        <script type="text/javascript" src="js/plugins/chartist-js/chartist.min.js"></script>

        <!--plugins.js - Some Specific JS codes for Plugin Settings-->
        <script type="text/javascript" src="js/plugins.js"></script>

        <!-- Custom general JS code -->
        <script>
            jQuery( document ).ready(function(){
                jQuery('.dropdown-button').dropdown({
                    hover: true, // Activate on hover
                    constrain_width: false, // Does not change width of dropdown to that of the activator
                    gutter: 0, // Spacing from edge
                    belowOrigin: true // Displays dropdown below the button
                });
            })
        </script>
        @yield('js-loading')
    </body>
</html>