<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="author" content="Mosaddek" />
    <meta name="keyword" content="slick, flat, dashboard, bootstrap, admin, template, theme, responsive, fluid, retina" />
    <meta name="description" content="" />
    <link rel="shortcut icon" href="javascript:;" type="image/png">

    <title>{{ trans('admin.dashboard') }}</title>

    <!-- Latest compiled and minified CSS -->
    <!-- link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" -->

    <link rel="stylesheet" href="{{ url('/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('/assets/css/font-awesome.css') }}">

    <link rel="stylesheet" href="{{ url('/assets/css/default-theme.css') }}">
    <link rel="stylesheet" href="{{ url('/assets/css/style.css') }}">

    @yield('styles')

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="{{ url('/assets/js/html5shiv.js') }}"></script>
    <script src="{{ url('/assets/js/respond.min.js') }}"></script>
    <![endif]-->


</head>
<body class="sticky-header">

    <section>
        @include('admin.blocks.sidebar-left')
                <!-- body content start-->
        <div class="body-content" >
            @include('admin.blocks.header-section')

            <div class="page-head">
                <h3 class="m-b-less">
                    {{ $heading }}
                </h3>
            </div>

            <div class="wrapper">
                @yield('content')
            </div>
        </div>

    </section>

    <script src="{{ url('/assets/js/jquery-1.11.1.min.js') }}"></script>
    <script src="{{ url('/assets/js/bootstrap.min.js') }}"></script>

    <script src="{{ url('/assets/js/modernizr.min.js') }}"></script>
    <!-- script src="{{ url('/assets/js/jquery.nicescroll.js') }}"></script -->
    <script src="{{url('/assets/js/scripts.js')}}"></script>



    <?php /*

    @todo Скпипт переключения классов меню сайдбара

    <!-- jQuery -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <!-- Latest compiled and minified JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <!-- Sidebar script -->
    <script src="{{url('/assets/js/scripts.js')}}"></script>
*/ ?>
    @yield('scripts')

    <script>
        /**
         * Active menu
         */
        $(document).ready(function(){
            var url = window.location;

            $('a').each(function(){

                // if the current path is like this link, make it active
                if($(this).attr('href').indexOf(url) !== -1){
                    $(this).parent().addClass('active');
                    $(this).closest('.menu-list').addClass('nav-active');
                }

            });
        });

    </script>
</body>
</html>