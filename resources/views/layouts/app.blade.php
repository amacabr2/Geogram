<!DOCTYPE html>

<html lang="{{ app()->getLocale() }}">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts ans icons -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/now-ui-kit.css?v=1.1.0') }}">
        <link rel="stylesheet" href="{{ asset('css/rotating-card.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/perso.css') }}">
    </head>

    <body class="sidebar-collapse">
        <section id="app">
            @include('includes.nav')

            @yield('content')

            @include('includes.footer')
        </section>

        <!-- Scripts -->
        <script type="text/javascript" src="{{ asset('js/core/jquery.3.2.1.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/core/popper.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/core/bootstrap.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/plugins/bootstrap-switch.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/plugins/nouislider.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/plugins/bootstrap-datepicker.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/now-ui-kit.js?v=1.1.0') }}"></script>
        <script type="text/javascript" src="{{ asset('js/jquery.flip.min.js') }}"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                nowuiKit.initSliders();
            });
        </script>

        @yield('javascript')

    </body>

</html>
