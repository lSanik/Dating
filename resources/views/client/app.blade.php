<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width"/>
    <title> </title>

    <link rel="stylesheet" href="{{ url('/assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ url('/assets/css/app.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/font-awesome.css') }}">

    @yield('styles')
</head>
<body>
    <div class="container-fluid">

        <!-- Header -->
        <header class="row header-bg">
            @include('client.blocks.header')
        </header><!-- .header -->

        <!-- Content -->
        <section class="row">
            @yield('content')
        </section>
        <!-- .content -->

        <!-- Footer -->
        <footer class="row footer-bg">
            @include('client.blocks.footer')
        </footer>
        <!-- .footer -->
    </div>

    <!-- include script -->
    <script src="https://code.jquery.com/jquery-1.12.3.min.js"   integrity="sha256-aaODHAgvwQW1bFOGXMeX+pC4PZIPsvn2h1sArYOhgXQ="   crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <!-- .include.script -->
    @yield('scripts')
    <!-- Scripts area -->
    <script>
        $.each($('#navbar').find('li'), function() {
            $(this).toggleClass('active',
                    window.location.pathname.indexOf($(this).find('a').attr('href')) > -1);
        });
    </script>
    <!-- .scripts -->

</body>
</html>